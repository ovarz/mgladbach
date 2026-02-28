<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$session_id = (int)$_GET['id'];
$sql = "SELECT * FROM sessions WHERE id = $session_id";
$result = $conn->query($sql);
$session = $result->fetch_assoc();

if(!$session) die("Session not found.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $conn->query("DELETE FROM sessions WHERE id = $session_id");
        header("Location: /admin/setting/session/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $location = $_POST['location_code'];
    $meetings = (int)$_POST['meetings'];
    $price = (float)$_POST['price'];

    $stmt = $conn->prepare("UPDATE sessions SET location_code=?, meetings=?, price=? WHERE id=?");
    $stmt->bind_param("sidi", $location, $meetings, $price, $session_id);
    
    if($stmt->execute()){
        header("Location: /admin/setting/session/");
        exit();
    }
}

$loc_res = $conn->query("SELECT * FROM locations ORDER BY name ASC");
?>
<?php 
  $lang='en';
  $menu='Session';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Edit Session</h2>
  </div>



  <form class="form-container white-box" method="POST">
    <div class="form-row">
      <div class="form-label">Location</div>
      <div class="form-box form-select">
        <select class="form-field pdf-list" name="location_code" required>
          <option value="">-- Select Location --</option>
          <?php while($l = $loc_res->fetch_assoc()): ?>
			<option value="<?php echo $l['code']; ?>" <?php echo ($session['location_code'] == $l['code']) ? 'selected' : ''; ?>>
				<?php echo $l['name']; ?>
			</option>
          <?php endwhile; ?>
        </select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Meetings</div>
      <div class="form-box form-withsuffix">
        <input class="form-field" name="meetings" type="number" value="<?php echo $session['meetings']; ?>" required>
        <div class="form-suffix">kali pertemuan</div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Price</div>
      <div class="form-box">
        <input class="form-field" name="price" type="number" value="<?php echo $session['price']; ?>" required>
      </div>
    </div>
      <div class="form-action-button">
        <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
        <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/session/">Cancel</a>
        <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
        onclick="return confirm('Are you sure you want to delete this session? Players assigned to this session will have their session reset.');">Delete</button>
      </div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>