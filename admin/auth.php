<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /login/");
    exit();
}
?>