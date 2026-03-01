<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$res_p = $conn->query("SELECT id FROM players WHERE player_id = '$player_code'");
$pid = $res_p->fetch_assoc()['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $period = $_POST['period'];
    $year = $_POST['year'];
    
    // Validasi Duplikasi Report
    $cek = $conn->query("SELECT id FROM reports WHERE player_id = $pid AND period = '$period' AND year = '$year'");
    if($cek->num_rows > 0) {
        echo "<script>alert('Report already exists!'); window.history.back();</script>";
        exit();
    }

    $examiner_id = $_POST['examiner_id'];
    $report_title = $period . ' ' . $year;
    $report_link = strtolower(str_replace(' ', '-', $report_title));
    $coach_comment = $conn->real_escape_string($_POST['coach_comment']);
    $recommendation = $conn->real_escape_string($_POST['recommendation']);

    // Logika Kalkulasi Overall (Opsi B)
    $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
    $total_score = 0;
    $count_filled = 0;
    $vals = [];

    foreach($metrics as $m) {
        if(isset($_POST[$m]) && $_POST[$m] !== "") {
            $val = (int)$_POST[$m];
            $vals[$m] = $val;
            $total_score += $val;
            $count_filled++;
        } else {
            $vals[$m] = null;
        }
    }

    $overall = ($count_filled > 0) ? ($total_score / $count_filled) : 0;

    $stmt = $conn->prepare("INSERT INTO reports (player_id, period, year, report_title, report_link, examiner_id, pace, passing, dribbling, physical, attacking, defending, shooting, overall, coach_comment, recommendation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("issssiiiiiiiidss", $pid, $period, $year, $report_title, $report_link, $examiner_id, $vals['pace'], $vals['passing'], $vals['dribbling'], $vals['physical'], $vals['attacking'], $vals['defending'], $vals['shooting'], $overall, $coach_comment, $recommendation);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/");
        exit();
    }
}

$coaches = $conn->query("SELECT id, nickname FROM coaches ORDER BY nickname ASC");
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
    <h2 class="htp-title">Add Report</h2>
  </div>
  
  
  
  <form class="form-container white-box" method="POST">
    <div class="form-row">
      <div class="form-label">Period</div>
      <div class="form-box form-select">
		<select class="form-field" name="period" required>
          <option value="First Semester">First Semester</option>
          <option value="Second Semester">Second Semester</option>
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
      <div class="form-label">Examiner</div>
      <div class="form-box form-select">
		<select class="form-field" name="examiner_id" required>
		  <?php while($c = $coaches->fetch_assoc()): ?>
			<option value="<?php echo $c['id']; ?>"><?php echo $c['nickname']; ?></option>
		  <?php endwhile; ?>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
	<div class="form-stat-list">
      <?php 
        $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
        foreach($metrics as $m): 
      ?>
        <div class="form-row">
          <div class="form-label"><?php echo ucfirst($m); ?> (0-10)</div>
          <div class="form-box">
            <input class="form-field" type="number" name="<?php echo $m; ?>" min="0" max="10">
          </div>
        </div>
      <?php endforeach; ?>
	</div>
    <div class="form-row">
      <div class="form-label">Coach Comment</div>
      <div class="form-box">
        <textarea class="form-field" name="coach_comment" rows="4"></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Recommendation</div>
      <div class="form-box">
        <textarea class="form-field" name="recommendation" rows="4"></textarea>
      </div>
    </div>
	<div class="form-action-button">
	  <button title="Save" class="btn fab-save" type="submit">Save</button>
	  <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/">Cancel</a>
	</div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>