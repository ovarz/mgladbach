<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $conn->real_escape_string($_POST['nickname']);
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $join_date = $_POST['join_date'];
    $team_id = $_POST['team_id'];
    $session_id = $_POST['session_id'];
    $birthday = $_POST['birthday'];
    $whatsapp = $conn->real_escape_string($_POST['whatsapp']);
    $email = $conn->real_escape_string($_POST['email']);

    // Generate Password (DDMMYY from birthday)
    $password = date('dmy', strtotime($birthday));

    // Generate Player ID
    $stmt_loc = $conn->prepare("SELECT location_code FROM sessions WHERE id = ?");
    $stmt_loc->bind_param("i", $session_id);
    $stmt_loc->execute();
    $loc_code = $stmt_loc->get_result()->fetch_assoc()['location_code'];
    
    $join_str = date('dmy', strtotime($join_date));
    
    $res_count = $conn->query("SELECT COUNT(id) as total FROM players");
    $urutan = str_pad($res_count->fetch_assoc()['total'] + 1, 5, "0", STR_PAD_LEFT);
    
    $player_id = $loc_code . $join_str . $urutan;

    // File Upload Handling
    $photo_name = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
        if ($_FILES['photo']['size'] <= 1048576) { // 1MB
            $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $photo_name = $player_id . "." . $ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/photos/" . $photo_name);
        } else {
            die("File size exceeds 1MB");
        }
    }

    $stmt = $conn->prepare("INSERT INTO players (player_id, password, photo, nickname, fullname, join_date, team_id, session_id, birthday, whatsapp, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiisss", $player_id, $password, $photo_name, $nickname, $fullname, $join_date, $team_id, $session_id, $birthday, $whatsapp, $email);
    
    if($stmt->execute()){
        header("Location: /admin/player/");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch Teams and Sessions for Dropdowns
$teams = $conn->query("SELECT id, name FROM teams ORDER BY name ASC");
$sessions = $conn->query("SELECT s.id, l.name as loc_name, s.meetings FROM sessions s JOIN locations l ON s.location_code = l.code ORDER BY s.id ASC");
?>
<?php 
  $lang='en';
  $menu='Player';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Add New Player</h2>
  </div>
  
  
  
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
            <label>Full Name</label><br>
            <input type="text" name="fullname" required>
        </div>
        <div>
            <label>Join Date</label><br>
            <input type="date" name="join_date" required>
        </div>
        <div>
            <label>Team</label><br>
            <select name="team_id">
                <option value="">-- Select Team --</option>
                <?php while($t = $teams->fetch_assoc()): ?>
                    <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label>Session</label><br>
            <select name="session_id" required>
                <option value="">-- Select Session --</option>
                <?php while($s = $sessions->fetch_assoc()): ?>
                    <option value="<?php echo $s['id']; ?>"><?php echo $s['loc_name'] . ' - ' . $s['meetings'] . ' meetings'; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label>Birthday</label><br>
            <input type="date" name="birthday" required>
        </div>
        <div>
            <label>WhatsApp (Numbers only)</label><br>
            <input type="number" name="whatsapp" required>
        </div>
        <div>
            <label>Email</label><br>
            <input type="email" name="email" required>
        </div>
        <div class="form-action-button">
          <button title="Save" class="btn fab-save" type="submit">Save</button>
          <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/">Cancel</a>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>