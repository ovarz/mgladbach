<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$report_link = $conn->real_escape_string($_GET['link']);

$sql = "SELECT r.*, p.player_id as p_code, p.fullname, p.birthday, t.name as team_name, c.nickname as head_coach, ex.nickname as examiner_name, ex.signature as examiner_signature 
        FROM reports r 
        JOIN players p ON r.player_id = p.id 
        LEFT JOIN teams t ON p.team_id = t.id 
        LEFT JOIN coaches c ON t.coach_id = c.id 
        LEFT JOIN coaches ex ON r.examiner_id = ex.id 
        WHERE p.player_id = '$player_code' AND r.report_link = '$report_link'";

$result = $conn->query($sql);
$rep = $result->fetch_assoc();

if(!$rep) die("Report not found.");
?>
<?php 
  $lang='en';
  $menu='Player';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<style><?php require ($_SERVER['BMG'].'admin/assets/css/report.css')?></style>
<div class="rancak-main-container rancak-main-1column">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <div class="head-top-page">
    <h2 class="htp-title">Report Detail</h2>
	<div class="htp-button-list">
      <a title="Edit Report" class="btn" href="/admin/player/<?php echo $player_code; ?>/<?php echo $report_link; ?>/edit/">Edit Report</a>
      <a title="Generate PDF" class="btn" href="/admin/player/<?php echo $player_code; ?>/<?php echo $report_link; ?>/generate/">Generate PDF</a>
	</div>
  </div>
  
  
  
  <div>
    <div>Report Title : <?php echo ucwords($rep['report_title']); ?></div>
    <div>ID : <?php echo $rep['p_code']; ?></div>
	<div>Name : <?php echo $rep['fullname']; ?></div>
	<div>Birth : <?php echo $rep['birthday']; ?></div>
	<div>Team : <?php echo $rep['team_name'] ?: 'No Team'; ?></div>
	<div>Coach : <?php echo $rep['head_coach'] ?: 'No Coach'; ?></div>
	<div>Examiner : <?php echo $rep['examiner_name'] ?: 'No Coach'; ?></div>
	
	<br><br>
	
	<canvas id="radarChart" class="grade-chart"></canvas>
	
	<br><br>
	
    <div>Pace : <?php echo $rep['pace'] !== null ? $rep['pace'] : '-'; ?></div>
    <div>Passing : <?php echo $rep['passing'] !== null ? $rep['passing'] : '-'; ?></div>
    <div>Dribbling : <?php echo $rep['dribbling'] !== null ? $rep['dribbling'] : '-'; ?></div>
    <div>Physical : <?php echo $rep['physical'] !== null ? $rep['physical'] : '-'; ?></div>
    <div>Attacking : <?php echo $rep['attacking'] !== null ? $rep['attacking'] : '-'; ?></div>
    <div>Defending : <?php echo $rep['defending'] !== null ? $rep['defending'] : '-'; ?></div>
    <div>Shooting : <?php echo $rep['shooting'] !== null ? $rep['shooting'] : '-'; ?></div>
    <div>Overall : <?php echo $rep['overall'] !== null ? $rep['overall'] : '-'; ?></div>
	
	<br><br>
	
    <div>Coach's Comments : <?php echo nl2br($rep['coach_comment']); ?></div>
    <div>Recommendation : <?php echo nl2br($rep['recommendation']); ?></div>
  </div>

    <script>
        const ctx = document.getElementById('radarChart').getContext('2d');
        const dataVals = [<?php echo $rep['pace'] ?: 0; ?>, <?php echo $rep['passing'] ?: 0; ?>, <?php echo $rep['dribbling'] ?: 0; ?>, <?php echo $rep['physical'] ?: 0; ?>, <?php echo $rep['attacking'] ?: 0; ?>, <?php echo $rep['defending'] ?: 0; ?>, <?php echo $rep['shooting'] ?: 0; ?>];
        
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Pace', 'Passing', 'Dribbling', 'Physical', 'Attacking', 'Defending', 'Shooting'],
                datasets: [{
                    label: 'Player Stats', data: dataVals, backgroundColor: 'rgba(54, 162, 235, 0.2)', borderColor: 'rgb(54, 162, 235)', pointBackgroundColor: 'rgb(54, 162, 235)'
                }]
            },
            options: { animation: true, scales: { r: { min: 0, max: 10 } } }
        });
    </script>
	
	
	
</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>