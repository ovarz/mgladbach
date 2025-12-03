document.addEventListener('DOMContentLoaded', () => {

  console.log('DOM READY');

  const generateButton = document.getElementById('generate-btn');
  const downloadButton = document.getElementById('download-report-btn');

  const frameFront = document.getElementById('result-preview-front');
  const frameBack  = document.getElementById('result-preview-back');

  const reportChartCanvas = document.getElementById('report-content');

  console.log('Generate Button:', generateButton);
  console.log('Chart Canvas:', reportChartCanvas);
  console.log('Chart Lib:', typeof Chart);

  if (!generateButton || !reportChartCanvas || typeof Chart === 'undefined') {
    console.error('Salah satu elemen utama tidak ditemukan!');
    return;
  }

  let mySkillLineChart;

  const skillMappings = [
    { inputId: 'pace-input',      displayId: 'pace-display',      label: 'Pace' },
    { inputId: 'shooting-input',  displayId: 'shooting-display',  label: 'Shooting' },
    { inputId: 'passing-input',   displayId: 'passing-display',   label: 'Passing' },
    { inputId: 'dribbling-input', displayId: 'dribbling-display', label: 'Dribbling' },
    { inputId: 'physical-input',  displayId: 'physical-display',  label: 'Physical' },
    { inputId: 'attacking-input', displayId: 'attacking-display', label: 'Attacking' },
    { inputId: 'defending-input', displayId: 'defending-display', label: 'Defending' },
  ];

  const skillLabels = skillMappings.map(m => m.label);

  // ===============================
  // GENERATE FRONT + BACK + CHART
  // ===============================
  generateButton.addEventListener('click', () => {

    console.log('GENERATE CLICKED');

    const skillValues = [];

    skillMappings.forEach(mapping => {
      const inputElement   = document.getElementById(mapping.inputId);
      const displayElement = document.getElementById(mapping.displayId);

      let value = parseInt(inputElement.value) || 0;
      if (value < 0) value = 0;
      if (value > 10) value = 10;

      skillValues.push(value);
      if (displayElement) displayElement.innerText = value;
    });

    console.log('Skill Values:', skillValues);

    // === DATA FRONT ===
    document.getElementById("name-display").innerText =
      document.getElementById("name-input").value;

    document.getElementById("birth-display").innerText =
      document.getElementById("birth-input").value;

    document.getElementById("age-display").innerText =
      document.getElementById("age-input").value;

    document.getElementById("coach-display").innerText =
      document.getElementById("coach-input").value;

    // === COMMENT ===
    const coachComment  = document.getElementById('comment-input').value.trim();
    const commentDisplay = document.getElementById('comment-display');

    commentDisplay.innerHTML = coachComment || "No comment provided.";

    // === COMMENT ===
    const Recommendation  = document.getElementById('recommendation-input').value.trim();
    const RecommendationDisplay = document.getElementById('recommendation-display');

    RecommendationDisplay.innerHTML = Recommendation || "No recommendation provided.";

    // ===============================
    // RENDER CHART (PAKAI CANVAS HTML)
    // ===============================
    const ctx = reportChartCanvas.getContext('2d');

    // pastikan canvas punya tinggi
    reportChartCanvas.style.width  = '100%';
    reportChartCanvas.style.height = '300px';

    if (mySkillLineChart) {
      mySkillLineChart.destroy();
    }

    const customColor = '#23d468';

    mySkillLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: skillLabels,
        datasets: [{
          label: 'Player Skills',
          data: skillValues,
          fill: false,
          borderColor: customColor,
          tension: 0.1,
          pointBackgroundColor: customColor,
          pointBorderColor: '#fff',
          pointRadius: 5,
          pointHoverRadius: 7
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            min: 0,
            max: 10,
            ticks: { stepSize: 2 }
          },
          x: {
            grid: { display: false }
          }
        },
        plugins: {
          legend: { display: false }
        }
      }
    });

    console.log('CHART RENDERED');

  });
  
  
  
  
  
  function formatFileName(name, age) {
  const cleanName = (str) => {
    return str
      .replace(/\//g, '-')          // "/" jadi "-"
      .replace(/\s+/g, '_')         // spasi jadi "_"
      .replace(/[^A-Za-z0-9_-]/g, '') // hanya huruf, angka, "_" dan "-"
      .trim();
  };

  const cleanAge = (str) => {
    return str
      .toLowerCase()
      .replace(/\//g, '-')          // "/" jadi "-"
      .replace(/\s+/g, '')          // spasi dihapus
      .replace(/[^a-z0-9-]/g, '')   // hanya huruf kecil, angka, "-"
      .trim();
  };

  const finalName = cleanName(name || 'Player');
  const finalAge  = cleanAge(age || 'group');

  const now = new Date();
  const monthNames = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
  const month = monthNames[now.getMonth()];
  const year  = String(now.getFullYear()).slice(-2);

  return `${finalAge}-${finalName}-${month}${year}.pdf`;
}


  
  

  // ===============================
  // DOWNLOAD PDF 2 HALAMAN
  // ===============================
  downloadButton.addEventListener('click', async () => {

    const chartCanvas = document.getElementById('report-content');

    if (!chartCanvas || !mySkillLineChart) {
      alert("Please generate the report first.");
      return;
    }

    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF("p", "mm", "a4");
    const pdfWidth = 210;

    try {
      // ===== HALAMAN 1 (FRONT) =====
      const canvasFront = await html2canvas(frameFront, {
        scale: 3,
        useCORS: true
      });

      const imgFront = canvasFront.toDataURL("image/jpeg", 0.95);
      const pdfHeightFront =
        (canvasFront.height * pdfWidth) / canvasFront.width;

      pdf.addImage(imgFront, "JPEG", 0, 0, pdfWidth, pdfHeightFront);

      // ===== HALAMAN 2 (BACK + CHART) =====
      pdf.addPage();

      const canvasBack = await html2canvas(frameBack, {
        scale: 3,
        useCORS: true
      });

      const imgBack = canvasBack.toDataURL("image/jpeg", 0.95);
      const pdfHeightBack =
        (canvasBack.height * pdfWidth) / canvasBack.width;

      pdf.addImage(imgBack, "JPEG", 0, 0, pdfWidth, pdfHeightBack);

      const nameInput = document.getElementById('name-input').value;
      const ageInput  = document.getElementById('age-input').value;
      const fileName = formatFileName(nameInput, ageInput);
      pdf.save(fileName);

    } catch (error) {
      console.error('Download failed:', error);
      alert('Could not download report. Check the console for details.');
    }

  });

});
