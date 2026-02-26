<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$res_p = $conn->query("SELECT id, fullname FROM players WHERE player_id = '$player_code'");
$player = $res_p->fetch_assoc();

$pid = $player['id'];
$today = date('Y-m-d');
$now = date('H:i:s');

// Cek status hari ini
$res_att = $conn->query("SELECT id, check_in_time, check_out_time FROM attendances WHERE player_id = $pid AND date = '$today'");
$status_text = "Check-in";

if ($res_att->num_rows > 0) {
    $att = $res_att->fetch_assoc();
    if (is_null($att['check_out_time'])) {
        $status_text = "Check-out";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($status_text == "Check-in") {
        $conn->query("INSERT INTO attendances (player_id, date, check_in_time) VALUES ($pid, '$today', '$now')");
    } else {
        $att_id = $att['id'];
        $conn->query("UPDATE attendances SET check_out_time = '$now' WHERE id = $att_id");
    }
    header("Location: /admin/player/$player_code/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><base href="/" /><title>Attendance</title></head>
<body>
    <h2>Attendance</h2>
    <div>Full Name: <?php echo $player['fullname']; ?></div>
    <div>Status: <?php echo $status_text; ?></div>
    <div>Current Date: <?php echo $today; ?></div>
    <div>Current Time: <?php echo $now; ?></div>
    
    <form method="POST">
        <button type="submit">Save</button>
        <a href="/admin/player/<?php echo $player_code; ?>/"><button type="button">Cancel</button></a>
    </form>
</body>
</html>