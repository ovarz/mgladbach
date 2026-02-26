<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT py.*, p.player_id as p_code, p.fullname, t.name as team_name, s.meetings, s.price as base_price, l.name as loc_name 
        FROM payments py 
        JOIN players p ON py.player_id = p.id 
        LEFT JOIN teams t ON p.team_id = t.id 
        LEFT JOIN sessions s ON py.session_id = s.id 
        LEFT JOIN locations l ON s.location_code = l.code 
        ORDER BY py.id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Payment List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <h2>Payment List</h2>
    <div>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="allPayTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Player Name</th>
                <th>Team</th>
                <th>Month & Year</th>
                <th>Session</th>
                <th>Final Price</th>
                <th>Payment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['invoice_number']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['team_name'] ?: '-'; ?></td>
                <td><?php echo $row['month'] . ' ' . $row['year']; ?></td>
                <td><?php echo $row['loc_name'] . ' - ' . $row['meetings'] . ' kali'; ?></td>
                <td><?php echo ($row['base_price'] - $row['discount']); ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href="/admin/player/<?php echo $row['p_code']; ?>/payment/edit/<?php echo $row['id']; ?>/"><button>Edit</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#allPayTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
        });
    </script>
</body>
</html>