<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT * FROM locations ORDER BY name ASC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Location';
  $site_title='default';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



    <h2>Location Settings</h2>
    <div>
        <a href="/admin/setting/location/add/"><button>Add Data</button></a>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    
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