<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Menarik data session beserta nama lokasi
$sql = "SELECT s.id, l.name as loc_name, s.meetings, s.price 
        FROM sessions s 
        JOIN locations l ON s.location_code = l.code 
        ORDER BY s.id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Session Settings</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <h2>Session Settings</h2>
    <div>
        <a href="/admin/setting/session/add/"><button>Add Data</button></a>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="sessionTable" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Session</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['loc_name'] . ' - ' . $row['meetings'] . ' kali pertemuan'; ?></td>
                <td><?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                <td>
                    <a href="/admin/setting/session/edit/<?php echo $row['id']; ?>/"><button>Edit</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#sessionTable').DataTable({ 
                responsive: true, 
                pageLength: 10,
                order: [[0, 'asc']] // Sort ascending
            });
        });
    </script>
</body>
</html>