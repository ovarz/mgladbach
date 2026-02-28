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



  <div class="head-top-page">
    <h2 class="htp-title">Player List</h2>
	<div class="htp-button-list">
      <a title="Add Data" class="btn" href="/admin/player/add/">Add Data</a>
      <a title="Attendance List" class="btn" href="/admin/player/attendance/">Attendance List</a>
      <a title="Report List" class="btn" href="/admin/player/report/">Report List</a>
      <a title="Payment List" class="btn" href="/admin/player/payment/">Payment List</a>
	</div>
  </div>



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
                <td>
				  <div class="profile-frame img-frame content-center">
				    <img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $row['photo'] ?: 'default.png'; ?>">
				  </div>
				</td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['team_name'] ?: 'No Team'; ?></td>
                <td>
				  <div class="datatable-action">
                    <a title="Detail" class="btn btn-small" href="/admin/player/<?php echo $row['player_id']; ?>/">Detail</a>
                    <a title="Edit" class="btn btn-small" href="/admin/player/<?php echo $row['player_id']; ?>/edit/">Edit</a>
                    <a title="Absent" class="btn btn-small" href="/admin/player/<?php echo $row['player_id']; ?>/attendance/add/">Absent</a>
				  </div>
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