<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$inv_id = (int)$_GET['inv'];

$res_p = $conn->query("SELECT p.id, p.session_id, s.price, l.name as loc_name, s.meetings FROM players p LEFT JOIN sessions s ON p.session_id = s.id LEFT JOIN locations l ON s.location_code = l.code WHERE p.player_id = '$player_code'");
$player = $res_p->fetch_assoc();

$res_pay = $conn->query("SELECT * FROM payments WHERE id = $inv_id");
$pay = $res_pay->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $conn->query("DELETE FROM payments WHERE id = $inv_id");
        header("Location: /admin/player/$player_code/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $month = $_POST['month'];
    $year = $_POST['year'];
    $discount = $_POST['discount'] ?: 0;
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE payments SET month=?, year=?, discount=?, payment_date=?, status=? WHERE id=?");
    $stmt->bind_param("ssdssi", $month, $year, $discount, $payment_date, $status, $inv_id);
    
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
    <h2 class="htp-title">Edit Payment</h2>
  </div>
  
  
  
  <form class="form-container white-box" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-label">Invoice Number</div>
      <div class="form-box">
        <input class="form-field" type="text" name="invoice_number" value="<?php echo $pay['invoice_number']; ?>" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Month</div>
      <div class="form-box form-select">
		<select class="form-field" name="month" required>
          <?php foreach($months as $m): ?>
            <option value="<?php echo $m; ?>" <?php echo ($pay['month'] == $m) ? 'selected' : ''; ?>><?php echo $m; ?></option>
          <?php endforeach; ?>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Year</div>
      <div class="form-box form-select">
		<select class="form-field" name="year" required>
          <option value="2025" <?php echo ($pay['year'] == '2025') ? 'selected' : ''; ?>>2025</option>
          <option value="2026" <?php echo ($pay['year'] == '2026') ? 'selected' : ''; ?>>2026</option>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Session</div>
      <div class="form-box">
        <input class="form-field" type="text" name="session" value="<?php echo $player['loc_name'] . ' - ' . $player['meetings'] . ' session'; ?>" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Base Price</div>
      <div class="form-box">
        <input class="form-field" type="text" name="price" value="<?php echo (int)$player['price']; ?>" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Discount</div>
      <div class="form-box">
	    <input class="form-field" type="number" name="discount" value="<?php echo (int)$pay['discount']; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Payment Date</div>
      <div class="form-box">
        <input class="form-field" type="date" name="payment_date" value="<?php echo $pay['payment_date']; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Status</div>
      <div class="form-box form-select">
		<select class="form-field" name="status" required>
          <option value="Waiting Confirmation" <?php echo ($pay['status'] == 'Waiting Confirmation') ? 'selected' : ''; ?>>Waiting Confirmation</option>
          <option value="Success" <?php echo ($pay['status'] == 'Success') ? 'selected' : ''; ?>>Success</option>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
	<div class="form-action-button">
      <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
      <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/">Cancel</a>
      <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
      onclick="return confirm('Are you sure you want to delete this payment record?');">Delete</button>
	</div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>