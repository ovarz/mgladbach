
document.addEventListener('DOMContentLoaded', () => {
  console.log('DOM READY');

  const generateButton = document.getElementById('generate-btn');
  const downloadButton = document.getElementById('download-report-btn');

  const frameFront = document.getElementById('result-preview-front');
  const frameBack  = document.getElementById('result-preview-back');

  const reportChartCanvas = document.getElementById('report-content');

  if (!generateButton || !reportChartCanvas || typeof Chart === 'undefined') {
    console.error('Salah satu elemen utama tidak ditemukan!');
    return;
  }

  let mySkillLineChart;
  let RAW_AGE_VALUE = "";   // simpan age input asli
  let RAW_TEAM_VALUE = "";  // simpan team input asli

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

  // format birth date dd-mm-yy -> "dd Month yyyy"
  function formatBirthDate(raw) {
    if (!raw) return "";
    raw = raw.toString().trim().replace(/\//g, '-');
    const parts = raw.split("-");
    if (parts.length < 3) return raw;
    let [dd, mm, yy] = parts;
    dd = dd.trim();
    mm = mm.trim();
    yy = yy.trim();
    const bulanIndo = [
      "", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
      "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    const bulanNama = bulanIndo[parseInt(mm,10)] || mm;
    if (yy.length === 2) { yy = "20" + yy; }
    return `${dd} ${bulanNama} ${yy}`;
  }

  // ======================================================
  // GENERATE FRONT + BACK + CHART
  // ======================================================
  generateButton.addEventListener('click', () => {
    console.log('GENERATE CLICKED');

    const skillValues = [];

    skillMappings.forEach(mapping => {
      const inputElement   = document.getElementById(mapping.inputId);
      const displayElement = document.getElementById(mapping.displayId);

      let value = parseInt(inputElement && inputElement.value) || 0;
      if (value < 0) value = 0;
      if (value > 10) value = 10;

      skillValues.push(value);
      if (displayElement) displayElement.innerText = value;
    });

    console.log('Skill Values:', skillValues);

    // Ambil RAW values dari inputs (SEBELUM merubah DOM)
    RAW_AGE_VALUE = (document.getElementById("age-input") && document.getElementById("age-input").value) ? document.getElementById("age-input").value.trim() : '';
    RAW_TEAM_VALUE = (document.getElementById("team-input") && document.getElementById("team-input").value) ? document.getElementById("team-input").value.trim() : '';

    // === DATA FRONT === (tampilkan)
    document.getElementById("name-display").innerText =
      document.getElementById("name-input").value || '';

    // format birth date before displaying
    const rawBirth = (document.getElementById("birth-input") && document.getElementById("birth-input").value) || '';
    document.getElementById("birth-display").innerText = formatBirthDate(rawBirth);

    // gabungkan age + team di age-display sesuai permintaan: "age/team"
    const ageDisplayEl = document.getElementById("age-display");
    if (ageDisplayEl) {
      if (RAW_AGE_VALUE && RAW_TEAM_VALUE) {
        ageDisplayEl.innerText = `${RAW_AGE_VALUE}/${RAW_TEAM_VALUE}`;
      } else if (RAW_AGE_VALUE) {
        ageDisplayEl.innerText = RAW_AGE_VALUE;
      } else if (RAW_TEAM_VALUE) {
        ageDisplayEl.innerText = RAW_TEAM_VALUE;
      } else {
        ageDisplayEl.innerText = '';
      }
    }

    document.getElementById("coach-display").innerText =
      (document.getElementById("coach-input") && document.getElementById("coach-input").value) || '';

    // === EXAMINER → DISPLAY + SIGNATURE IMAGE ===
    const examinerValue = (document.getElementById("examiner-input") && document.getElementById("examiner-input").value) || '';
    const examinerDisplay = document.getElementById("examiner-display");
    const examinerSignatureImg = document.getElementById("examiner-signature-img");

    if (examinerDisplay) {
      examinerDisplay.innerText = examinerValue || "Examiner";
    }

    if (examinerSignatureImg && examinerValue) {
      const formattedExaminer = examinerValue
        .toLowerCase()
        .replace(/\s+/g, '-')
        .replace(/[^a-z-]/g, '');
      examinerSignatureImg.src = `report/generate/signature-${formattedExaminer}.png`;
      examinerSignatureImg.onerror = function() { this.src = 'report/generate/signature.png'; };
    } else if (examinerSignatureImg) {
      examinerSignatureImg.src = `report/generate/signature.png`;
    }

    // === COMMENT ===
    const coachComment = (document.getElementById('comment-input') && document.getElementById('comment-input').value) ? document.getElementById('comment-input').value.trim() : '';
    const commentDisplay = document.getElementById('comment-display');
    if (commentDisplay) commentDisplay.innerHTML = coachComment || "No comment provided.";

    // Recommendation
    const Recommendation = (document.getElementById('recommendation-input') && document.getElementById('recommendation-input').value) ? document.getElementById('recommendation-input').value.trim() : '';
    const RecommendationDisplay = document.getElementById('recommendation-display');
    if (RecommendationDisplay) RecommendationDisplay.innerHTML = Recommendation || "No recommendation provided.";

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
          x: { grid: { display: false } }
        },
        plugins: { legend: { display: false } }
      }
    });

    console.log('CHART RENDERED');
  });

  // ======================================================
  //   FORMAT FILENAME — MENGGUNAKAN age-input & team-input
  // ======================================================
  function formatFileName(name, ageRaw, teamRaw) {
    // name: preserve capitalization, spaces -> underscore, remove symbols
    const finalName = (name || '')
      .replace(/[^A-Za-z0-9\s]/g, '')
      .trim()
      .replace(/\s+/g, '_');

    // age token = langsung ageRaw first word (preserve)
    const ageToken = (ageRaw || '').toString().trim().split(/\s+/)[0] || 'AGE';

    // team part = remove symbols, remove spaces, preserve casing
    const teamPart = (teamRaw || '')
      .replace(/[^A-Za-z0-9\s]/g, '') // remove symbols but keep letters/numbers/spaces
      .replace(/\s+/g, '')           // remove spaces
      .trim() || 'TEAM';

    // month-year
    const now = new Date();
    const monthNames = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    const month = monthNames[now.getMonth()];
    const year  = String(now.getFullYear()).slice(-2);

    return `${ageToken}-${teamPart}-${finalName}-${month}${year}.pdf`;
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

      // ===== FILENAME (PAKAI RAW VALUES YG TERSIMPAN SAAT GENERATE) =====
      const nameInput = (document.getElementById('name-input') && document.getElementById('name-input').value) || '';
      // gunakan RAW_AGE_VALUE dan RAW_TEAM_VALUE yang disimpan saat generate
      const fileName = formatFileName(nameInput, RAW_AGE_VALUE, RAW_TEAM_VALUE);

      console.log("Saving File:", fileName);
      pdf.save(fileName);

    } catch (error) {
      console.error('Download failed:', error);
      alert('Could not download report. Check the console for details.');
    }

  });

});
