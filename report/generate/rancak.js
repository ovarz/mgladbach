document.addEventListener('DOMContentLoaded', () => {
  console.log('DOM READY - Batch System Fixed v4 (Skip Empty Skills)');

  const generateButton = document.getElementById('generate-btn');
  const downloadButton = document.getElementById('download-report-btn');
  const batchButton    = document.getElementById('batch-download-btn');
  const excelInput     = document.getElementById('excel-input');

  const frameFront = document.getElementById('result-preview-front');
  const frameBack  = document.getElementById('result-preview-back');
  const reportChartCanvas = document.getElementById('report-content');

  let mySkillLineChart;
  
  // Variabel global
  let CURRENT_DATA = {
    nameRaw: '',
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
    if (typeof raw === 'number') {
        const date = new Date(Math.round((raw - 25569)*86400*1000));
        return formatDateObject(date);
    }
    let str = raw.toString().trim().replace(/\//g, '-');
    const parts = str.split("-");
    if (parts.length === 3) {
        let y, m, d;
        if (parts[0].length === 4) {
            y = parseInt(parts[0]); m = parseInt(parts[1]) - 1; d = parseInt(parts[2]);
        } else {
            d = parseInt(parts[0]); m = parseInt(parts[1]) - 1; y = parseInt(parts[2]);
        }
        const date = new Date(y, m, d);
        return formatDateObject(date);
    }
    return raw;
  }

  function formatDateObject(date) {
      if(isNaN(date.getTime())) return "";
      const d = date.getDate();
      const m = date.getMonth();
      const y = date.getFullYear();
      const bulanIndo = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      return `${d} ${bulanIndo[m]} ${y}`;
  }

  // Helper: Format Filename
  function formatFileName(name, ageRaw, teamRaw) {
    const cleanName = (name || 'Player').replace(/[^a-zA-Z0-9\s\u00C0-\u00FF]/g, '').trim().replace(/\s+/g, '_');
    const cleanAge = (ageRaw || '').toString().trim().split(/\s+/)[0];
    
    let cleanTeam = '';
    if (teamRaw) {
        cleanTeam = teamRaw.toString().replace(/[^a-zA-Z0-9\s\u00C0-\u00FF]/g, '').replace(/\s+/g, '').trim();
    }

    const now = new Date();
    const monthNames = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    const month = monthNames[now.getMonth()];
    const year  = String(now.getFullYear()).slice(-2);
    const dateSuffix = `${month}${year}`;

    const parts = [cleanAge, cleanTeam, cleanName, dateSuffix].filter(part => part && part.length > 0);
    return parts.join('-') + ".pdf";
  }

  // ======================================================
  // LOGIC DISPLAY UTAMA
  // ======================================================
  async function updateReportView(data = null, isBatch = false) {
    
    const getValue = (id, excelHeader) => {
      if (data && excelHeader) {
          // Mengambil raw data (bisa string kosong, angka, atau undefined)
          return data[excelHeader]; 
      }
      const el = document.getElementById(id);
      return el ? el.value : '';
    };

    // 1. Update Input Form Fields
    for (const [inputId, header] of Object.entries(excelFieldMapping)) {
       const val = getValue(inputId, header);
       const el = document.getElementById(inputId);
       if(el) el.value = val; 
    }

    // 2. Update Skill & Chart Data (PERBAIKAN LOGIKA SKIP KOSONG)
    const skillValues = [];
    
    skillMappings.forEach(m => {
      let rawVal = getValue(m.inputId, m.excelHeader);
      
      // Bersihkan whitespace jika string
      if (typeof rawVal === 'string') rawVal = rawVal.trim();

      let displayVal = ""; // Default text kosong (HTML)
      let chartVal = null; // Default null (Chart.js akan skip titik ini)

      // Cek apakah data TIDAK KOSONG.
      // Jika "0", tetap dianggap ada data. Jika "" (kosong), dianggap tidak ada.
      if (rawVal !== "" && rawVal !== null && rawVal !== undefined) {
          let parsed = parseFloat(rawVal);
          
          if (!isNaN(parsed)) {
              // Pastikan range 0-10
              if (parsed < 0) parsed = 0;
              if (parsed > 10) parsed = 10;
              
              displayVal = parsed; // Tampilkan angka
              chartVal = parsed;   // Masukkan angka ke chart
          }
      }
      
      // A. Update Input form (supaya terlihat di sidebar)
      const elInput = document.getElementById(m.inputId);
      if(elInput) elInput.value = displayVal;
      
      // B. Update Nilai di Kartu (Bulatan Hijau)
      // Jika displayVal "", maka innerText jadi kosong -> bulatan kosong
      const disp = document.getElementById(m.displayId);
      if(disp) disp.innerText = displayVal; 

      // C. Masukkan ke array chart
      skillValues.push(chartVal);
    });

    // 3. Update Text Display
    const nameVal = getValue('name-input', 'Player Name');
    const ageVal = getValue('age-input', 'Age Group');
    const teamVal = getValue('team-input', 'Team Full Name');
    const birthVal = getValue('birth-input', 'Birthdate');
    const coachVal = getValue('coach-input', 'Coach Name');
    const examinerVal = getValue('examiner-input', 'Examiner');

    CURRENT_DATA.nameRaw = nameVal;
    CURRENT_DATA.ageRaw = ageVal;
    CURRENT_DATA.teamRaw = teamVal;

    document.getElementById("name-display").innerText = nameVal;
    document.getElementById("birth-display").innerText = formatBirthDate(birthVal);
    
    const ageDisplayEl = document.getElementById("age-display");
    if (ageDisplayEl) {
       if (ageVal && teamVal) ageDisplayEl.innerText = `${ageVal}/${teamVal}`;
       else ageDisplayEl.innerText = ageVal || teamVal || '';
    }

    document.getElementById("coach-display").innerText = coachVal;

    // Examiner & Tanda Tangan
    const examinerDisplay = document.getElementById("examiner-display");
    const examinerSignatureImg = document.getElementById("examiner-signature-img");
    
    if (examinerDisplay) examinerDisplay.innerText = examinerVal || "Examiner";
    if (examinerSignatureImg) {
        if(examinerVal) {
            const fmt = examinerVal.toString().toLowerCase().replace(/\s+/g, '-').replace(/[^a-z-]/g, '');
            examinerSignatureImg.src = `report/generate/signature-${fmt}.png`;
            examinerSignatureImg.onerror = function() { this.src = 'report/generate/signature.png'; };
        } else {
            examinerSignatureImg.src = `report/generate/signature.png`;
        }
    }

    // Comment Section
    document.getElementById('comment-display').innerText = getValue('comment-input', 'Coach Comment') || "";
    document.getElementById('recommendation-display').innerText = getValue('recommendation-input', 'Recommendation') || "";

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
    if(isBatch) await new Promise(resolve => setTimeout(resolve, 250)); 
  }

  if(generateButton) generateButton.addEventListener('click', () => updateReportView(null, false));

  // ======================================================
  // PDF GENERATION
  // ======================================================
  async function generatePDFBlob(filename) {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF("p", "mm", "a4");
    const pdfWidth = 210; 
    
    const opts = { scale: 2, useCORS: true, allowTaint: true, backgroundColor: null };

    const canvasFront = await html2canvas(frameFront, opts);
    const imgFront = canvasFront.toDataURL("image/jpeg", 0.95);
    const hFront = (canvasFront.height * pdfWidth) / canvasFront.width;
    pdf.addImage(imgFront, "JPEG", 0, 0, pdfWidth, hFront);

    pdf.addPage();
    const canvasBack = await html2canvas(frameBack, opts);
    const imgBack = canvasBack.toDataURL("image/jpeg", 0.95);
    const hBack = (canvasBack.height * pdfWidth) / canvasBack.width;
    pdf.addImage(imgBack, "JPEG", 0, 0, pdfWidth, hBack);

    return pdf.output('blob');
  }

  if(downloadButton) {
      downloadButton.addEventListener('click', async () => {
        if (!mySkillLineChart) { alert("Generate first."); return; }
        const oldText = downloadButton.innerText;
        downloadButton.innerText = "Processing...";
        downloadButton.disabled = true;
        const fName = formatFileName(CURRENT_DATA.nameRaw, CURRENT_DATA.ageRaw, CURRENT_DATA.teamRaw);
        const blob = await generatePDFBlob(fName);
        saveAs(blob, fName);
        downloadButton.innerText = oldText;
        downloadButton.disabled = false;
      });
  }

  // ======================================================
  // BATCH PROCESSING
  // ======================================================
  if(batchButton && excelInput) {
      batchButton.addEventListener('click', () => { excelInput.value = null; excelInput.click(); });

      excelInput.addEventListener('change', async (e) => {
        const file = e.target.files[0];
        if (!file) return;

        batchButton.disabled = true;
        batchButton.innerText = "Reading Data...";

        const reader = new FileReader();
        reader.onload = async (evt) => {
          try {
            const data = new Uint8Array(evt.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const firstSheetName = workbook.SheetNames[0];
            const worksheet = workbook.Sheets[firstSheetName];
            
            // Defval:"" agar sel kosong terbaca string kosong
            const jsonData = XLSX.utils.sheet_to_json(worksheet, { defval: "" });
            
            const validData = jsonData.filter(row => row['Player Name']); 
            if (validData.length === 0) { alert("Data Excel kosong/invalid."); resetBatchButton(); return; }

            await processBatchData(validData);

          } catch (err) {
            console.error(err);
            alert("Error: " + err.message);
            resetBatchButton();
          }
        };
        reader.readAsArrayBuffer(file);
      });
  }

  function resetBatchButton() {
      if(batchButton) {
        batchButton.disabled = false;
        batchButton.innerText = "Upload Excel & Download Zip";
      }
  }

  async function processBatchData(rows) {
    const zip = new JSZip();
    const folder = zip.folder("Player_Reports");
    let count = 0;
    const total = rows.length;

    for (const row of rows) {
        if(batchButton) batchButton.innerText = `Processing ${count+1}/${total}...`;

        await updateReportView(row, true);

        const nameVal = row['Player Name'];
        const ageVal = row['Age Group'];
        const teamVal = row['Team Full Name'];
        
        const fileName = formatFileName(nameVal, ageVal, teamVal);
        const pdfBlob = await generatePDFBlob(fileName);
        folder.file(fileName, pdfBlob);
        count++;
    }

    if(batchButton) batchButton.innerText = "Zipping...";
    const zipContent = await zip.generateAsync({ type: "blob" });
    saveAs(zipContent, `Reports_Bundle_${total}_Players.zip`);
    
    resetBatchButton();
    alert(`Done! ${count} reports generated.`);
  }

});