<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$inv_id = (int)$_GET['inv'];

$res_p = $conn->query("SELECT p.id, p.session_id, s.price, l.name as loc_name, s.meetings FROM players p LEFT JOIN sessions s ON p.session_id = s.id LEFT JOIN locations l ON s.location_code = l.code WHERE p.player_id = '$player_code'");
$player = $res_p->fetch_assoc();

$res_pay = $conn->query("SELECT * FROM payments WHERE id = $inv_id");
$pay = $res_pay->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $discount = $_POST['discount'] ?: 0;
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE payments SET month=?, year=?, discount=?, payment_date=?, status=? WHERE id=?");
    $stmt->bind_param("ssddsi", $month, $year, $discount, $payment_date, $status, $inv_id);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/");
        exit();
    }
}
$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><base href="/" /><title>Edit Payment</title></head>
<body>
    <h2>Edit Payment</h2>
    <div>Invoice Number: <?php echo $pay['invoice_number']; ?></div>
    <form method="POST">
        <div>
            <label>Month</label><br>
            <select name="month" required>
                <?php foreach($months as $m): ?>
                    <option value="<?php echo $m; ?>" <?php echo ($pay['month'] == $m) ? 'selected' : ''; ?>><?php echo $m; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>Year</label><br>
            <select name="year" required>
                <option value="2025" <?php echo ($pay['year'] == '2025') ? 'selected' : ''; ?>>2025</option>
                <option value="2026" <?php echo ($pay['year'] == '2026') ? 'selected' : ''; ?>>2026</option>
            </select>
        </div>
        <div>Session Data: <?php echo $player['loc_name'] . ' - ' . $player['meetings'] . ' kali pertemuan'; ?></div>
        <div>Base Price: <?php echo $player['price']; ?></div>
        <div>
            <label>Discount Price</label><br>
            <input type="number" name="discount" value="<?php echo $pay['discount']; ?>">
        </div>
        <div>
            <label>Payment Date</label><br>
            <input type="date" name="payment_date" value="<?php echo $pay['payment_date']; ?>" required>
        </div>
        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="waiting confirmation" <?php echo ($pay['status'] == 'waiting confirmation') ? 'selected' : ''; ?>>waiting confirmation</option>
                <option value="success" <?php echo ($pay['status'] == 'success') ? 'selected' : ''; ?>>success</option>
            </select>
        </div>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/player/<?php echo $player_code; ?>/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>