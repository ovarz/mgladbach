<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $conn->real_escape_string($_POST['nickname']);
    $join_date = $_POST['join_date'];
    $teams = isset($_POST['teams']) ? $_POST['teams'] : [];

    // Generate Coach ID: C + DDMMYY + 0000X
    $join_str = date('dmy', strtotime($join_date));
    $res_count = $conn->query("SELECT COUNT(id) as total FROM coaches");
    $urutan = str_pad($res_count->fetch_assoc()['total'] + 1, 5, "0", STR_PAD_LEFT);
    $coach_id = "C" . $join_str . $urutan;

    // File Uploads
    $photo_name = null;
    $signature_name = null;
    $max_size = 1048576; // 1MB

    if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0 && $_FILES['photo']['size'] <= $max_size) {
        $photo_name = $coach_id . "_photo." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/photos/" . $photo_name);
    }
    if (isset($_FILES['signature']) && $_FILES['signature']['size'] > 0 && $_FILES['signature']['size'] <= $max_size) {
        $signature_name = $coach_id . "_sig." . pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['signature']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/signatures/" . $signature_name);
    }

    $stmt = $conn->prepare("INSERT INTO coaches (coach_id, nickname, join_date, photo, signature) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $coach_id, $nickname, $join_date, $photo_name, $signature_name);
    
    if($stmt->execute()){
        $new_coach_id = $conn->insert_id;
        // Update teams that belong to this coach
        foreach($teams as $tid) {
            if(!empty($tid)) {
                $conn->query("UPDATE teams SET coach_id = $new_coach_id WHERE id = " . (int)$tid);
            }
        }
        header("Location: /admin/coach/");
        exit();
    }
}

// Fetch Teams
$teams_res = $conn->query("SELECT id, name FROM teams ORDER BY name ASC");
$team_options = '<option value="">-- Select Team --</option>';
while($t = $teams_res->fetch_assoc()) {
    $team_options .= '<option value="'.$t['id'].'">'.$t['name'].'</option>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Add Coach</title>
</head>
<body>
    <h2>Add Coach</h2>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label>Upload Photo (Max 1MB)</label><br>
            <input type="file" name="photo" accept="image/*">
        </div>
        <div>
            <label>Nickname</label><br>
            <input type="text" name="nickname" required>
        </div>
        <div>
            <label>Join Date</label><br>
            <input type="date" name="join_date" required>
        </div>
        
        <div>
            <label>Assign Teams</label><br>
            <div id="team-container">
                <div>
                    <select name="teams[]"><?php echo $team_options; ?></select>
                </div>
            </div>
            <button type="button" onclick="addTeamField()">Tambah Tim</button>
        </div>
        <br>
        <div>
            <label>Upload Signature (Max 1MB)</label><br>
            <input type="file" name="signature" accept="image/*">
        </div>
        <br>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/coach/"><button type="button">Cancel</button></a>
        </div>
    </form>

    <script>
        function addTeamField() {
            var container = document.getElementById('team-container');
            var div = document.createElement('div');
            div.innerHTML = '<select name="teams[]"><?php echo addslashes($team_options); ?></select>';
            container.appendChild(div);
        }
    </script>
</body>
</html>