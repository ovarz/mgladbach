<?php 
  $lang='id';
  $menu='Report';
  $site_title='default';
  require ('../template/inc/base.php');
  
  include 'login-session.php';
  include 'users.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = isset($_POST['username']) ? trim($_POST['username']) : '';
    $p = isset($_POST['password']) ? $_POST['password'] : '';

    if ($u !== '' && isset($users[$u]) && $users[$u] === $p) {
      $_SESSION['user'] = $u;
      header("Location: " . $u . "/");
      exit;
    } else {
      $error = "Username atau password salah!";
    }
  }
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<div class="scb-bg">
  <script>
	$(window).on('load',function(){
	  if (window.videoLoaded) return;
	  window.videoLoaded = true;

	  if ($(window).width() > 1024) {
		$('.scb-bg').append('<video autoplay loop muted playsinline class="desktop-only"><source src="template/img/cover.mp4" type="video/mp4"></video>');
		$('.scb-bg video').hide().fadeIn(1000);
	  }
	});
  </script>
</div>
<div class="rancak-foundation">
  
  
  
  
  <section class="section-default section-login content-center">
    <div class="site-container content-center">
	  <div class="login-box">
	    <div class="login-header">
          <span class="text-id">Silakan masukkan nomor telepon dan kata sandi Anda pada kolom di bawah ini sesuai dengan data yang telah dikirim melalui WhatsApp sebelumnya.</span>
          <span class="text-en">Please enter your phone number and password in the fields below according to the information previously sent via WhatsApp.</span>
          <span class="text-de">Bitte geben Sie Ihre Telefonnummer und Ihr Passwort in die Felder unten ein, entsprechend den zuvor per WhatsApp gesendeten Daten.</span>
        </div>
        <form class="login-box-form" method="post" action="report/index.php">
		  <ul class="lbf-row">
		    <li class="lbf-label">
              <span class="text-id">Nomor Telepon</span>
              <span class="text-en">Phone Number</span>
              <span class="text-de">Telefonnummer</span>
			</li>
            <li class="form-box lbf-box">
              <input class="form-field" name="username" type="text" required placeholder="Contoh: 6280000000000">
            </li>
		  </ul>
		  <ul class="lbf-row">
		    <li class="lbf-label">
			  <span class="text-id">Kata Sandi</span>
              <span class="text-en">Password</span>
              <span class="text-de">Passwort</span>
			</li>
            <li class="form-box form-password lbf-box">
              <input class="form-field" name="password" type="password" required placeholder="">
			  <span title="Show/Hide Password" class="form-icon hide-password content-center">
			    <?php require ($_SERVER['BMG'].'template/img/icon/pass-hide.svg')?>
				<?php require ($_SERVER['BMG'].'template/img/icon/pass-show.svg')?>
			  </span>
            </li>
		  </ul>
		  <?php if (!empty($error)){ ?>
            <div class="lbf-row lbf-error">
			  <span class="text-id">Gagal! Nomor telepon atau kata sandi salah.</span>
              <span class="text-en">Error! Phone number or password incorrect</span>
              <span class="text-de">ehler! Telefonnummer oder Passwort ist falsch.</span>
			</div>
          <?php } ?>
          <button title="Login" class="btn lbf-button" type="submit">
            <span class="text-id">Masuk</span>
            <span class="text-en">Login</span>
            <span class="text-de">Anmelden</span>
	      </button>
        </form>
	  </div>
    </div>
  </section>
  
  
  
  
  
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>