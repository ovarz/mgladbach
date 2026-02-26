<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT * FROM locations ORDER BY name ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/" />
    <title>Location Settings</title>
    
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/r-2.5.0/datatables.min.js"></script>
    <style> body { max-width: 100vw; overflow-x: hidden; padding: 10px; } </style>
</head>
<body>
    <h2>Location Settings</h2>
    <div>
        <a href="/admin/setting/location/add/"><button>Add Data</button></a>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    
    <table id="locTable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th class="all">Location Code</th>
                <th class="all">Location Name</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a href="/admin/setting/location/edit/<?php echo $row['code']; ?>/"><button>Edit</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <script>
        $(document).ready(function() {
            $('#locTable').DataTable({ responsive: true, pageLength: 10, order: [[1, 'asc']] });
        });
    </script>
</body>
</html>