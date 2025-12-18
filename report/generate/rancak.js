document.addEventListener('DOMContentLoaded', () => {
  console.log('DOM READY');

  const generateButton = document.getElementById('generate-btn');
  const downloadButton = document.getElementById('download-report-btn');
  const batchButton    = document.getElementById('batch-download-btn');
  const excelInput     = document.getElementById('excel-input');

  const frameFront = document.getElementById('result-preview-front');
  const frameBack  = document.getElementById('result-preview-back');
  const reportChartCanvas = document.getElementById('report-content');

  let mySkillLineChart;
  
  // Variabel global untuk menyimpan raw data saat ini
  let CURRENT_DATA = {
    ageRaw: '',
    teamRaw: ''
  };

  const skillMappings = [
    { inputId: 'pace-input',      displayId: 'pace-display',      label: 'Pace',       excelHeader: 'Pace' },
    { inputId: 'passing-input',   displayId: 'passing-display',   label: 'Passing',    excelHeader: 'Passing' },
    { inputId: 'dribbling-input', displayId: 'dribbling-display', label: 'Dribbling',  excelHeader: 'Dribbling' },
    { inputId: 'physical-input',  displayId: 'physical-display',  label: 'Physical',   excelHeader: 'Physical' },
    { inputId: 'attacking-input', displayId: 'attacking-display', label: 'Attacking',  excelHeader: 'Attacking' },
    { inputId: 'defending-input', displayId: 'defending-display', label: 'Defending',  excelHeader: 'Defending' },
    { inputId: 'shooting-input',  displayId: 'shooting-display',  label: 'Shooting',   excelHeader: 'Shooting' },
  ];
  
  const skillLabels = skillMappings.map(m => m.label);

  // Mapping Input ID ke Header Excel
  const excelFieldMapping = {
    'name-input':           'Player Name',
    'birth-input':          'Birthdate',
    'age-input':            'Age Group',
    'team-input':           'Team Full Name',
    'coach-input':          'Coach Name',
    'examiner-input':       'Examiner',
    'comment-input':        'Coach Comment',
    'recommendation-input': 'Recommendation'
  };

  // Helper: Format Tanggal
  function formatBirthDate(raw) {
    if (!raw) return "";
    // Handle excel date serial number (jika ada)
    if (typeof raw === 'number') {
        const date = new Date(Math.round((raw - 25569)*86400*1000));
        const d = date.getDate();
        const m = date.getMonth();
        const y = date.getFullYear();
        const bulanIndo = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        return `${d} ${bulanIndo[m]} ${y}`;
    }

    raw = raw.toString().trim().replace(/\//g, '-');
    const parts = raw.split("-");
    if (parts.length < 3) return raw;
    let [dd, mm, yy] = parts;
    const bulanIndo = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const bulanNama = bulanIndo[parseInt(mm,10)] || mm;
    if (yy.length === 2) yy = "20" + yy;
    return `${dd} ${bulanNama} ${yy}`;
  }

  // Helper: Format Filename
  function formatFileName(name, ageRaw, teamRaw) {
    const finalName = (name || '').replace(/[^A-Za-z0-9\s]/g, '').trim().replace(/\s+/g, '_');
    const ageToken = (ageRaw || '').toString().trim().split(/\s+/)[0] || 'AGE';
    const teamPart = (teamRaw || '').replace(/[^A-Za-z0-9\s]/g, '').replace(/\s+/g, '').trim() || 'TEAM';
    
    const now = new Date();
    const monthNames = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    const month = monthNames[now.getMonth()];
    const year  = String(now.getFullYear()).slice(-2);

    return `${ageToken}-${teamPart}-${finalName}-${month}${year}.pdf`;
  }

  // ======================================================
  // FUNGSI UTAMA: UPDATE UI & CHART
  // ======================================================
  // Param 'data' opsional. Jika null, ambil dari form input manual.
  // Param 'isBatch' true jika dipanggil dari proses excel (mematikan animasi chart).
  async function updateReportView(data = null, isBatch = false) {
    
    // 1. Tentukan sumber nilai (Form Manual atau Object Excel)
    const getValue = (id, excelHeader) => {
      if (data && excelHeader && data[excelHeader] !== undefined) {
        return data[excelHeader];
      }
      const el = document.getElementById(id);
      return el ? el.value : '';
    };

    // 2. Update Input Fields (DOM) agar html2canvas bisa capture
    // Kita isi value input elementnya juga agar terlihat tersinkronisasi
    for (const [inputId, header] of Object.entries(excelFieldMapping)) {
       const val = getValue(inputId, header);
       const el = document.getElementById(inputId);
       if(el) el.value = val; 
    }

    // Skill Inputs
    const skillValues = [];
    skillMappings.forEach(m => {
      let val = getValue(m.inputId, m.excelHeader);
      val = parseInt(val) || 0;
      if (val < 0) val = 0; 
      if (val > 10) val = 10;
      
      const el = document.getElementById(m.inputId);
      if(el) el.value = val; // update input form visual
      
      const disp = document.getElementById(m.displayId);
      if(disp) disp.innerText = val; // update angka di report card

      skillValues.push(val);
    });

    // 3. Update Teks Display pada Report Card
    const nameVal = getValue('name-input', 'Player Name');
    document.getElementById("name-display").innerText = nameVal;

    const birthVal = getValue('birth-input', 'Birthdate');
    document.getElementById("birth-display").innerText = formatBirthDate(birthVal);

    const ageVal = getValue('age-input', 'Age Group');
    const teamVal = getValue('team-input', 'Team Full Name');
    
    // Simpan ke global untuk penamaan file nanti
    CURRENT_DATA.ageRaw = ageVal;
    CURRENT_DATA.teamRaw = teamVal;

    const ageDisplayEl = document.getElementById("age-display");
    if (ageDisplayEl) {
       if (ageVal && teamVal) ageDisplayEl.innerText = `${ageVal}/${teamVal}`;
       else ageDisplayEl.innerText = ageVal || teamVal || '';
    }

    document.getElementById("coach-display").innerText = getValue('coach-input', 'Coach Name');

    // Examiner & Signature
    const examinerVal = getValue('examiner-input', 'Examiner');
    const examinerDisplay = document.getElementById("examiner-display");
    const examinerSignatureImg = document.getElementById("examiner-signature-img");
    
    if (examinerDisplay) examinerDisplay.innerText = examinerVal || "Examiner";
    if (examinerSignatureImg) {
        if(examinerVal) {
            const fmt = examinerVal.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z-]/g, '');
            examinerSignatureImg.src = `report/generate/signature-${fmt}.png`;
            examinerSignatureImg.onerror = function() { this.src = 'report/generate/signature.png'; };
        } else {
            examinerSignatureImg.src = `report/generate/signature.png`;
        }
    }

    // Comments
    document.getElementById('comment-display').innerHTML = getValue('comment-input', 'Coach Comment') || "No comment provided.";
    document.getElementById('recommendation-display').innerHTML = getValue('recommendation-input', 'Recommendation') || "No recommendation provided.";

    // 4. Render Chart
    const ctx = reportChartCanvas.getContext('2d');
    reportChartCanvas.style.width  = '100%';
    reportChartCanvas.style.height = '300px';

    if (mySkillLineChart) {
      mySkillLineChart.destroy();
    }

    const customColor = '#23d468';
    
    // Konfigurasi Chart
    const chartConfig = {
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
          pointRadius: 5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: isBatch ? false : { duration: 1000 }, // Matikan animasi jika batch
        scales: {
          y: { beginAtZero: true, min: 0, max: 10, ticks: { stepSize: 2 } },
          x: { grid: { display: false } }
        },
        plugins: { legend: { display: false } }
      }
    };

    mySkillLineChart = new Chart(ctx, chartConfig);
    
    // Jika batch, kita beri sedikit delay agar DOM benar-benar ter-render sebelum di-screenshot
    if(isBatch) {
        await new Promise(resolve => setTimeout(resolve, 300)); 
    }
  }

  // Event Listener: Generate Button (Manual)
  generateButton.addEventListener('click', () => {
    updateReportView(null, false);
  });

  // ======================================================
  // FUNGSI PDF GENERATOR (Return Blob)
  // ======================================================
  async function generatePDFBlob(filename) {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF("p", "mm", "a4");
    const pdfWidth = 210;

    // Front
    const canvasFront = await html2canvas(frameFront, { scale: 2, useCORS: true });
    const imgFront = canvasFront.toDataURL("image/jpeg", 0.90);
    const hFront = (canvasFront.height * pdfWidth) / canvasFront.width;
    pdf.addImage(imgFront, "JPEG", 0, 0, pdfWidth, hFront);

    // Back
    pdf.addPage();
    const canvasBack = await html2canvas(frameBack, { scale: 2, useCORS: true });
    const imgBack = canvasBack.toDataURL("image/jpeg", 0.90);
    const hBack = (canvasBack.height * pdfWidth) / canvasBack.width;
    pdf.addImage(imgBack, "JPEG", 0, 0, pdfWidth, hBack);

    return pdf.output('blob');
  }

  // Event Listener: Download Single (Manual)
  downloadButton.addEventListener('click', async () => {
    if (!mySkillLineChart) { alert("Please generate report first."); return; }
    
    downloadButton.innerText = "Processing...";
    const nameVal = document.getElementById('name-input').value;
    const fileName = formatFileName(nameVal, CURRENT_DATA.ageRaw, CURRENT_DATA.teamRaw);
    
    const blob = await generatePDFBlob(fileName);
    saveAs(blob, fileName); // FileSaver.js
    
    downloadButton.innerText = "Download Report";
  });


  // ======================================================
  // LOGIKA BUNDLING / BATCH DOWNLOAD
  // ======================================================
  
  // 1. Klik tombol -> Buka File Dialog
  batchButton.addEventListener('click', () => {
    excelInput.value = null; 
    excelInput.click();
  });

  // 2. Saat File Dipilih
  excelInput.addEventListener('change', async (e) => {
    const file = e.target.files[0];
    if (!file) return;

    batchButton.disabled = true;
    batchButton.innerText = "Reading Excel...";

    const reader = new FileReader();
    reader.onload = async (evt) => {
      try {
        const data = new Uint8Array(evt.target.result);
        const workbook = XLSX.read(data, { type: 'array' });
        
        // Ambil sheet pertama
        const firstSheetName = workbook.SheetNames[0];
        const worksheet = workbook.Sheets[firstSheetName];
        
        // Convert ke JSON
        const jsonData = XLSX.utils.sheet_to_json(worksheet);
        
        if (jsonData.length === 0) {
            alert("Excel file is empty or invalid format.");
            resetBatchButton();
            return;
        }

        await processBatchData(jsonData);

      } catch (err) {
        console.error(err);
        alert("Error processing excel file.");
        resetBatchButton();
      }
    };
    reader.readAsArrayBuffer(file);
  });

  function resetBatchButton() {
      batchButton.disabled = false;
      batchButton.innerText = "Upload Excel & Download Zip";
  }

  // 3. Proses Loop & Zip
  async function processBatchData(rows) {
    const zip = new JSZip();
    const folder = zip.folder("Reports");
    let count = 0;

    batchButton.innerText = `Generating 0/${rows.length}...`;

    for (const row of rows) {
        // Validasi minimal ada nama
        if(!row['Player Name']) continue;

        // A. Update Tampilan dengan data row excel
        await updateReportView(row, true);

        // B. Generate PDF Blob
        const nameVal = row['Player Name'];
        // Ambil raw values langsung dari row untuk penamaan file agar akurat
        const ageRaw = row['Age Group'];
        const teamRaw = row['Team Full Name'];
        
        const fileName = formatFileName(nameVal, ageRaw, teamRaw);
        
        const pdfBlob = await generatePDFBlob(fileName);
        
        // C. Masukkan ke ZIP
        folder.file(fileName, pdfBlob);

        count++;
        batchButton.innerText = `Generating ${count}/${rows.length}...`;
    }

    // 4. Download Final ZIP
    batchButton.innerText = "Zipping...";
    const content = await zip.generateAsync({ type: "blob" });
    saveAs(content, "Player_Reports_Bundle.zip");
    
    resetBatchButton();
    alert(`Success! Generated ${count} reports.`);
  }

});