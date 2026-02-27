<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT p.player_id, p.photo, p.fullname, t.name as team_name 
        FROM players p LEFT JOIN teams t ON p.team_id = t.id 
        ORDER BY p.id DESC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Player';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



    <h2>Player List</h2>
    <div>
        <a href="/admin/player/add/"><button>Add Data</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="playerTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="min-tablet">Photo</th>
                <th class="all">Full Name</th>
                <th class="min-tablet">Team</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="/admin/assets/img/photos/<?php echo $row['photo'] ?: 'default.png'; ?>" width="50"></td>
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
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>