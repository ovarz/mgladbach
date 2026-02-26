<?php
require_once 'config.php';

session_unset();
session_destroy();
setcookie("remember_user", "", time() - 3600, "/");
setcookie("remember_role", "", time() - 3600, "/");

header("Location: /login/");
exit();
?>