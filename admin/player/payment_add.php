<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$res_p = $conn->query("SELECT p.id, p.session_id, s.price, l.name as loc_name, s.meetings FROM players p LEFT JOIN sessions s ON p.session_id = s.id LEFT JOIN locations l ON s.location_code = l.code WHERE p.player_id = '$player_code'");
$player = $res_p->fetch_assoc();
$pid = $player['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $discount = $_POST['discount'] ?: 0;
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];
    $session_id = $player['session_id'];
    $price = $player['price'];

    // Generate Invoice: # + ID + B + DDMMYY + HHMMSS (24jam)
    $inv_number = "#" . $player_code . "B" . date('dmyHis');

    $stmt = $conn->prepare("INSERT INTO payments (invoice_number, player_id, month, year, session_id, price, discount, payment_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissiddss", $inv_number, $pid, $month, $year, $session_id, $price, $discount, $payment_date, $status);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/");
        exit();
    }
}
$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
?>
<?php 
  $lang='en';
  $menu='Player';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Add Payment</h2>
  </div>
  
  
  
    <form method="POST">
        <div>
            <label>Month</label><br>
            <select name="month" required>
                <?php foreach($months as $m): ?><option value="<?php echo $m; ?>"><?php echo $m; ?></option><?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>Year</label><br>
            <select name="year" required>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
        </div>
        <div>Session Data: <?php echo $player['loc_name'] . ' - ' . $player['meetings'] . ' kali pertemuan'; ?></div>
        <div>Base Price: <?php echo $player['price']; ?></div>
        <div>
            <label>Discount Price</label><br>
            <input type="number" name="discount" value="0">
        </div>
        <div>
            <label>Payment Date</label><br>
            <input type="date" name="payment_date" required>
        </div>
        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="Waiting Confirmation">Waiting Confirmation</option>
                <option value="Success">Success</option>
            </select>
        </div>
        <div class="form-action-button">
          <button title="Save" class="btn fab-save" type="submit">Save</button>
          <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/">Cancel</a>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>