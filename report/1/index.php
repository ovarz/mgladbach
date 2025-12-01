<?php
  $lang='id';
  $menu='Report';
  $site_title='default';
  require ('../../template/inc/base.php');
  
  include '../login-session.php';
  if (!isset($_SESSION['user']) || $_SESSION['user'] !== "1") {
    header("Location: ../index.php");
    exit;
  }
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-view-report content-center">
    <div class="site-container">
	  <div class="svr-header">
	    <div class="svr-info">
		  <h2 class="svr-name">Auzan Alkhawarizmi</h2>
		  <h3 class="svr-team">U8 FOH</h3>
		</div>
		<div class="svr-download"><a title="Logout" class="btn svr-download-button" href="report/logout.php">Logout</a></div>
	  </div>
	  <div class="svr-embed">
	    <embed type="application/pdf" src="report/1/u8-u8FOH-Auzan_Alkhawarizmi-dec25.pdf" width="800" height="1132"></embed>
	  </div>
	</div>
  </section>
  
  
  
  
  
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>
