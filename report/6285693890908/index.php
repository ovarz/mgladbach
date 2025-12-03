<?php
  $lang='id';
  $menu='Report';
  $site_title='default';
  require ('../../template/inc/base.php');
  
  $user='6285693890908';
  $name='Auzan Alkhawarizmi';
  $team='U8 FOH';
  $file='u8-u8FOH-Auzan_Alkhawarizmi-dec25';
  
  include '../login-session.php';
  if (!isset($_SESSION['user']) || $_SESSION['user'] !== $user) {
    header("Location: ../index.php");
    exit;
  }
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<div class="rancak-foundation">
  <?php require ($_SERVER['BMG'].'report/display.php')?>
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>
