document.addEventListener('DOMContentLoaded', () => {
    const generateButton = document.querySelector('.button-generate');
    // Elemen utama yang akan di-capture
    const frameToCapture = document.getElementById('result-preview-frame'); 
    const downloadButton = document.getElementById('download-report-btn');

    let mySkillLineChart; 

    // Daftar ID input skill dan pasangannya untuk display
    const skillMappings = [
        { inputId: 'pace-input', displayId: 'pace-display', label: 'Pace' },
        { inputId: 'shooting-input', displayId: 'shooting-display', label: 'Shooting' },
        { inputId: 'passing-input', displayId: 'passing-display', label: 'Passing' },
        { inputId: 'dribbling-input', displayId: 'dribbling-display', label: 'Dribbling' },
        { inputId: 'defending-input', displayId: 'defending-display', label: 'Defending' },
        { inputId: 'physical-input', displayId: 'physical-display', label: 'Physical' },
    ];
    const skillLabels = skillMappings.map(m => m.label);

    // --- Fungsi Generate Report ---
    generateButton.addEventListener('click', () => {
        const skillValues = [];

        // 1. Ambil Nilai Input & Tampilkan di grade-score
        skillMappings.forEach(mapping => {
            const inputElement = document.getElementById(mapping.inputId);
            const displayElement = document.getElementById(mapping.displayId);

            // Ambil dan validasi nilai
            let value = parseInt(inputElement.value) || 0;
            if (value < 0) value = 0;
            if (value > 10) value = 10;
            
            skillValues.push(value);

            // Tampilkan nilai di elemen grade-score
            // Anda bisa tambahkan desain di CSS untuk class .grade-score
            displayElement.innerHTML = `${value}`;
        });

        const coachComment = document.getElementById('comment-input').value.trim();
        const commentDisplay = document.getElementById('comment-display');
        const reportChartContainer = document.getElementById('report-content');

        // 2. Tampilkan Coach's Comment di id="comment-display"
        commentDisplay.innerHTML = `
            <div class="coach-comments-container">${coachComment || "No comment provided."}</p>
        `;

        // 3. Render Chart di id="report-content"
        
        // Hapus konten lama (termasuk canvas) dari report-content
        reportChartContainer.innerHTML = ''; 

        // Buat elemen canvas baru
        const canvas = document.createElement('canvas');
        canvas.id = 'skillLineChart';
        // Tambahkan style untuk ukuran jika perlu, atau atur melalui CSS
        canvas.style.width = '100%';
        canvas.style.height = '300px'; 
        reportChartContainer.appendChild(canvas);
        
        const ctx = canvas.getContext('2d');

        // Hancurkan chart lama jika ada
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
                responsive: false,
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
                    legend: { display: false },
                    title: { display: false }
                }
            }
        });
    });

    // --- Fungsi Download Report ---
    downloadButton.addEventListener('click', () => {
        // Target adalah result-preview-frame yang menampung semua display
        const elementToCapture = frameToCapture; 
        
		const chartCanvas = document.getElementById('skillLineChart');

		if (!chartCanvas) { 
			alert("Please generate the report first.");
			return;
		}

        // Gunakan html2canvas untuk menangkap elemen HTML
        html2canvas(elementToCapture, {
            scale: 3.5, 
            useCORS: true 
        }).then(canvas => {
            const imageDataURL = canvas.toDataURL('image/jpeg', 0.9); 

            // Buat elemen <a> sementara
            const link = document.createElement('a');
            link.href = imageDataURL;
            link.download = 'Player_Report_' + new Date().toISOString().slice(0, 10) + '.jpg';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }).catch(error => {
            console.error('Download failed:', error);
            alert('Could not download report. Check the console for details.');
        });
    });

});