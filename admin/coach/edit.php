<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$coach_code = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM coaches WHERE coach_id = '$coach_code'";
$result = $conn->query($sql);
$coach = $result->fetch_assoc();

if(!$coach) die("Coach not found.");
$cid = $coach['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        if ($coach['photo'] && file_exists($_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/photos/" . $coach['photo'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/photos/" . $coach['photo']);
        }
        if ($coach['signature'] && file_exists($_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/signatures/" . $coach['signature'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/signatures/" . $coach['signature']);
        }
        $conn->query("DELETE FROM coaches WHERE id = $cid");
        header("Location: /admin/coach/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $nickname = $conn->real_escape_string($_POST['nickname']);
    $join_date = $_POST['join_date'];
    $teams = isset($_POST['teams']) ? $_POST['teams'] : [];

    $photo_name = $coach['photo'];
    $signature_name = $coach['signature'];
    $max_size = 1048576; // 1MB

    $dir_photos = $_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/photos/";
    $dir_sigs = $_SERVER['DOCUMENT_ROOT'] . "/admin/assets/img/signatures/";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['photo']['size'] <= $max_size) {
            $photo_name = $coach_code . "_photo." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['photo']['tmp_name'], $dir_photos . $photo_name);
        } else {
            echo "<script>alert('Gagal: Ukuran Foto Coach melebihi 1MB!'); window.history.back();</script>";
            exit();
        }
    }

    if (isset($_FILES['signature']) && $_FILES['signature']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['signature']['size'] <= $max_size) {
            $signature_name = $coach_code . "_sig." . pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['signature']['tmp_name'], $dir_sigs . $signature_name);
        } else {
            echo "<script>alert('Gagal: Ukuran Signature melebihi 1MB!'); window.history.back();</script>";
            exit();
        }
    }

    $stmt = $conn->prepare("UPDATE coaches SET nickname=?, join_date=?, photo=?, signature=? WHERE id=?");
    $stmt->bind_param("ssssi", $nickname, $join_date, $photo_name, $signature_name, $cid);
    
    if($stmt->execute()){
        $conn->query("UPDATE teams SET coach_id = NULL WHERE coach_id = $cid");
        foreach($teams as $tid) {
            if(!empty($tid)) {
                $conn->query("UPDATE teams SET coach_id = $cid WHERE id = " . (int)$tid);
            }
        }
        header("Location: /admin/coach/$coach_code/");
        exit();
    }
}

$teams_res = $conn->query("SELECT id, name FROM teams ORDER BY name ASC");
$all_teams = [];
while($t = $teams_res->fetch_assoc()) { $all_teams[] = $t; }

$assigned_teams_res = $conn->query("SELECT id FROM teams WHERE coach_id = $cid");
$assigned_teams = [];
while($at = $assigned_teams_res->fetch_assoc()) { $assigned_teams[] = $at['id']; }

function buildTeamSelect($all_teams, $selected_id = "") {
    $html = '<select class="form-field" name="teams[]"><option value="">-- Select Team --</option>';
    foreach($all_teams as $t) {
        $sel = ($t['id'] == $selected_id) ? 'selected' : '';
        $html .= '<option value="'.$t['id'].'" '.$sel.'>'.$t['name'].'</option>';
    }
    $html .= '</select>';
    return $html;
}

$team_options_clean = '<option value="">-- Select Team --</option>';
foreach($all_teams as $t) {
    $team_options_clean .= '<option value="'.$t['id'].'">'.$t['name'].'</option>';
}
?>
<?php 
  $lang='en';
  $menu='Coach';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Edit Coach</h2>
  </div>
  
  
  
  <form class="form-container white-box" method="POST" enctype="multipart/form-data">
    <div class="form-pp content-center">
	  <div class="form-pp-frame img-frame">
		<img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $coach['photo'] ?: 'default.png'; ?>">
	  </div>
	</div>
    <div class="form-row">
      <div class="form-label">Upload New Photo (Max 1MB, leave blank to keep current)</div>
      <div class="form-box">
        <input class="form-field" type="file" name="photo" accept="image/*">
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Nickname</div>
      <div class="form-box">
	    <input class="form-field" type="text" name="nickname" value="<?php echo $coach['nickname']; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Join Date</div>
      <div class="form-box">
        <input class="form-field" type="date" name="join_date" value="<?php echo $coach['join_date']; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-label">Assign Teams</div>
      <div id="team-container" class="form-add-form">
		<?php 
		  if (count($assigned_teams) > 0) {
			foreach($assigned_teams as $sel_id) {
				echo '<div class="form-box form-select">' . buildTeamSelect($all_teams, $sel_id) . '</div>';
			}
		  } else {
			echo '<div class="form-box form-select">' . buildTeamSelect($all_teams) . '</div>';
		  }
		?>
      </div>
      <button type="button" onclick="addTeamField()">Tambah Tim</button>
    </div>
    <div class="form-row">
      <div class="form-label">Upload Signature (Max 1MB)</div>
      <?php if($coach['signature']): ?>
	    <div class="display-signature img-frame">
          <img class="lazyload" data-original="/admin/assets/img/signatures/<?php echo $coach['signature']; ?>">
		</div>
      <?php else: ?>
        <div class="form-label">No Signature Uploaded</div>
      <?php endif; ?>
      <div class="form-box">
        <input class="form-field" type="file" name="signature" accept="image/*">
      </div>
    </div>
    <div class="form-action-button">
      <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save Data</button>
      <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/coach/<?php echo $coach_code; ?>/">Cancel</a>
      <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
      onclick="return confirm('Are you sure you want to delete this coach? Teams assigned to this coach will be unassigned.');">Delete</button>
    </div>
  </form>

    <script>
        function addTeamField() {
            var container = document.getElementById('team-container');
            var div = document.createElement('div');
            div.innerHTML = '<select class="form-field" name="teams[]"><?php echo addslashes($team_options_clean); ?></select>';
            container.appendChild(div);
        }
    </script>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>