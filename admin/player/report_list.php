<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT r.*, p.player_id as p_code, p.fullname, t.name as team_name 
        FROM reports r 
        JOIN players p ON r.player_id = p.id 
        LEFT JOIN teams t ON p.team_id = t.id 
        ORDER BY r.id DESC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Report';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Report List</h2>
  </div>



    <table id="allRepTable" class="display responsive nowrap">
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
				  <div class="datatable-action">
                    <a title="Detail" class="btn btn-small" href="/admin/player/<?php echo $row['p_code']; ?>/<?php echo $row['report_link']; ?>/">Detail</a>
				  </div>
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
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>