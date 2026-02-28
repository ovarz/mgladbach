<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['team_name']);
    $stmt = $conn->prepare("INSERT INTO teams (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    
    if($stmt->execute()){
        header("Location: /admin/setting/team/");
        exit();
    }
}
?>
<?php 
  $lang='en';
  $menu='Team';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Add New Team</h2>
  </div>



  <form class="form-container white-box" method="POST">
    <div class="form-row">
      <div class="form-label">Team Name</div>
      <div class="form-box">
	    <input class="form-field" type="text" name="team_name" required>
      </div>
    </div>
    <div class="form-action-button">
      <button title="Save" class="btn fab-save" type="submit">Save</button>
      <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/team/">Cancel</a>
    </div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>