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



  <div class="header-table-page">
    <h2 class="htp-title">Edit Location</h2>
  </div>



    <form method="POST">
        <div>
            <label>Location Code (Cannot be changed)</label><br>
            <input type="text" value="<?php echo $loc['code']; ?>" disabled>
        </div>
        <div>
            <label>Location Name</label><br>
            <input type="text" name="name" value="<?php echo $loc['name']; ?>" required>
        </div>
        <br>
        <div class="form-action-button">
          <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
          <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/location/">Cancel</a>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>