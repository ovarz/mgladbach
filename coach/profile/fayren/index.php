<?php
  $lang='en';
  $menu='Coach';
  $site_title='default';
  require ('../../../template/inc/base.php');

  $folderUser = basename(__DIR__);
  require_once __DIR__ . '/../../users.php';

  if (!isset($users[$folderUser])) {
      die('User tidak ditemukan');
  }  
  
  require_once __DIR__ . '/../../setting.php';
  
  $tanggal_lahir = $birtdate;
  $lahir = new DateTime($tanggal_lahir);
  $hari_ini = new DateTime("today");
  $umur = $lahir->diff($hari_ini);

  include '../../login-session.php';
  if (!isset($_SESSION['user']) || $_SESSION['user'] !== $user) {
    header("Location: ../../index.php");
    exit;
  }
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>

<div class="rancak-foundation">
  <?php require ($_SERVER['BMG'].'coach/display.php')?>
</div>

<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>
