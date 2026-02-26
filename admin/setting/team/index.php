<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Menarik data tim beserta nama coach (jika ada)
$sql = "SELECT t.id, t.name as team_name, c.nickname as coach_name 
        FROM teams t 
        LEFT JOIN coaches c ON t.coach_id = c.id 
        ORDER BY t.name ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Team Settings</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <h2>Team Settings</h2>
    <div>
        <a href="/admin/setting/team/add/"><button>Add Data</button></a>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="teamTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Team Name</th>
                <th>Coach Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['team_name']; ?></td>
                <td><?php echo $row['coach_name'] ?: 'No Coach Assigned'; ?></td>
                <td>
                    <a href="/admin/setting/team/edit/<?php echo $row['id']; ?>/"><button>Edit</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#teamTable').DataTable({ 
                responsive: true, 
                pageLength: 10,
                order: [[0, 'asc']] // Sort ascending sesuai instruksi
            });
        });
    </script>
</body>
</html>