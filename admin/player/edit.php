<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM players WHERE player_id = '$player_code'";
$result = $conn->query($sql);
$player = $result->fetch_assoc();

if(!$player) die("Player not found.");
$pid = $player['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        if ($player['photo']) {
            $photo_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/photos/" . $player['photo'];
            if (file_exists($photo_path)) unlink($photo_path);
        }
        $conn->query("DELETE FROM players WHERE id = $pid");
        header("Location: /admin/player/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $nickname = $conn->real_escape_string($_POST['nickname']);
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $team_id = $_POST['team_id'];
    $session_id = $_POST['session_id'];
    $birthday = $_POST['birthday'];
    $whatsapp = $conn->real_escape_string($_POST['whatsapp']);
    $email = $conn->real_escape_string($_POST['email']);
    
    $photo_name = $player['photo'];
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['photo']['size'] <= 1048576) {
            $photo_name = $player_code . "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/photos/" . $photo_name);
        } else {
            echo "<script>alert('Failed: Photo size exceeds 1MB!'); window.history.back();</script>";
            exit();
        }
    }

    $stmt = $conn->prepare("UPDATE players SET photo=?, nickname=?, fullname=?, team_id=?, session_id=?, birthday=?, whatsapp=?, email=? WHERE id=?");
    $stmt->bind_param("ssssisssi", $photo_name, $nickname, $fullname, $team_id, $session_id, $birthday, $whatsapp, $email, $pid);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/");
        exit();
    }
}

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



  <div class="header-table-page">
    <h2 class="htp-title">Edit Player</h2>
  </div>
  
  
  
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label>Current Photo:</label><br>
            <img src="/admin/assets/img/photos/<?php echo $player['photo'] ?: 'default.png'; ?>" width="100"><br>
            <label>Upload New Photo (Max 1MB, leave blank to keep current)</label><br>
            <input type="file" name="photo" accept="image/*">
        </div>
        <div><label>Nickname</label><br><input type="text" name="nickname" value="<?php echo $player['nickname']; ?>" required></div>
        <div><label>Full Name</label><br><input type="text" name="fullname" value="<?php echo $player['fullname']; ?>" required></div>
        <div>
            <label>Team</label><br>
            <select name="team_id">
                <option value="">-- Select Team --</option>
                <?php while($t = $teams->fetch_assoc()): ?>
                    <option value="<?php echo $t['id']; ?>" <?php echo ($player['team_id'] == $t['id']) ? 'selected' : ''; ?>><?php echo $t['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label>Session</label><br>
            <select name="session_id" required>
                <?php while($s = $sessions->fetch_assoc()): ?>
                    <option value="<?php echo $s['id']; ?>" <?php echo ($player['session_id'] == $s['id']) ? 'selected' : ''; ?>><?php echo $s['loc_name'] . ' - ' . $s['meetings'] . ' kali'; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div><label>Birthday</label><br><input type="date" name="birthday" value="<?php echo $player['birthday']; ?>" required></div>
        <div><label>WhatsApp</label><br><input type="number" name="whatsapp" value="<?php echo $player['whatsapp']; ?>" required></div>
        <div><label>Email</label><br><input type="email" name="email" value="<?php echo $player['email']; ?>" required></div>
        <br>
        <div class="form-action-button">
          <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
          <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/"><button type="button">Cancel</button></a>
          <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
		  onclick="return confirm('Are you sure you want to delete this player? All reports, attendances, and payments will be deleted!');">Delete</button>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>