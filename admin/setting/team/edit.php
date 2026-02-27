<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$team_id = (int)$_GET['id'];
$sql = "SELECT * FROM teams WHERE id = $team_id";
$result = $conn->query($sql);
$team = $result->fetch_assoc();

if(!$team) die("Team not found.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LOGIKA DELETE ---
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $conn->query("DELETE FROM teams WHERE id = $team_id");
        header("Location: /admin/setting/team/");
        exit();
    }

    // --- LOGIKA UPDATE ---
    $name = $conn->real_escape_string($_POST['team_name']);
    
    $stmt = $conn->prepare("UPDATE teams SET name=? WHERE id=?");
    $stmt->bind_param("si", $name, $team_id);
    
    if($stmt->execute()){
        header("Location: /admin/setting/team/");
        exit();
    }
}
?>
<?php 
  $lang='en';
  $menu='Team';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Edit Team</h2>
  </div>



    <form method="POST">
        <div>
            <label>Team Name</label><br>
            <input type="text" name="team_name" value="<?php echo $team['name']; ?>" required>
        </div>
        <br>
        <div class="form-action-button">
            <button title="Save" class="btn fab-save" type="submit" name="action" value="update">Save</button>
            <a title="Cancel" class="btn btn-outline fab-cancel" href="/admin/setting/team/">Cancel</a>
            <button title="Delete" class="btn fab-delete" type="submit" name="action" value="delete" formnovalidate 
			onclick="return confirm('Are you sure you want to delete this team? Players assigned to this team will have their team reset.');">Delete</button>
        </div>
    </form>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>