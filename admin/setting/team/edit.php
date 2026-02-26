<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$team_id = (int)$_GET['id'];
$sql = "SELECT * FROM teams WHERE id = $team_id";
$result = $conn->query($sql);
$team = $result->fetch_assoc();

if(!$team) die("Team not found.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['team_name']);
    
    $stmt = $conn->prepare("UPDATE teams SET name=? WHERE id=?");
    $stmt->bind_param("si", $name, $team_id);
    
    if($stmt->execute()){
        header("Location: /admin/setting/team/");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/" />
    <title>Edit Team</title>
</head>
<body>
    <h2>Edit Team</h2>
    <form method="POST">
        <div>
            <label>Team Name</label><br>
            <input type="text" name="team_name" value="<?php echo $team['name']; ?>" required>
        </div>
        <br>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/setting/team/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>