<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Keamanan Khusus Player: Hanya player dengan ID miliknya sendiri yang boleh melihat
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'player') {
    header("Location: /login/");
    exit();
}
$player_code = $conn->real_escape_string($_GET['id']);
if ($_SESSION['player_code'] !== $player_code) {
    die("Access Denied: You cannot view other player's profile.");
}

$sql = "SELECT p.*, t.name as team_name, c.nickname as coach_name 
        FROM players p 
        LEFT JOIN teams t ON p.team_id = t.id 
        LEFT JOIN coaches c ON t.coach_id = c.id 
        WHERE p.player_id = '$player_code'";
$result = $conn->query($sql);
$player = $result->fetch_assoc();

if(!$player) die("Player not found.");

$bday = new DateTime($player['birthday']);
$today = new DateTime('today');
$age = $bday->diff($today)->y;

$pid = $player['id'];
$att_res = $conn->query("SELECT * FROM attendances WHERE player_id = $pid ORDER BY id DESC");
$pay_res = $conn->query("SELECT p.*, s.meetings, s.price as base_price, l.name as loc_name FROM payments p LEFT JOIN sessions s ON p.session_id = s.id LEFT JOIN locations l ON s.location_code = l.code WHERE p.player_id = $pid ORDER BY p.id DESC");
$rep_res = $conn->query("SELECT * FROM reports WHERE player_id = $pid ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <div>
        <a href="/logout/"><button>Logout</button></a>
    </div>

    <h2>My Biodata</h2>
    <div>
        <div><img src="/uploads/photos/<?php echo $player['photo'] ?: 'default.png'; ?>" width="150"></div>
        <div>ID: <?php echo $player['player_id']; ?></div>
        <div>Nickname: <?php echo $player['nickname']; ?></div>
        <div>Full Name: <?php echo $player['fullname']; ?></div>
        <div>Team: <?php echo $player['team_name'] ?: 'No Team'; ?></div>
        <div>Coach: <?php echo $player['coach_name'] ?: 'No Coach'; ?></div>
        <div>Birthday: <?php echo $player['birthday']; ?></div>
        <div>Age: <?php echo $age; ?> Years Old</div>
    </div>

    <hr>
    <h2>My Attendance</h2>
    <table id="attTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Date</th><th>Check-In</th><th>Check-Out</th></tr></thead>
        <tbody>
            <?php while($row = $att_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['check_in_time']; ?></td>
                <td><?php echo $row['check_out_time'] ?: '-'; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h2>My Payments</h2>
    <table id="payTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Invoice</th><th>Month & Year</th><th>Session</th><th>Final Price</th><th>Payment Date</th><th>Status</th></tr></thead>
        <tbody>
            <?php while($row = $pay_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['invoice_number']; ?></td>
                <td><?php echo $row['month'] . ' ' . $row['year']; ?></td>
                <td><?php echo $row['loc_name'] . ' - ' . $row['meetings'] . ' kali pertemuan'; ?></td>
                <td><?php echo ($row['base_price'] - $row['discount']); ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h2>My Reports</h2>
    <table id="repTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Report Title</th><th>Team</th><th>Overall</th><th>Action</th></tr></thead>
        <tbody>
            <?php while($row = $rep_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo ucwords(str_replace('-', ' ', $row['report_link'])); ?></td>
                <td><?php echo $player['team_name'] ?: '-'; ?></td>
                <td><?php echo $row['overall']; ?></td>
                <td><a href="/player/<?php echo $player_code; ?>/<?php echo $row['report_link']; ?>/"><button>Detail</button></a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#attTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
            $('#payTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
            $('#repTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
        });
    </script>
</body>
</html>