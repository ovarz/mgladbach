<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check cookies for remember me
if (isset($_COOKIE['remember_user']) && isset($_COOKIE['remember_role'])) {
    $_SESSION['user_id'] = $_COOKIE['remember_user'];
    $_SESSION['role'] = $_COOKIE['remember_role'];
    if ($_COOKIE['remember_role'] === 'player' && isset($_COOKIE['remember_player_code'])) {
        $_SESSION['player_code'] = $_COOKIE['remember_player_code'];
    }
}

// Redirect if already logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: /admin/");
        exit();
    } else if ($_SESSION['role'] === 'player') {
        header("Location: /player/" . $_SESSION['player_code'] . "/");
        exit();
    }
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $conn->real_escape_string($_POST['userid']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    // Check Admin
    $stmt = $conn->prepare("SELECT id, username, password, photo FROM admins WHERE username = ?");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if ($password === $admin['password']) {
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['role'] = 'admin';
            $_SESSION['username'] = $admin['username'];
            $_SESSION['photo'] = $admin['photo']; // Menyimpan nama file foto ke sesi
            
            if ($remember) {
                setcookie("remember_user", $admin['id'], time() + (86400 * 7), "/");
                setcookie("remember_role", 'admin', time() + (86400 * 7), "/");
            }
            header("Location: /admin/");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    }
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if ($password === $admin['password']) {
            $_SESSION['user_id'] = $admin['id'];
            $_SESSION['role'] = 'admin';
            $_SESSION['username'] = $admin['username'];
            
            if ($remember) {
                setcookie("remember_user", $admin['id'], time() + (86400 * 7), "/");
                setcookie("remember_role", 'admin', time() + (86400 * 7), "/");
            }
            header("Location: /admin/");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        // Check Player
        $stmt_p = $conn->prepare("SELECT id, player_id, password FROM players WHERE player_id = ?");
        $stmt_p->bind_param("s", $userid);
        $stmt_p->execute();
        $res_p = $stmt_p->get_result();

        if ($res_p->num_rows > 0) {
            $player = $res_p->fetch_assoc();
            if ($password === $player['password']) {
                $_SESSION['user_id'] = $player['id'];
                $_SESSION['player_code'] = $player['player_id'];
                $_SESSION['role'] = 'player';

                if ($remember) {
                    setcookie("remember_user", $player['id'], time() + (86400 * 7), "/");
                    setcookie("remember_role", 'player', time() + (86400 * 7), "/");
                    setcookie("remember_player_code", $player['player_id'], time() + (86400 * 7), "/");
                }
                header("Location: /player/" . $player['player_id'] . "/");
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "ID not found.";
        }
    }
}
?>
<?php 
  $lang='en'; 
  $menu='Coach'; 
  $site_title='default'; 
  $anticache = date ('s'.'i'.'H'.'d'.'m'.'Y'); 
  $sitename = 'Borussia Mönchengladbach Academy Indonesia';
  $sitedesc = 'Unlock your potential at Borussia Academy Indonesia. Join our premier football academy in Jakarta. Enhance skills, tactical awareness, and physical conditioning.';
  require ($_SERVER['BMG'].'template/inc/meta.php')
?>
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
		    <p>Silakan masukkan ID dan password pada  kolom dibawah ini.</p>
			<p>Untuk password, silakan masukkan tanggal lahir dengan format : ddmmyy</p>
			<p>Contoh :<br/>
			  ID : XXX00000000000<br/>
			  Password : 210361</p>
		  </span>
		  <span class="text-en">
		    <p>Please enter your ID and password in the fields below.</p>
		    <p>For the password, please enter date of birth in the following format: ddmmyy</p>
		    <p>Example:<br/>
			  ID : XXX00000000000<br/>
			  Password : 210361
		    </p>
		  </span>
		  <span class="text-de">
		    <p>Bitte geben Sie Ihren ID und Ihr Passwort in die untenstehenden Felder ein.</p>
		    <p>Für das Passwort geben Sie bitte die Altersgruppe und das Geburtsdatum im folgenden Format ein : ddmmyy</p>
		    <p>Beispiel:<br/>
			  ID : XXX00000000000<br/>
			  Passwort : 210361
		    </p>
		  </span>
        </div>
		
        <form class="login-box-form" method="POST" action="login/index.php">
		  <ul class="lbf-row">
		    <li class="lbf-label">ID</li>
            <li class="form-box lbf-box">
              <input class="form-field" type="text" name="userid" required placeholder="Contoh: XXX00000000000">
            </li>
		  </ul>
		  <ul class="lbf-row">
		    <li class="lbf-label">
			  <span class="text-id">Kata Sandi</span>
              <span class="text-en">Password</span>
              <span class="text-de">Passwort</span>
			</li>
            <li class="form-box form-password lbf-box">
              <input class="form-field" type="password" name="password" required placeholder="">
			  <span title="Show/Hide Password" class="form-icon hide-password content-center">
			    <?php require ($_SERVER['BMG'].'template/img/icon/pass-hide.svg')?>
				<?php require ($_SERVER['BMG'].'template/img/icon/pass-show.svg')?>
			  </span>
            </li>
		  </ul>
		  <?php if (!empty($error)){ ?>
            <div class="lbf-row lbf-error">
			  <span class="text-id">Gagal! ID atau kata sandi salah.</span>
              <span class="text-en">Failed! ID or password is incorrect.</span>
              <span class="text-de">Fehlgeschlagen! ID oder Passwort ist falsch.</span>
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