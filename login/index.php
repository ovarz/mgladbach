<?php
// Menggunakan absolute path untuk memanggil config
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
    $stmt = $conn->prepare("SELECT id, username, password FROM admins WHERE username = ?");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/" />
    <title>Login System</title>
</head>
<body>
    <div>
        <h2>Login</h2>
        <?php if ($error): ?>
            <div><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="login/index.php">
            <div>
                <label>ID / Username</label><br>
                <input type="text" name="userid" required>
            </div>
            <div>
                <label>Password</label><br>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>