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



    <h2>Edit Location</h2>
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
        <div>
            <button type="submit" name="action" value="update">Save Data</button>
            <a href="/admin/setting/location/"><button type="button">Cancel</button></a>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>