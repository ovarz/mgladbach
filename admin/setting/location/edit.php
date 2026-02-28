<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$code = $conn->real_escape_string($_GET['code']);
$sql = "SELECT * FROM locations WHERE code = '$code'";
$result = $conn->query($sql);
$loc = $result->fetch_assoc();

if(!$loc) die("Location not found.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA UPDATE ---
    $name = $conn->real_escape_string($_POST['name']);

    $stmt = $conn->prepare("UPDATE locations SET name=? WHERE code=?");
    $stmt->bind_param("ss", $name, $code);
    
    if($stmt->execute()){
        header("Location: /admin/setting/location/");
        exit();
    }
}
?>
<?php 
  $lang='en';
  $menu='Location';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Edit Location</h2>
  </div>



  <form class="form-container white-box" method="POST">
    <div class="form-row">
      <div class="form-label">Location Code (3 Character)</div>
      <div class="form-box">
        <input class="form-field form-uppercase" name="text" value="<?php echo $loc['code']; ?>" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Location Name</div>
      <div class="form-box">
        <input class="form-field" name="text" value="<?php echo $loc['name']; ?>" required>
      </div>
    </div>
    <div class="form-action-button">
      <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
      <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/location/">Cancel</a>
      <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
      onclick="return confirm('Are you sure you want to delete this location? Players assigned to this location will have their location reset.');">Delete</button>
    </div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>