<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT c.coach_id, c.photo, c.nickname, c.join_date FROM coaches c ORDER BY c.id DESC";
$result = $conn->query($sql);
?>
<?php 
  $lang='en';
  $menu='Coach';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



    <h2>Coach List</h2>
    <div>
        <a href="/admin/coach/add/"><button>Add Data</button></a>
        <a href="/logout/"><button>Logout</button></a>
    </div>
    <br>
    <table id="coachTable" class="display responsive nowrap">
        <thead>
		  <tr>
		    <th class="min-tablet">Photo</th>
			<th class="all">Nickname</th>
			<th class="min-tablet">Join Date</th>
			<th class="all">Action</th>
		  </tr>
		</thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="/admin/assets/img/photos/<?php echo $row['photo'] ?: 'default.png'; ?>" width="50"></td>
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
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>