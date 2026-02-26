<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$res_p = $conn->query("SELECT id FROM players WHERE player_id = '$player_code'");
$pid = $res_p->fetch_assoc()['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $period = $_POST['period'];
    $year = $_POST['year'];
    
    // Validasi Duplikasi Report
    $cek = $conn->query("SELECT id FROM reports WHERE player_id = $pid AND period = '$period' AND year = '$year'");
    if($cek->num_rows > 0) {
        echo "<script>alert('Report already exists!'); window.history.back();</script>";
        exit();
    }

    $examiner_id = $_POST['examiner_id'];
    $report_title = $period . ' ' . $year;
    $report_link = strtolower(str_replace(' ', '-', $report_title));
    $coach_comment = $conn->real_escape_string($_POST['coach_comment']);
    $recommendation = $conn->real_escape_string($_POST['recommendation']);

    // Logika Kalkulasi Overall (Opsi B)
    $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
    $total_score = 0;
    $count_filled = 0;
    $vals = [];

    foreach($metrics as $m) {
        if(isset($_POST[$m]) && $_POST[$m] !== "") {
            $val = (int)$_POST[$m];
            $vals[$m] = $val;
            $total_score += $val;
            $count_filled++;
        } else {
            $vals[$m] = null;
        }
    }

    $overall = ($count_filled > 0) ? ($total_score / $count_filled) : 0;

    $stmt = $conn->prepare("INSERT INTO reports (player_id, period, year, report_title, report_link, examiner_id, pace, passing, dribbling, physical, attacking, defending, shooting, overall, coach_comment, recommendation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("issssdiiiiiiiddss", $pid, $period, $year, $report_title, $report_link, $examiner_id, $vals['pace'], $vals['passing'], $vals['dribbling'], $vals['physical'], $vals['attacking'], $vals['defending'], $vals['shooting'], $overall, $coach_comment, $recommendation);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/");
        exit();
    }
}

$coaches = $conn->query("SELECT id, nickname FROM coaches ORDER BY nickname ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><base href="/" /><title>Add Report</title></head>
<body>
    <h2>Add Report</h2>
    <form method="POST">
        <div>
            <label>Period</label><br>
            <select name="period" required>
                <option value="first semester">first semester</option>
                <option value="second semester">second semester</option>
            </select>
        </div>
        <div>
            <label>Year</label><br>
            <select name="year" required>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
        </div>
        <div>
            <label>Examiner</label><br>
            <select name="examiner_id" required>
                <?php while($c = $coaches->fetch_assoc()): ?>
                    <option value="<?php echo $c['id']; ?>"><?php echo $c['nickname']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        
        <?php 
        $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
        foreach($metrics as $m): 
        ?>
            <div>
                <label><?php echo ucfirst($m); ?> (0-10)</label><br>
                <input type="number" name="<?php echo $m; ?>" min="0" max="10">
            </div>
        <?php endforeach; ?>

        <div>
            <label>Coach Comment</label><br>
            <textarea name="coach_comment" rows="4"></textarea>
        </div>
        <div>
            <label>Recommendation</label><br>
            <textarea name="recommendation" rows="4"></textarea>
        </div>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/player/<?php echo $player_code; ?>/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>