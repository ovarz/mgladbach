<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Keamanan: Hanya player yang sedang login yang boleh mengakses halamannya sendiri
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'player') {
    header("Location: /login/");
    exit();
}

$player_code = $conn->real_escape_string($_GET['id']);
if ($_SESSION['player_code'] !== $player_code) {
    die("Access Denied: You cannot view other player's report.");
}

$report_link = $conn->real_escape_string($_GET['link']);

// Ambil data report beserta relasi tabelnya
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" />
    <title>Report Detail</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <div>
        <button onclick="downloadPDF()">Download PDF</button>
        <a href="/player/<?php echo $player_code; ?>/"><button>Back</button></a>
    </div>

    <hr>
    
    <div id="showreport" style="width: 800px; padding: 20px; background: white;">
        <h2>Report: <?php echo ucwords($rep['report_title']); ?></h2>
        
        <div>Player ID: <?php echo $rep['p_code']; ?></div>
        <div>Full Name: <?php echo $rep['fullname']; ?></div>
        <div>Birthday: <?php echo $rep['birthday']; ?></div>
        <div>Team: <?php echo $rep['team_name'] ?: 'No Team'; ?></div>
        <div>Head Coach: <?php echo $rep['head_coach'] ?: 'No Coach'; ?></div>
        
        <br>
        <div>Pace: <?php echo $rep['pace'] !== null ? $rep['pace'] : '-'; ?></div>
        <div>Passing: <?php echo $rep['passing'] !== null ? $rep['passing'] : '-'; ?></div>
        <div>Dribbling: <?php echo $rep['dribbling'] !== null ? $rep['dribbling'] : '-'; ?></div>
        <div>Physical: <?php echo $rep['physical'] !== null ? $rep['physical'] : '-'; ?></div>
        <div>Attacking: <?php echo $rep['attacking'] !== null ? $rep['attacking'] : '-'; ?></div>
        <div>Defending: <?php echo $rep['defending'] !== null ? $rep['defending'] : '-'; ?></div>
        <div>Shooting: <?php echo $rep['shooting'] !== null ? $rep['shooting'] : '-'; ?></div>
        <div><b>Overall: <?php echo $rep['overall']; ?></b></div>
        
        <br>
        <div style="width: 400px; height: 400px;">
            <canvas id="radarChart"></canvas>
        </div>

        <br>
        <div>Coach Comment: <br><?php echo nl2br($rep['coach_comment']); ?></div>
        <br>
        <div>Recommendation: <br><?php echo nl2br($rep['recommendation']); ?></div>

        <br><br>
        <div>
            <b>Signatures:</b><br>
            <div style="display:inline-block; margin-right: 20px;">
                <img src="/admin/template/img/signature-saras.png" width="100" crossorigin="anonymous"><br>
                Saras Desch
            </div>
            <div style="display:inline-block; margin-right: 20px;">
                <img src="/admin/template/img/signature-damai.png" width="100" crossorigin="anonymous"><br>
                Damai Miracle
            </div>
            <div style="display:inline-block;">
                <?php if($rep['examiner_signature']): ?>
                    <img src="/uploads/signatures/<?php echo $rep['examiner_signature']; ?>" width="100" crossorigin="anonymous"><br>
                <?php else: ?>
                    <div style="width:100px; height:50px;"></div><br>
                <?php endif; ?>
                Examiner: <?php echo $rep['examiner_name']; ?>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi Chart.js
        const ctx = document.getElementById('radarChart').getContext('2d');
        const dataVals = [
            <?php echo $rep['pace'] !== null ? $rep['pace'] : 0; ?>, 
            <?php echo $rep['passing'] !== null ? $rep['passing'] : 0; ?>, 
            <?php echo $rep['dribbling'] !== null ? $rep['dribbling'] : 0; ?>, 
            <?php echo $rep['physical'] !== null ? $rep['physical'] : 0; ?>, 
            <?php echo $rep['attacking'] !== null ? $rep['attacking'] : 0; ?>, 
            <?php echo $rep['defending'] !== null ? $rep['defending'] : 0; ?>, 
            <?php echo $rep['shooting'] !== null ? $rep['shooting'] : 0; ?>
        ];
        
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Pace', 'Passing', 'Dribbling', 'Physical', 'Attacking', 'Defending', 'Shooting'],
                datasets: [{
                    label: 'Player Stats',
                    data: dataVals,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)'
                }]
            },
            options: { scales: { r: { min: 0, max: 10 } } }
        });

        // Script html2canvas dan jsPDF
        window.jsPDF = window.jspdf.jsPDF;
        function downloadPDF() {
            const element = document.getElementById('showreport');
            html2canvas(element, { scale: 2, useCORS: true }).then((canvas) => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('<?php echo $rep['p_code'] . "_" . $report_link; ?>.pdf');
            });
        }
    </script>
</body>
</html>