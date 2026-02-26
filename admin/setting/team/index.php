<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Menarik data tim beserta nama coach (jika ada)
$sql = "SELECT t.id, t.name as team_name, c.nickname as coach_name 
        FROM teams t 
        LEFT JOIN coaches c ON t.coach_id = c.id 
        ORDER BY t.name ASC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Team';
  $site_title='default';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



    <h2>Team Settings</h2>
    <div>
        <a href="/admin/setting/team/add/"><button>Add Data</button></a>
        <a href="/admin/"><button>Back to Dashboard</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="teamTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="all">Team Name</th>
                <th class="min-tablet">Coach Name</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['team_name']; ?></td>
                <td><?php echo $row['coach_name'] ?: 'No Coach Assigned'; ?></td>
                <td>
                    <a href="/admin/setting/team/edit/<?php echo $row['id']; ?>/"><button>Edit</button></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#teamTable').DataTable({ 
                responsive: true, 
                pageLength: 10,
                order: [[0, 'asc']] // Sort ascending sesuai instruksi
            });
        });
    </script>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>