<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$res_p = $conn->query("SELECT id, fullname FROM players WHERE player_id = '$player_code'");
$player = $res_p->fetch_assoc();

$pid = $player['id'];
$today = date('Y-m-d');
$now = date('H:i:s');
$admin_username = $_SESSION['username']; // Mengambil nama admin yang sedang login

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
        // Insert data baru beserta nama admin
        $conn->query("INSERT INTO attendances (player_id, date, check_in_time, submit_by) VALUES ($pid, '$today', '$now', '$admin_username')");
    } else {
        // Update data check-out beserta nama admin terakhir yang mengklik
        $att_id = $att['id'];
        $conn->query("UPDATE attendances SET check_out_time = '$now', submit_by = '$admin_username' WHERE id = $att_id");
    }
    header("Location: /admin/player/$player_code/");
    exit();
}
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
    <h2 class="htp-title">Attendance</h2>
  </div>
  
  
  
    <div>Full Name: <?php echo $player['fullname']; ?></div>
    <div>Status: <?php echo $status_text; ?></div>
    <div>Current Date: <?php echo $today; ?></div>
    <div>Current Time: <?php echo $now; ?></div>
    <br>
    <form method="POST">
	  <div class="form-action-button">
        <button title="Save" class="btn fab-save" type="submit">Save</button>
        <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/"><button type="button">Cancel</button></a>
	  </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>