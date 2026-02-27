<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = strtoupper($conn->real_escape_string($_POST['code']));
    $name = $conn->real_escape_string($_POST['name']);

    // Cek apakah kode sudah ada (karena kode adalah Primary Key)
    $cek = $conn->query("SELECT code FROM locations WHERE code = '$code'");
    if($cek->num_rows > 0) {
        echo "<script>alert('Location Code already exists!'); window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO locations (code, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $code, $name);
    
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
    <h2 class="htp-title">Add New Location</h2>
  </div>



    <form method="POST">
        <div>
            <label>Location Code (Max 10 chars, example: BGR)</label><br>
            <input type="text" name="code" maxlength="10" required>
        </div>
        <div>
            <label>Location Name (example: Bogor)</label><br>
            <input type="text" name="name" required>
        </div>
        <br>
        <div class="form-action-button">
          <button title="Save" class="btn fab-save" type="submit">Save</button>
          <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/location/">Cancel</a>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>