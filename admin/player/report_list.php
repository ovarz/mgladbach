<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT r.*, p.player_id as p_code, p.fullname, t.name as team_name 
        FROM reports r 
        JOIN players p ON r.player_id = p.id 
        LEFT JOIN teams t ON p.team_id = t.id 
        ORDER BY r.id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Report List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <h2>Report List</h2>
    <div>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="allRepTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Player Name</th>
                <th>Team</th>
                <th>Report Title</th>
                <th>Overall</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['team_name'] ?: '-'; ?></td>
                <td><?php echo ucwords(str_replace('-', ' ', $row['report_link'])); ?></td>
                <td><?php echo $row['overall']; ?></td>
                <td>
                    <a href="/admin/player/<?php echo $row['p_code']; ?>/<?php echo $row['report_link']; ?>/"><button>Detail</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#allRepTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
        });
    </script>
</body>
</html>