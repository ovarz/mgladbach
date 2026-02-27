<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT * FROM locations ORDER BY name ASC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Location';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="header-table-page">
    <h2 class="htp-title">Location Settings</h2>
	<div class="htp-button-list">
      <a title="Add Data" class="btn" href="/admin/setting/location/add/">Add Data</a>
	</div>
  </div>

    
	
    <table id="locTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="min-tablet">Location Code</th>
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
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>