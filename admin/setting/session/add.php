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



  <form class="form-container white-box" method="POST">
    <div class="form-row">
      <div class="form-label">Location</div>
      <div class="form-box form-select">
        <select class="form-field pdf-list" name="location_code" required>
          <option value="">-- Select Location --</option>
          <?php while($l = $loc_res->fetch_assoc()): ?>
            <option value="<?php echo $l['code']; ?>"><?php echo $l['name']; ?></option>
          <?php endwhile; ?>
        </select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Meetings</div>
      <div class="form-box form-withsuffix">
        <input class="form-field" name="meetings" type="number" required>
        <div class="form-suffix">kali pertemuan</div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Price</div>
      <div class="form-box">
        <input class="form-field" name="price" type="number" placeholder="" required>
      </div>
    </div>
    <div class="form-action-button">
      <button title="Save" class="btn fab-save" type="submit">Save</button>
      <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/session/">Cancel</a>
    </div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>