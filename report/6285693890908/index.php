<?php
  $lang='id';
  $menu='Report';
  $site_title='default';
  require ('../../template/inc/base.php');

  // Ambil ID user dari nama folder
  $folderUser = basename(__DIR__);

  // Ambil data user dari users.php
  require_once __DIR__ . '/../users.php';

  if (!isset($users[$folderUser])) {
      die('User tidak ditemukan');
  }

  $user = $folderUser;
  $pass = $users[$folderUser]['pass'];
  $name = $users[$folderUser]['name'];
  $team = $users[$folderUser]['team'];
  $file = $users[$folderUser]['file'];

  // Cek login session
  include '../login-session.php';
  if (!isset($_SESSION['user']) || $_SESSION['user'] !== $user) {
    header("Location: ../index.php");
    exit;
  }

  // Validasi file PDF
  $pdfPath = __DIR__ . '/../file/' . $file . '.pdf';
  if (!file_exists($pdfPath)) {
      die('File PDF tidak ditemukan');
  }
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>

<div class="rancak-foundation">
  <?php require ($_SERVER['BMG'].'report/display.php')?>
</div>

<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>
