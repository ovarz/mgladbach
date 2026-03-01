<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Menarik data session beserta nama lokasi
$sql = "SELECT s.id, l.name as loc_name, s.meetings, s.price 
        FROM sessions s 
        JOIN locations l ON s.location_code = l.code 
        ORDER BY s.id ASC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Session';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Session Settings</h2>
	<div class="htp-button-list">
      <a title="Add Data" class="btn" href="/admin/setting/session/add/">Add Data</a>
	</div>
  </div>



    <table id="sessionTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="all">Session</th>
                <th class="min-tablet">Price</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['loc_name'] . ' - ' . $row['meetings'] . ' session'; ?></td>
                <td><?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                <td>
				  <div class="datatable-action">
                    <a title="Edit" class="btn btn-small" href="/admin/setting/session/edit/<?php echo $row['id']; ?>/">Edit</a>
				  </div>
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
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>