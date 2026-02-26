<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$session_id = (int)$_GET['id'];
$sql = "SELECT * FROM sessions WHERE id = $session_id";
$result = $conn->query($sql);
$session = $result->fetch_assoc();

if(!$session) die("Session not found.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location_code'];
    $meetings = (int)$_POST['meetings'];
    $price = (float)$_POST['price'];

    $stmt = $conn->prepare("UPDATE sessions SET location_code=?, meetings=?, price=? WHERE id=?");
    $stmt->bind_param("sidi", $location, $meetings, $price, $session_id);
    
    if($stmt->execute()){
        header("Location: /admin/setting/session/");
        exit();
    }
}

// Ambil data lokasi dinamis untuk dropdown
$loc_res = $conn->query("SELECT * FROM locations ORDER BY name ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/" />
    <title>Edit Session</title>
</head>
<body>
    <h2>Edit Session</h2>
    <form method="POST">
        <div>
            <label>Location</label><br>
            <select name="location_code" required>
                <option value="">-- Select Location --</option>
                <?php while($l = $loc_res->fetch_assoc()): ?>
                    <option value="<?php echo $l['code']; ?>" <?php echo ($session['location_code'] == $l['code']) ? 'selected' : ''; ?>>
                        <?php echo $l['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label>Meetings (Numbers only)</label><br>
            <input type="number" name="meetings" value="<?php echo $session['meetings']; ?>" required> kali pertemuan
        </div>
        <div>
            <label>Price</label><br>
            <input type="number" name="price" value="<?php echo $session['price']; ?>" required>
        </div>
        <br>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/setting/session/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>