<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Menarik data absen digabung dengan nama pemain dan tim
$sql = "SELECT a.*, p.player_id as p_code, p.fullname, t.name as team_name 
        FROM attendances a 
        JOIN players p ON a.player_id = p.id 
        LEFT JOIN teams t ON p.team_id = t.id 
        ORDER BY a.date DESC, a.check_in_time DESC";
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
    <h2 class="htp-title">Attendance List</h2>
  </div>
  
  
  
    <table id="allAttTable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th class="all">Date</th>
                <th class="all">Player Name</th>
                <th class="min-tablet">Team</th>
                <th class="min-tablet">Check-In</th>
                <th class="min-tablet">Check-Out</th>
                <th class="min-tablet">Submit By</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo date('j F Y', strtotime($row['date'])); ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['team_name'] ?: '-'; ?></td>
                <td><?php echo $row['check_in_time']; ?></td>
                <td><?php echo $row['check_out_time'] ?: '<span style="color:red;">Not Checked Out</span>'; ?></td>
                <td><?php echo $row['submit_by'] ? ucwords($row['submit_by']) : '-'; ?></td>
                <td>
				  <?php if(!$row['check_out_time']): ?>
                    <div class="datatable-action">
                      <a title="Check-out" class="btn btn-small" href="/admin/player/<?php echo $row['p_code']; ?>/attendance/add/">Check-out</a>
                    </div>
				  <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <script>
        $(document).ready(function() {
            $('#allAttTable').DataTable({ 
                responsive: true, 
                pageLength: 25, // Dibuat 25 karena data absen biasanya banyak
                order: [[0, 'desc'], [3, 'desc']] // Urutkan berdasarkan tanggal dan jam check-in terbaru
            });
        });
    </script>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>