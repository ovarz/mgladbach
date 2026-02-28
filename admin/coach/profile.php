<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$coach_code = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM coaches WHERE coach_id = '$coach_code'";
$result = $conn->query($sql);
$coach = $result->fetch_assoc();

if(!$coach) die("Coach not found.");

$cid = $coach['id'];
$teams = $conn->query("SELECT name FROM teams WHERE coach_id = $cid");
?>
<?php 
  $lang='en';
  $menu='Coach';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Biodata Coach</h2>
	<div class="htp-button-list">
      <a title="Add Data" class="btn" href="/admin/coach/<?php echo $coach_code; ?>/edit/">Edit Data</a>
	</div>
  </div>



  <div class="profile-bio profile-coach white-box">
    <div class="profile-bio-picture content-center">
      <div class="profile-frame img-frame">
        <img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $coach['photo'] ?: 'default.png'; ?>">
      </div>
    </div>
	<ul class="profile-bio-info">
	  <li class="pbi-row">
	    <div class="pbi-label">Coach ID</div>
	    <div class="pbi-data"><?php echo $coach['coach_id']; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Nickname</div>
	    <div class="pbi-data"><?php echo $coach['nickname']; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Join Date</div>
	    <div class="pbi-data"><?php echo date('j F Y', strtotime($coach['join_date'])); ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Teams Assigned</div>
	    <ul class="pbi-data">
          <?php while($t = $teams->fetch_assoc()): ?>
            <li><?php echo $t['name']; ?></li>
          <?php endwhile; ?>
		</ul>
	  </li>
	</ul>
	<ul class="profile-bio-info">
	  <li class="pbi-row">
	    <div class="pbi-label">Signature</div>
	    <div class="pbi-data">
		  <?php if($coach['signature']): ?>
			<div class="display-signature img-frame">
			  <img class="lazyload" data-original="/admin/assets/img/signatures/<?php echo $coach['signature']; ?>">
			</div>
		  <?php else: ?>
			<div class="form-label">No Signature Uploaded</div>
		  <?php endif; ?>
		</div>
	  </li>
	</ul>
  </div>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>