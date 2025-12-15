<?php
  $lang='id';
  $menu='Report';
  $site_title='default';
  require ('../../template/inc/base.php');

  $folderUser = basename(__DIR__);
  require_once __DIR__ . '/../users.php';

  if (!isset($users[$folderUser])) {
      die('User tidak ditemukan');
  }

  $user = $folderUser;
  $pass = $users[$folderUser]['pass'];
  $name = $users[$folderUser]['name'];
  $team = $users[$folderUser]['team'];
  $file = $users[$folderUser]['file'];

  include '../login-session.php';
  if (!isset($_SESSION['user']) || $_SESSION['user'] !== $user) {
    header("Location: ../index.php");
    exit;
  }

  $pdfPath = __DIR__ . '/../file/' . $file . '.pdf';
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>

<div class="rancak-foundation">
  <?php require ($_SERVER['BMG'].'report/display.php')?>
</div>

<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>
