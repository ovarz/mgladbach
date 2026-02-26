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
  $site_title='default';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



    <h2>Session Settings</h2>
    <div>
        <a href="/admin/setting/session/add/"><button>Add Data</button></a>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
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
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>