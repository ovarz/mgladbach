<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location_code'];
    $meetings = (int)$_POST['meetings'];
    $price = (float)$_POST['price'];

    $stmt = $conn->prepare("INSERT INTO sessions (location_code, meetings, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $location, $meetings, $price);
    
    if($stmt->execute()){
        header("Location: /admin/setting/session/");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><base href="/" /><title>Add Session</title></head>
<body>
    <h2>Add Session</h2>
    <form method="POST">
        <div>
            <label>Location</label><br>
            <select name="location_code" required>
                <option value="BSD">BSD</option>
                <option value="BGR">Bogor</option>
            </select>
        </div>
        <div>
            <label>Meetings (Numbers only)</label><br>
            <input type="number" name="meetings" required> kali pertemuan
        </div>
        <div>
            <label>Price</label><br>
            <input type="number" name="price" required>
        </div>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/setting/session/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>