<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$sql = "SELECT p.*, t.name as team_name, c.nickname as coach_name 
        FROM players p 
        LEFT JOIN teams t ON p.team_id = t.id 
        LEFT JOIN coaches c ON t.coach_id = c.id 
        WHERE p.player_id = '$player_code'";
$result = $conn->query($sql);
$player = $result->fetch_assoc();

if(!$player) die("Player not found.");

// Calculate Age
$bday = new DateTime($player['birthday']);
$today = new DateTime('today');
$age = $bday->diff($today)->y;

// Fetch Data for Tables
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
    <title>Player Profile</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <div>
        <a href="/admin/player/<?php echo $player_code; ?>/edit/"><button>Edit Data</button></a>
        <a href="/admin/player/<?php echo $player_code; ?>/attendance/add/"><button>Absen</button></a>
        <a href="/admin/player/<?php echo $player_code; ?>/report/add/"><button>Add Report</button></a>
        <a href="/admin/player/<?php echo $player_code; ?>/payment/add/"><button>Add Payment</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>

    <h2>Biodata Section</h2>
    <div>
        <div><img src="/assets/img/photos/<?php echo $player['photo'] ?: 'default.png'; ?>" width="150"></div>
        <div>ID: <?php echo $player['player_id']; ?></div>
        <div>Nickname: <?php echo $player['nickname']; ?></div>
        <div>Full Name: <?php echo $player['fullname']; ?></div>
        <div>Team: <?php echo $player['team_name'] ?: 'No Team'; ?></div>
        <div>Coach: <?php echo $player['coach_name'] ?: 'No Coach'; ?></div>
        <div>Birthday: <?php echo $player['birthday']; ?></div>
        <div>Age: <?php echo $age; ?> Years Old</div>
        <div>WhatsApp: <?php echo $player['whatsapp']; ?></div>
        <div>Email: <?php echo $player['email']; ?></div>
    </div>

    <hr>
    <h2>Attendance Section</h2>
    <table id="attTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Date</th><th>Check-In</th><th>Check-Out</th><th>Action</th></tr></thead>
        <tbody>
            <?php while($row = $att_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['check_in_time']; ?></td>
                <td><?php echo $row['check_out_time'] ?: '-'; ?></td>
                <td>
                    <?php if(!$row['check_out_time']): ?>
                        <a href="/admin/player/<?php echo $player_code; ?>/attendance/add/"><button>Check-out</button></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h2>Payment Section</h2>
    <table id="payTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Invoice</th><th>Month & Year</th><th>Session</th><th>Price (After Discount)</th><th>Payment Date</th><th>Status</th><th>Action</th></tr></thead>
        <tbody>
            <?php while($row = $pay_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['invoice_number']; ?></td>
                <td><?php echo $row['month'] . ' ' . $row['year']; ?></td>
                <td><?php echo $row['loc_name'] . ' - ' . $row['meetings'] . ' kali pertemuan'; ?></td>
                <td><?php echo ($row['base_price'] - $row['discount']); ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><a href="/admin/player/<?php echo $player_code; ?>/payment/edit/<?php echo $row['id']; ?>/"><button>Edit</button></a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h2>Report Section</h2>
    <table id="repTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Report Title</th><th>Team</th><th>Overall</th><th>Action</th></tr></thead>
        <tbody>
            <?php while($row = $rep_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo ucwords(str_replace('-', ' ', $row['report_link'])); ?></td>
                <td><?php echo $player['team_name'] ?: '-'; ?></td>
                <td><?php echo $row['overall']; ?></td>
                <td><a href="/admin/player/<?php echo $player_code; ?>/<?php echo $row['report_link']; ?>/"><button>Detail</button></a></td>
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