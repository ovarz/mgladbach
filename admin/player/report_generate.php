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

// --- FORMAT NAMA FILE PDF ---
$raw_title = str_replace(' ', '_', strtolower($rep['report_title']));
$raw_name = str_replace(' ', '_', strtolower($rep['fullname']));
$raw_team = str_replace(' ', '_', strtolower($rep['team_name'] ?: 'no_team'));
$pdf_filename = $raw_title . '-' . $raw_name . '-' . $raw_team . '.pdf';

// Link untuk kembali
$redirect_url = "/admin/player/{$player_code}/{$report_link}/";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <div class="head-top-page head-top-generate">
    <div class="htg-info">
      <h2 class="htp-label">Menyiapkan PDF... Mohon Tunggu</h2>
      <h3 class="htp-label">Anda akan dialihkan kembali dalam beberapa detik.</h3>
	</div>
	<!--
	  <div class="htp-button-list">
        <a title="Edit Report" class="btn" href="/admin/player/<php echo $player_code; ?>/<php echo $report_link; ?>/edit/">Edit Report</a>
        <a title="Generate PDF" class="btn" href="/admin/player/<php echo $player_code; ?>/<php echo $report_link; ?>/generate/">Generate PDF</a>
	  </div>
	-->
  </div>

    
  <div id="showreport" class="report-display">
    <div class="result-preview content-center">
      <div class="result-preview-frame" id="result-preview-front">
        <div class="rpf-bg"><div class="rpf-bg-box"></div><div class="rpf-bg-triangle"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/gimmick.svg')?></div><div class="domain-name">www.mgladbachacademy.id</div></div>
        <div class="rpf-logo-bottom"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/logo-icon.svg')?></div>
        <div class="rpf-content">
          <div class="rpf-logo"><img src="/admin/assets/img/logo.webp"/></div>
          <div class="rpf-head"><div class="rpf-title rpf-title-2">Player <b>Development</b> Report</div><div class="rpf-desc"><b><?php echo ucwords($rep['report_title']); ?></b></div></div>
          <div class="rpf-intro">Borussia Academy Indonesia is dedicated to developing young football players through technical skills, tactical understanding, physical conditioning, and character building. This report provides an evaluation of the player's progress and areas for improvement.</div>
          <div class="rpf-data-player">
            <div class="rpf-data-title">Player Profile</div>
            <ul class="rpf-data-list">
              <li><div class="rpf-dl-box"><div class="rpf-dl-dot"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/dot.svg')?></div><div class="rpf-dl-label">ID</div><div class="rpf-dl-separator">:</div><div class="rpf-dl-display"><?php echo $rep['p_code']; ?></div></div></li>
              <li><div class="rpf-dl-box"><div class="rpf-dl-dot"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/dot.svg')?></div><div class="rpf-dl-label">Name</div><div class="rpf-dl-separator">:</div><div class="rpf-dl-display"><?php echo $rep['fullname']; ?></div></div></li>
              <li><div class="rpf-dl-box"><div class="rpf-dl-dot"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/dot.svg')?></div><div class="rpf-dl-label">Date of Birth</div><div class="rpf-dl-separator">:</div><div class="rpf-dl-display"><?php echo date('j F Y', strtotime($rep['birthday'])); ?></div></div></li>
              <li><div class="rpf-dl-box"><div class="rpf-dl-dot"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/dot.svg')?></div><div class="rpf-dl-label">Team</div><div class="rpf-dl-separator">:</div><div class="rpf-dl-display"><?php echo $rep['team_name'] ?: 'No Team'; ?></div></div></li>
              <li><div class="rpf-dl-box"><div class="rpf-dl-dot"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/dot.svg')?></div><div class="rpf-dl-label">Coach</div><div class="rpf-dl-separator">:</div><div class="rpf-dl-display"><?php echo $rep['head_coach'] ?: 'No Coach'; ?></div></div></li>
            </ul>
          </div>
          <div class="rpf-signature">
            <div class="rpf-signature-box"><div class="rpf-signature-img"><img src="/admin/assets/img/signatures/signature-saras.png"/></div><div class="rpf-signature-info"><div class="rpf-signature-name">Saras Desch</div><div class="rpf-signature-title">CEO/Co-Founder</div><div class="rpf-signature-company">Borussia Academy Indonesia</div></div></div>
            <div class="rpf-signature-box"><div class="rpf-signature-img"><img src="/admin/assets/img/signatures/signature-damai.png"/></div><div class="rpf-signature-info"><div class="rpf-signature-name">Damai Miracle</div><div class="rpf-signature-title">Head Coach</div><div class="rpf-signature-company">Borussia Academy Indonesia</div></div></div>
            <div class="rpf-signature-box"><div class="rpf-signature-img"><?php if($rep['examiner_signature']): ?><img src="/admin/assets/img/signatures/<?php echo $rep['examiner_signature']; ?>" crossorigin="anonymous"/><?php else: ?><img src="/admin/assets/img/signatures/signature.png" crossorigin="anonymous"/><?php endif; ?></div><div class="rpf-signature-info"><div class="rpf-signature-name"><?php echo $rep['examiner_name']; ?></div><div class="rpf-signature-title">Examiner</div><div class="rpf-signature-company">Borussia Academy Indonesia</div></div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="result-preview content-center">
      <div class="result-preview-frame" id="result-preview-back">
        <div class="rpf-bg"><div class="rpf-bg-box"></div><div class="rpf-bg-triangle"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/icon/gimmick.svg')?></div></div>
        <div class="rpf-logo-bottom"><?php require ($_SERVER['DOCUMENT_ROOT'].'/admin/assets/img/logo-icon.svg')?></div>
        <div class="rpf-content">
          <div class="rpf-logo"><img src="/admin/assets/img/logo.webp"/></div>
          <div class="rpf-head"><div class="rpf-title">Guide to The Report Card:</div><div class="rpf-desc"><p>Each skill is graded on a scale of 1-10, where:</p><ul><li>1-3 = Need Significant Improvement</li><li>4-6 = Developing</li><li>7-9 = Good</li><li>10 = Excellent</li></ul><p>This evaluation reflects both training sessions and match performance.</p></div></div>
          <div class="rpf-data">
            <div class="rpf-table">
              <div class="rpf-row rpf-table-head"><div class="rpf-label">Skill Category</div><div class="rpf-score">Grade (1-10)</div></div>
              <div class="rpf-row"><div class="rpf-label">Pace</div><div class="rpf-score grade-score"><?php echo $rep['pace'] !== null ? $rep['pace'] : '-'; ?></div></div>
              <div class="rpf-row"><div class="rpf-label">Passing</div><div class="rpf-score grade-score"><?php echo $rep['passing'] !== null ? $rep['passing'] : '-'; ?></div></div>
              <div class="rpf-row"><div class="rpf-label">Dribbling</div><div class="rpf-score grade-score"><?php echo $rep['dribbling'] !== null ? $rep['dribbling'] : '-'; ?></div></div>
              <div class="rpf-row"><div class="rpf-label">Shooting</div><div class="rpf-score grade-score"><?php echo $rep['shooting'] !== null ? $rep['shooting'] : '-'; ?></div></div>
              <div class="rpf-row"><div class="rpf-label">Physical</div><div class="rpf-score grade-score"><?php echo $rep['physical'] !== null ? $rep['physical'] : '-'; ?></div></div>
              <div class="rpf-row"><div class="rpf-label">Attacking</div><div class="rpf-score grade-score"><?php echo $rep['attacking'] !== null ? $rep['attacking'] : '-'; ?></div></div>
              <div class="rpf-row"><div class="rpf-label">Defending</div><div class="rpf-score grade-score"><?php echo $rep['defending'] !== null ? $rep['defending'] : '-'; ?></div></div>
            </div>
            <div class="rpf-graph"><canvas id="radarChart" class="grade-chart"></canvas></div>
          </div>
          <div class="coach-comments"><div class="coach-comments-label">Coach's Comments :</div><div class="grade-comment"><?php echo nl2br($rep['coach_comment']); ?></div></div>
          <div class="coach-comments"><div class="coach-comments-label">Recommendation :</div><div class="grade-comment"><?php echo nl2br($rep['recommendation']); ?></div></div>
        </div>
      </div>
    </div>
  </div>
  
    

    <script>
        // Setup Grafik dengan animasi dimatikan
        const ctx = document.getElementById('radarChart').getContext('2d');
        const dataVals = [<?php echo $rep['pace'] ?: 0; ?>, <?php echo $rep['passing'] ?: 0; ?>, <?php echo $rep['dribbling'] ?: 0; ?>, <?php echo $rep['physical'] ?: 0; ?>, <?php echo $rep['attacking'] ?: 0; ?>, <?php echo $rep['defending'] ?: 0; ?>, <?php echo $rep['shooting'] ?: 0; ?>];
        
        new Chart(ctx, {
            type: 'radar',
            data: { labels: ['Pace', 'Passing', 'Dribbling', 'Physical', 'Attacking', 'Defending', 'Shooting'], datasets: [{ label: 'Player Stats', data: dataVals, backgroundColor: 'rgba(122, 185, 41, 0.2)', borderColor: 'rgb(122, 185, 41)', pointBackgroundColor: 'rgb(122, 185, 41)' }] },
            options: { animation: false, scales: { r: { min: 0, max: 10 } } }
        });

        // Script Download Otomatis saat Window siap
        window.jsPDF = window.jspdf.jsPDF;
        window.onload = function() {
            // Beri jeda 500ms agar font & gambar benar-benar tuntas di-render
            setTimeout(async () => {
                window.scrollTo(0, 0);
                const reportDisplay = document.getElementById('showreport');
				try {
				    reportDisplay.style.zoom = '1';
					await new Promise(resolve => setTimeout(resolve, 300));
					
                    const pdf = new jsPDF('p', 'mm', 'a4');
                    const pdfWidth = pdf.internal.pageSize.getWidth(); 
                    const pdfHeight = pdf.internal.pageSize.getHeight(); 

                    const page1 = document.getElementById('result-preview-front');
                    const canvas1 = await html2canvas(page1, { scale: 2, useCORS: true });
                    pdf.addImage(canvas1.toDataURL('image/png'), 'PNG', 0, 0, pdfWidth, pdfHeight);

                    pdf.addPage();

                    const page2 = document.getElementById('result-preview-back');
                    const canvas2 = await html2canvas(page2, { scale: 2, useCORS: true });
                    pdf.addImage(canvas2.toDataURL('image/png'), 'PNG', 0, 0, pdfWidth, pdfHeight);

                    pdf.save('<?php echo $pdf_filename; ?>');
                } catch (error) {
                    console.error("Error generating PDF: ", error);
                    alert("Terjadi kesalahan saat memproses PDF.");
                } finally {
                    reportDisplay.style.zoom = '';
                    //window.location.href = '<php echo $redirect_url; ?>';
                }
            }, 500);
        };
    </script>
	
	
	
</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>