<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location_code'];
    $meetings = (int)$_POST['meetings'];
    $price = (float)$_POST['price'];

    $stmt = $conn->prepare("INSERT INTO sessions (location_code, meetings, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $location, $meetings, $price);
    
    if($stmt->execute()){
        header("Location: /admin/setting/session/");
        exit();
    }
}

// AMBIL DATA LOKASI DARI DATABASE
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
    <h2 class="htp-title">Add New Session</h2>
  </div>



    <form method="POST">
        <div>
            <label>Location</label><br>
            <select name="location_code" required>
                <option value="">-- Select Location --</option>
                <?php while($l = $loc_res->fetch_assoc()): ?>
                    <option value="<?php echo $l['code']; ?>"><?php echo $l['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label>Meetings (Numbers only)</label><br>
            <input type="number" name="meetings" required> kali pertemuan
        </div>
        <div>
            <label>Price</label><br>
            <input type="number" name="price" required>
        </div>
        <br>
        <div class="form-action-button">
          <button title="Save" class="btn fab-save" type="submit">Save</button>
          <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/session/">Cancel</a>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>