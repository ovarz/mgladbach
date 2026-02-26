<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = strtoupper($conn->real_escape_string($_POST['code']));
    $name = $conn->real_escape_string($_POST['name']);

    // Cek apakah kode sudah ada (karena kode adalah Primary Key)
    $cek = $conn->query("SELECT code FROM locations WHERE code = '$code'");
    if($cek->num_rows > 0) {
        echo "<script>alert('Location Code already exists!'); window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO locations (code, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $code, $name);
    
    if($stmt->execute()){
        header("Location: /admin/setting/location/");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/" />
    <title>Add Location</title>
</head>
<body>
    <h2>Add Location</h2>
    <form method="POST">
        <div>
            <label>Location Code (Max 10 chars, example: BGR)</label><br>
            <input type="text" name="code" maxlength="10" required>
        </div>
        <div>
            <label>Location Name (example: Bogor)</label><br>
            <input type="text" name="name" required>
        </div>
        <br>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/setting/location/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>