<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$code = $conn->real_escape_string($_GET['code']);
$sql = "SELECT * FROM locations WHERE code = '$code'";
$result = $conn->query($sql);
$loc = $result->fetch_assoc();

if(!$loc) die("Location not found.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);

    $stmt = $conn->prepare("UPDATE locations SET name=? WHERE code=?");
    $stmt->bind_param("ss", $name, $code);
    
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
    <title>Edit Location</title>
</head>
<body>
    <h2>Edit Location</h2>
    <form method="POST">
        <div>
            <label>Location Code (Cannot be changed)</label><br>
            <input type="text" value="<?php echo $loc['code']; ?>" disabled>
        </div>
        <div>
            <label>Location Name</label><br>
            <input type="text" name="name" value="<?php echo $loc['name']; ?>" required>
        </div>
        <br>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/setting/location/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>