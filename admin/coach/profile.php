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



  <div class="header-table-page">
    <h2 class="htp-title">Biodata Coach</h2>
	<div class="htp-button-list">
      <a title="Add Data" class="btn" href="/admin/coach/<?php echo $coach_code; ?>/edit/">Edit Data</a>
	</div>
  </div>



    <div>
        <div class="profile-picture">
		  <div class="profile-frame img-frame content-center">
		    <img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $coach['photo'] ?: 'default.png'; ?>">
		  </div>
		</div>
        <div>ID: <?php echo $coach['coach_id']; ?></div>
        <div>Nickname: <?php echo $coach['nickname']; ?></div>
        <div>Join Date: <?php echo $coach['join_date']; ?></div>
        <div>
            Teams Assigned:<br>
            <?php while($t = $teams->fetch_assoc()): ?>
                <div>- <?php echo $t['name']; ?></div>
            <?php endwhile; ?>
        </div>
        <div>
            Signature:<br>
            <?php if($coach['signature']): ?>
                <img src="/admin/assets/img/signatures/<?php echo $coach['signature']; ?>" width="100">
            <?php else: ?>
                No Signature Uploaded
            <?php endif; ?>
        </div>
    </div>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>