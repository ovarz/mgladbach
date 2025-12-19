<?php 
  $lang='id';
  $menu='Report';
  $site_title='default';
  require ('../template/inc/base.php');
  
  include 'login-session.php';
  include 'users.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u_input = isset($_POST['username']) ? trim($_POST['username']) : '';
    $p = isset($_POST['password']) ? $_POST['password'] : '';

    // normalize to lowercase for comparison
    $u_lower = strtolower($u_input);

    // create a map of lowercase username => original key
    $matched_key = null;
    foreach ($users as $k => $v) {
        if (strtolower($k) === $u_lower) {
            $matched_key = $k;
            break;
        }
    }

    if ($u_input !== '' && $matched_key !== null && isset($users[$matched_key]['pass']) && $users[$matched_key]['pass'] === $p) {
        // store the actual key as in users.php (preserve original case)
        $_SESSION['user'] = $matched_key;
        header('Location: player/' . $matched_key . '/');
        exit;
    } else {
        $error = 'Invalid username or password.';
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
          <span class="text-id">
		    <p>Silakan masukkan nama lengkap dan password pada  kolom dibawah ini.</p>
			<p>Untuk password, silakan masukkan tanggal lahir dengan format : ddmmyy</p>
			<p>Contoh :<br/>
			  Nama Lengkap : Lothar Matthäus<br/>
			  Password : 210361</p>
		  </span>
		  <span class="text-en">
		    <p>Please enter your full name and password in the fields below.</p>
		    <p>For the password, please enter date of birth in the following format: ddmmyy</p>
		    <p>Example:<br/>
			  Full Name : Lothar Matthäus<br/>
			  Password : 210361
		    </p>
		  </span>
		  <span class="text-de">
		    <p>Bitte geben Sie Ihren vollständigen Namen und Ihr Passwort in die untenstehenden Felder ein.</p>
		    <p>Für das Passwort geben Sie bitte die Altersgruppe und das Geburtsdatum im folgenden Format ein : ddmmyy</p>
		    <p>Beispiel:<br/>
			  Vollständiger Name : Lothar Matthäus<br/>
			  Passwort : 210361
		    </p>
		  </span>
        </div>
        <form class="login-box-form" method="post" action="report/index.php">
		  <ul class="lbf-row">
		    <li class="lbf-label">
              <span class="text-id">Nama Lengkap</span>
              <span class="text-en">Full Name</span>
              <span class="text-de">Vollständiger Name</span>
			</li>
            <li class="form-box lbf-box">
              <input class="form-field" name="username" type="text" required placeholder="Contoh: Lothar Matthäus">
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