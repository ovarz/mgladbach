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



  <div class="head-top-page">
    <h2 class="htp-title">Coach List</h2>
	<div class="htp-button-list">
      <a title="Add Data" class="btn" href="/admin/coach/add/">Add Data</a>
	</div>
  </div>



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
                <td>
				  <div class="profile-frame img-frame">
				    <img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $row['photo'] ?: 'default.png'; ?>">
				  </div>
				</td>
                <td><?php echo $row['nickname']; ?></td>
                <td><?php echo $row['join_date']; ?></td>
                <td>
				  <div class="datatable-action">
                    <a title="Detail" class="btn btn-small" href="/admin/coach/<?php echo $row['coach_id']; ?>/">Detail</a>
                    <a title="Edit" class="btn btn-small" href="/admin/coach/<?php echo $row['coach_id']; ?>/edit/">Edit</a>
				  </div>
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