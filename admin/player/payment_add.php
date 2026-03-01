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
  
  
  
  <form class="form-container white-box" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-label">Month</div>
      <div class="form-box form-select">
		<select class="form-field" name="month" required>
          <?php foreach($months as $m): ?><option value="<?php echo $m; ?>"><?php echo $m; ?></option><?php endforeach; ?>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Year</div>
      <div class="form-box form-select">
		<select class="form-field" name="year" required>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
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
	    <input class="form-field" type="number" name="discount" value="0">
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Payment Date</div>
      <div class="form-box">
        <input class="form-field" type="date" name="payment_date" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Status</div>
      <div class="form-box form-select">
		<select class="form-field" name="status" required>
          <option value="Waiting Confirmation">Waiting Confirmation</option>
          <option value="Success">Success</option>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
	<div class="form-action-button">
	  <button title="Save" class="btn fab-save" type="submit">Save</button>
	  <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/">Cancel</a>
	</div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>