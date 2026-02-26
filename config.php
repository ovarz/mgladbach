<!DOCTYPE html>
<html lang="id">
<base href="/" />
<?php
session_start();

// Pathing Global
$_SERVER['BMG'] = $_SERVER['DOCUMENT_ROOT'] . '/';
$sitename = 'Borussia Mönchengladbach Academy Indonesia';
$anticache = date ('s'.'i'.'H'.'d'.'m'.'Y');

// Database Configuration
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mgladbach_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set timezone Jakarta
date_default_timezone_set('Asia/Jakarta');
?>