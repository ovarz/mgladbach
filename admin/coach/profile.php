<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$coach_code = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM coaches WHERE coach_id = '$coach_code'";
$result = $conn->query($sql);
$coach = $result->fetch_assoc();

if(!$coach) die("Coach not found.");

$cid = $coach['id'];
$teams = $conn->query("SELECT name FROM teams WHERE coach_id = $cid");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Coach Profile</title>
</head>
<body>
    <div>
        <a href="/admin/coach/<?php echo $coach_code; ?>/edit/"><button>Edit Data</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>

    <h2>Biodata Section</h2>
    <div>
        <div><img src="/assets/img/photos/<?php echo $coach['photo'] ?: 'default.png'; ?>" width="150"></div>
        <div>ID: <?php echo $coach['coach_id']; ?></div>
        <div>Nickname: <?php echo $coach['nickname']; ?></div>
        <div>Join Date: <?php echo $coach['join_date']; ?></div>
        <div>
            Teams Assigned:<br>
            <?php while($t = $teams->fetch_assoc()): ?>
                <div>- <?php echo $t['name']; ?></div>
            <?php endwhile; ?>
        </div>
        <div>
            Signature:<br>
            <?php if($coach['signature']): ?>
                <img src="/assets/img/signatures/<?php echo $coach['signature']; ?>" width="100">
            <?php else: ?>
                No Signature Uploaded
            <?php endif; ?>
        </div>
    </div>
</body>
</html>