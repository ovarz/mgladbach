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
<div class="rancak-main-container rancak-main-1column">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <div class="head-top-page">
    <h2 class="htp-title">Report Detail</h2>
	<div class="htp-button-list">
      <a title="Edit Report" class="btn" href="/admin/player/<?php echo $player_code; ?>/<?php echo $report_link; ?>/edit/">Edit Report</a>
      <a title="Generate PDF" class="btn" href="/admin/player/<?php echo $player_code; ?>/<?php echo $report_link; ?>/generate/">Download PDF</a>
	</div>
  </div>
  
  
  
  <div class="player-report-web">
    <div class="prw-top">
	  <h2 class="prw-title"><?php echo ucwords($rep['report_title']); ?></h2>
	  <h3 class="prw-name"><?php echo $rep['fullname']; ?></h3>
	  <h4 class="prw-team"><?php echo $rep['team_name'] ?: 'No Team'; ?></h4>
	  <ul class="prw-coach-exam">
	    <li>Coach : <b><?php echo $rep['head_coach'] ?: 'No Coach'; ?></b></li>
	    <li>Examiner : <b><?php echo $rep['examiner_name'] ?: 'No Coach'; ?></b></li>
	  </ul>
	</div>
	
	<ul class="prw-stats">
	  <li class="prw-stat-box prw-stat-overall white-box">
	    <div class="prw-stat-number"><?php echo $rep['overall'] !== null ? $rep['overall'] : '-'; ?></div>
	    <div class="prw-stat-label">Overall</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['pace'] !== null ? $rep['pace'] : '-'; ?></div>
	    <div class="prw-stat-label">Pace</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['passing'] !== null ? $rep['passing'] : '-'; ?></div>
	    <div class="prw-stat-label">Passing</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['dribbling'] !== null ? $rep['dribbling'] : '-'; ?></div>
	    <div class="prw-stat-label">Dribbling</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['shooting'] !== null ? $rep['shooting'] : '-'; ?></div>
	    <div class="prw-stat-label">Shooting</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['physical'] !== null ? $rep['physical'] : '-'; ?></div>
	    <div class="prw-stat-label">Physical</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['attacking'] !== null ? $rep['attacking'] : '-'; ?></div>
	    <div class="prw-stat-label">Attacking</div>
	  </li>
	  <li class="prw-stat-box white-box">
	    <div class="prw-stat-number"><?php echo $rep['defending'] !== null ? $rep['defending'] : '-'; ?></div>
	    <div class="prw-stat-label">Defending</div>
	  </li>
	</ul>
	
	<div class="prw-split">
	  <div class="prw-chart white-box">
	    <div class="prw-chart-frame">
	      <canvas id="radarChart" class="grade-chart"></canvas>
		</div>
	  </div>
	  <div class="prw-info">
	    <div class="prw-comment white-box">
		  <div class="prw-comment-label">Coach's Comments</div>
		  <div class="prw-comment-content"><?php echo nl2br($rep['coach_comment']); ?></div>
		</div>
	    <div class="prw-comment white-box">
		  <div class="prw-comment-label">Recommendation</div>
		  <div class="prw-comment-content"><?php echo nl2br($rep['recommendation']); ?></div>
		</div>
	  </div>
	</div>
  </div>

    <script>
        const ctx = document.getElementById('radarChart').getContext('2d');
        const dataVals = [<?php echo $rep['pace'] ?: 0; ?>, <?php echo $rep['passing'] ?: 0; ?>, <?php echo $rep['dribbling'] ?: 0; ?>, <?php echo $rep['physical'] ?: 0; ?>, <?php echo $rep['attacking'] ?: 0; ?>, <?php echo $rep['defending'] ?: 0; ?>, <?php echo $rep['shooting'] ?: 0; ?>];
        
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Pace', 'Passing', 'Dribbling', 'Physical', 'Attacking', 'Defending', 'Shooting'],
                datasets: [{
                    label: 'Player Stats', data: dataVals, backgroundColor: 'rgba(122, 185, 41, 0.2)', borderColor: 'rgb(122, 185, 41)', pointBackgroundColor: 'rgb(122, 185, 41)'
                }]
            },
            options: { animation: true, scales: { r: { min: 0, max: 10 } }, plugins: { legend: {display: false}} }
        });
    </script>
	
	
	
</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>