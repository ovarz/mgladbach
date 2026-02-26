<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['team_name']);
    $stmt = $conn->prepare("INSERT INTO teams (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    
    if($stmt->execute()){
        header("Location: /admin/setting/team/");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><base href="/" /><title>Add Team</title></head>
<body>
    <h2>Add Team</h2>
    <form method="POST">
        <div>
            <label>Team Name</label><br>
            <input type="text" name="team_name" required>
        </div>
        <div>
            <button type="submit">Save Data</button>
            <a href="/admin/setting/team/"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>