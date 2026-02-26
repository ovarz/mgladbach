<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT c.coach_id, c.photo, c.nickname, c.join_date FROM coaches c ORDER BY c.id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Coach List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <h2>Coach List</h2>
    <div>
        <a href="/admin/coach/add/"><button>Add Data</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="coachTable" class="display responsive nowrap" style="width:100%">
        <thead><tr><th>Photo</th><th>Nickname</th><th>Join Date</th><th>Action</th></tr></thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="/assets/img/photos/<?php echo $row['photo'] ?: 'default.png'; ?>" width="50"></td>
                <td><?php echo $row['nickname']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td>
                    <a href="/admin/coach/<?php echo $row['coach_id']; ?>/"><button>Detail</button></a>
                    <a href="/admin/coach/<?php echo $row['coach_id']; ?>/edit/"><button>Edit</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#coachTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
        });
    </script>
</body>
</html>