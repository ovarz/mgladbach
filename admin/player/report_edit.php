<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$report_link = $conn->real_escape_string($_GET['link']);

$sql = "SELECT r.*, p.id as p_id FROM reports r JOIN players p ON r.player_id = p.id WHERE p.player_id = '$player_code' AND r.report_link = '$report_link'";
$result = $conn->query($sql);
$rep = $result->fetch_assoc();

if(!$rep) die("Report not found.");
$rid = $rep['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $conn->query("DELETE FROM reports WHERE id = $rid");
        header("Location: /admin/player/$player_code/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $period = $_POST['period'];
    $year = $_POST['year'];
    
    $new_title = $period . ' ' . $year;
    $new_link = strtolower(str_replace(' ', '-', $new_title));
    if ($new_link !== $report_link) {
        $cek = $conn->query("SELECT id FROM reports WHERE player_id = {$rep['p_id']} AND report_link = '$new_link'");
        if($cek->num_rows > 0) {
            echo "<script>alert('Report with this period and year already exists!'); window.history.back();</script>";
            exit();
        }
    }

    $examiner_id = $_POST['examiner_id'];
    $coach_comment = $conn->real_escape_string($_POST['coach_comment']);
    $recommendation = $conn->real_escape_string($_POST['recommendation']);

    $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
    $total_score = 0; $count_filled = 0; $vals = [];

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

    $stmt = $conn->prepare("UPDATE reports SET period=?, year=?, report_title=?, report_link=?, examiner_id=?, pace=?, passing=?, dribbling=?, physical=?, attacking=?, defending=?, shooting=?, overall=?, coach_comment=?, recommendation=? WHERE id=?");
    $stmt->bind_param("ssssiiiiiiiiiisi", $period, $year, $new_title, $new_link, $examiner_id, $vals['pace'], $vals['passing'], $vals['dribbling'], $vals['physical'], $vals['attacking'], $vals['defending'], $vals['shooting'], $overall, $coach_comment, $recommendation, $rid);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/$new_link/");
        exit();
    }
}

$coaches = $conn->query("SELECT id, nickname FROM coaches ORDER BY nickname ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><base href="/" /><title>Edit Report</title></head>
<body>
    <h2>Edit Report</h2>
    <form method="POST">
        <div>
            <label>Period</label><br>
            <select name="period" required>
                <option value="first semester" <?php echo ($rep['period'] == 'first semester') ? 'selected' : ''; ?>>first semester</option>
                <option value="second semester" <?php echo ($rep['period'] == 'second semester') ? 'selected' : ''; ?>>second semester</option>
            </select>
        </div>
        <div>
            <label>Year</label><br>
            <select name="year" required>
                <option value="2025" <?php echo ($rep['year'] == '2025') ? 'selected' : ''; ?>>2025</option>
                <option value="2026" <?php echo ($rep['year'] == '2026') ? 'selected' : ''; ?>>2026</option>
            </select>
        </div>
        <div>
            <label>Examiner</label><br>
            <select name="examiner_id" required>
                <?php while($c = $coaches->fetch_assoc()): ?>
                    <option value="<?php echo $c['id']; ?>" <?php echo ($rep['examiner_id'] == $c['id']) ? 'selected' : ''; ?>><?php echo $c['nickname']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        
        <?php 
        $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
        foreach($metrics as $m): 
        ?>
            <div>
                <label><?php echo ucfirst($m); ?> (0-10)</label><br>
                <input type="number" name="<?php echo $m; ?>" min="0" max="10" value="<?php echo $rep[$m]; ?>">
            </div>
        <?php endforeach; ?>

        <div>
            <label>Coach Comment</label><br>
            <textarea name="coach_comment" rows="4"><?php echo $rep['coach_comment']; ?></textarea>
        </div>
        <div>
            <label>Recommendation</label><br>
            <textarea name="recommendation" rows="4"><?php echo $rep['recommendation']; ?></textarea>
        </div>
        <br>
        <div>
            <button type="submit" name="action" value="update">Save Data</button>
            <a href="/admin/player/<?php echo $player_code; ?>/<?php echo $report_link; ?>/"><button type="button">Cancel</button></a>
            <button type="submit" name="action" value="delete" formnovalidate onclick="return confirm('Are you sure you want to delete this report?');">Delete Report</button>
        </div>
    </form>
</body>
</html>