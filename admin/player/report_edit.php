<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$report_link = $conn->real_escape_string($_GET['link']);

$sql = "SELECT r.*, p.id as p_id FROM reports r JOIN players p ON r.player_id = p.id WHERE p.player_id = '$player_code' AND r.report_link = '$report_link'";
$result = $conn->query($sql);
$rep = $result->fetch_assoc();

if(!$rep) die("Report not found.");
$rid = $rep['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $conn->query("DELETE FROM reports WHERE id = $rid");
        header("Location: /admin/player/$player_code/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $period = $_POST['period'];
    $year = $_POST['year'];
    
    $new_title = $period . ' ' . $year;
    $new_link = strtolower(str_replace(' ', '-', $new_title));
    if ($new_link !== $report_link) {
        $cek = $conn->query("SELECT id FROM reports WHERE player_id = {$rep['p_id']} AND report_link = '$new_link'");
        if($cek->num_rows > 0) {
            echo "<script>alert('Report with this period and year already exists!'); window.history.back();</script>";
            exit();
        }
    }

    $examiner_id = $_POST['examiner_id'];
    $coach_comment = $conn->real_escape_string($_POST['coach_comment']);
    $recommendation = $conn->real_escape_string($_POST['recommendation']);

    $metrics = ['pace', 'passing', 'dribbling', 'physical', 'attacking', 'defending', 'shooting'];
    $total_score = 0; $count_filled = 0; $vals = [];

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

    $stmt = $conn->prepare("UPDATE reports SET period=?, year=?, report_title=?, report_link=?, examiner_id=?, pace=?, passing=?, dribbling=?, physical=?, attacking=?, defending=?, shooting=?, overall=?, coach_comment=?, recommendation=? WHERE id=?");
    $stmt->bind_param("ssssiiiiiiiidssi", $period, $year, $new_title, $new_link, $examiner_id, $vals['pace'], $vals['passing'], $vals['dribbling'], $vals['physical'], $vals['attacking'], $vals['defending'], $vals['shooting'], $overall, $coach_comment, $recommendation, $rid);
    
    if($stmt->execute()){
        header("Location: /admin/player/$player_code/$new_link/");
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
    <h2 class="htp-title">Edit Report</h2>
  </div>
  
  
  
  <form class="form-container white-box" method="POST">
    <div class="form-row">
      <div class="form-label">Period</div>
      <div class="form-box form-select">
		<select class="form-field" name="period" required>
          <option value="First Semester" <?php echo ($rep['period'] == 'First Semester') ? 'selected' : ''; ?>>First Semester</option>
          <option value="Second Semester" <?php echo ($rep['period'] == 'Second Semester') ? 'selected' : ''; ?>>Second Semester</option>
        </select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Year</div>
      <div class="form-box form-select">
		<select class="form-field" name="year" required>
          <option value="2025" <?php echo ($rep['year'] == '2025') ? 'selected' : ''; ?>>2025</option>
          <option value="2026" <?php echo ($rep['year'] == '2026') ? 'selected' : ''; ?>>2026</option>
		</select>
        <div class="form-icon content-center"><?php require ($_SERVER['BMG'].'admin/assets/img/icon/down.svg')?></div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Examiner</div>
      <div class="form-box form-select">
		<select class="form-field" name="examiner_id" required>
          <?php while($c = $coaches->fetch_assoc()): ?>
            <option value="<?php echo $c['id']; ?>" <?php echo ($rep['examiner_id'] == $c['id']) ? 'selected' : ''; ?>><?php echo $c['nickname']; ?></option>
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
            <input class="form-field" type="number" name="<?php echo $m; ?>" min="0" max="10" value="<?php echo $rep[$m]; ?>" min="0" max="10">
          </div>
        </div>
      <?php endforeach; ?>
	</div>
    <div class="form-row">
      <div class="form-label">Coach Comment</div>
      <div class="form-box">
        <textarea class="form-field" name="coach_comment" rows="4"><?php echo $rep['coach_comment']; ?></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Recommendation</div>
      <div class="form-box">
        <textarea class="form-field" name="recommendation" rows="4"><?php echo $rep['recommendation']; ?></textarea>
      </div>
    </div>
	<div class="form-action-button">
	  <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
	  <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/player/<?php echo $player_code; ?>/<?php echo $report_link; ?>/">Cancel</a>
	  <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
	  onclick="return confirm('Are you sure you want to delete this report?');">Delete Report</button>
	</div>
  </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>