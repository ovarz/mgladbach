<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Mengambil data coach beserta gabungan nama tim yang dilatihnya
$sql = "SELECT c.id, c.photo, c.coach_id, c.nickname, GROUP_CONCAT(t.name SEPARATOR ', ') as assigned_teams 
        FROM coaches c 
        LEFT JOIN teams t ON c.id = t.coach_id 
        GROUP BY c.id 
        ORDER BY c.nickname ASC";
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
			<th class="min-tablet">Teams Assigned</th>
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
				<td>
                    <?php if ($row['assigned_teams']): ?>
                        <ul class="team-list">
                            <?php 
                            // Memecah teks tim berdasarkan koma, lalu di-loop menjadi <li>
                            $teams = explode(',', $row['assigned_teams']);
                            foreach($teams as $t): 
                            ?>
                                <li><?php echo trim($t); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
					  No Team Assigned
                    <?php endif; ?>
                </td>
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