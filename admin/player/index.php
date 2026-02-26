<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT p.player_id, p.photo, p.fullname, t.name as team_name 
        FROM players p LEFT JOIN teams t ON p.team_id = t.id 
        ORDER BY p.id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Player List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <h2>Player List</h2>
    <div>
        <a href="/admin/player/add/"><button>Add Data</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="playerTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Full Name</th>
                <th>Team</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="/assets/img/photos/<?php echo $row['photo'] ?: 'default.png'; ?>" width="50"></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['team_name'] ?: 'No Team'; ?></td>
                <td>
                    <a href="/admin/player/<?php echo $row['player_id']; ?>/"><button>Detail</button></a>
                    <a href="/admin/player/<?php echo $row['player_id']; ?>/edit/"><button>Edit</button></a>
                    <a href="/admin/player/<?php echo $row['player_id']; ?>/attendance/add/"><button>Absen</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#playerTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[0, 'desc']] // Sort last data entry
            });
        });
    </script>
</body>
</html>