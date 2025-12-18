<?php 
  $lang='id';
  $menu='Report';
  $template='default';
  require ('../../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'report/generate/meta.php')?>
<div class="rancak-foundation">



  <div class="sidebar">
    <div class="sidebar-container">
      <div class="sidebar-logo"><img alt="<?php echo $sitename; ?>" src="template/img/logo.png?<?php echo $anticache; ?>"/></div>
      <ul class="sidebar-form">
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Name</div>
          <div class="form-box">
		    <input id="name-input" placeholder="" type="text" value="" class="form-field">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Date of Birth</div>
          <div class="form-box">
            <input id="birth-input" placeholder="" type="text" value="" class="form-field">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Age Group</div>
          <div class="form-box">
            <input id="age-input" placeholder="" type="text" value="" class="form-field">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Team</div>
          <div class="form-box">
            <input id="team-input" placeholder="" type="text" value="" class="form-field">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Coach</div>
          <div class="form-box">
			<select id="coach-input" class="form-field">
			  <option value="">-- Select Coach --</option>
			  <option value="Damai">Damai</option>
			  <option value="Ali">Ali</option>
			  <option value="Alfons">Alfons</option>
			  <option value="Fabrice">Fabrice</option>
			  <option value="Simic">Simic</option>
			  <option value="Michael">Michael</option>
			  <option value="Haikal">Haikal</option>
			  <option value="Mikail">Mikail</option>
			  <option value="Rafly">Rafly</option>
			  <option value="Savvy">Savvy</option>
			  <option value="Machmud">Machmud</option>
			  <option value="Reyhan">Reyhan</option>
			  <option value="Septian">Septian</option>
			  <option value="Danen">Danen</option>
			  <option value="Nicholas">Nicholas</option>
			  <option value="Kenda">Kenda</option>
			</select>
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Examiner</div>
          <div class="form-box">
			<select id="examiner-input" class="form-field">
			  <option value="">-- Select Examiner --</option>
			  <option value="Damai">Damai</option>
			  <option value="Ali">Ali</option>
			  <option value="Alfons">Alfons</option>
			  <option value="Fabrice">Fabrice</option>
			  <option value="Simic">Simic</option>
			  <option value="Michael">Michael</option>
			  <option value="Haikal">Haikal</option>
			  <option value="Mikail">Mikail</option>
			  <option value="Rafly">Rafly</option>
			  <option value="Savvy">Savvy</option>
			  <option value="Machmud">Machmud</option>
			  <option value="Reyhan">Reyhan</option>
			  <option value="Septian">Septian</option>
			  <option value="Danen">Danen</option>
			  <option value="Nicholas">Nicholas</option>
			  <option value="Kenda">Kenda</option>
			</select>
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Pace</div>
          <div class="form-box">
		    <input id="pace-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Passing</div>
          <div class="form-box">
            <input id="passing-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Dribbling</div>
          <div class="form-box">
            <input id="dribbling-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Physical</div>
          <div class="form-box">
            <input id="physical-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Attacking</div>
          <div class="form-box">
            <input id="attacking-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Defending</div>
          <div class="form-box">
            <input id="defending-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row">
          <div class="sfr-label">Shooting</div>
          <div class="form-box">
            <input id="shooting-input" placeholder="0" type="number" value="" class="form-field" min="0" max="10">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Coach's Comment (Max 165 Char) :</div>
          <div class="form-box">
            <textarea id="comment-input" placeholder="Coach's Comment" class="form-field"></textarea>
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Recommendation (Max 165 Char) :</div>
          <div class="form-box">
            <textarea id="recommendation-input" placeholder="Recommendation" class="form-field"></textarea>
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <button title="Generate Report" id="generate-btn" class="btn button-generate">Generate Report</button>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="result">
    <div class="result-preview content-center">
      <div class="result-preview-frame" id="result-preview-front">
	    <div class="rpf-bg">
		  <div class="rpf-bg-box"></div>
		  <div class="rpf-bg-triangle"><?php require ($_SERVER['BMG'].'template/img/icon/gimmick.svg')?></div>
		  <div class="domain-name">www.mgladbachacademy.id</div>
		</div>
		<div class="rpf-logo-bottom"><?php require ($_SERVER['BMG'].'template/img/logo-icon.svg')?></div>
		<div class="rpf-content">
		  <div class="rpf-logo"><img src="template/img/logo-black.webp"/></div>
		  <div class="rpf-head">
		    <div class="rpf-title rpf-title-2">Player <b>Development</b> Report</div>
		    <div class="rpf-desc">July - December 2025 Period</div>
		  </div>
		  <div class="rpf-intro">
		    Borussia Academy Indonesia is dedicated to developing young football players through technical skills, tactical understanding, physical conditioning, and character building. This report provides an evaluation of the player's progress and areas for improvement.
		  </div>
		  <div class="rpf-data-player">
		    <div class="rpf-data-title">Player Profile</div>
			<ul class="rpf-data-list">
			  <li>
			    <div class="rpf-dl-box">
                  <div class="rpf-dl-dot"><?php require ($_SERVER['BMG'].'template/img/icon/dot.svg')?></div>
                  <div class="rpf-dl-label">Name</div>
                  <div class="rpf-dl-separator">:</div>
                  <div id="name-display" class="rpf-dl-display"></div>
				</div>
			  </li>
			  <li>
			    <div class="rpf-dl-box">
                  <div class="rpf-dl-dot"><?php require ($_SERVER['BMG'].'template/img/icon/dot.svg')?></div>
                  <div class="rpf-dl-label">Date of Birth</div>
                  <div class="rpf-dl-separator">:</div>
                  <div id="birth-display" class="rpf-dl-display"></div>
				</div>
			  </li>
			  <li>
			    <div class="rpf-dl-box">
                  <div class="rpf-dl-dot"><?php require ($_SERVER['BMG'].'template/img/icon/dot.svg')?></div>
                  <div class="rpf-dl-label">Age Group / Team</div>
                  <div class="rpf-dl-separator">:</div>
                  <div id="age-display" class="rpf-dl-display"></div>
				</div>
			  </li>
			  <li>
			    <div class="rpf-dl-box">
                  <div class="rpf-dl-dot"><?php require ($_SERVER['BMG'].'template/img/icon/dot.svg')?></div>
                  <div class="rpf-dl-label">Coach</div>
                  <div class="rpf-dl-separator">:</div>
                  <div id="coach-display" class="rpf-dl-display"></div>
				</div>
			  </li>
			</ul>
		  </div>
		  <div class="rpf-signature">
		    <div class="rpf-signature-box">
			  <div class="rpf-signature-img"><img src="report/generate/signature.png"/></div>
			  <div class="rpf-signature-info">
			    <div class="rpf-signature-name">Saras Desch</div>
			    <div class="rpf-signature-title">CEO/Co-Founder</div>
			    <div class="rpf-signature-company">Borussia Academy Indonesia</div>
			  </div>
			</div>
		    <div class="rpf-signature-box">
			  <div class="rpf-signature-img"><img src="report/generate/signature.png"/></div>
			  <div class="rpf-signature-info">
			    <div class="rpf-signature-name">Damai Miracle</div>
			    <div class="rpf-signature-title">Head Coach</div>
			    <div class="rpf-signature-company">Borussia Academy Indonesia</div>
			  </div>
			</div>
		    <div class="rpf-signature-box">
			  <div class="rpf-signature-img"><img id="examiner-signature-img" src="report/generate/signature.png"/></div>
			  <div class="rpf-signature-info">
			    <div class="rpf-signature-name" id="examiner-display">Lorem Ipsum</div>
			    <div class="rpf-signature-title">Examiner</div>
			    <div class="rpf-signature-company">Borussia Academy Indonesia</div>
			  </div>
			</div>
		  </div>
		</div>
      </div>
	</div>
	
    <div class="result-preview content-center">
      <div class="result-preview-frame" id="result-preview-back">
	    <div class="rpf-bg">
		  <div class="rpf-bg-box"></div>
		  <div class="rpf-bg-triangle"><?php require ($_SERVER['BMG'].'template/img/icon/gimmick.svg')?></div>
		</div>
		<div class="rpf-logo-bottom"><?php require ($_SERVER['BMG'].'template/img/logo-icon.svg')?></div>
		<div class="rpf-content">
		  <div class="rpf-logo"><img src="template/img/logo-black.webp"/></div>
		  <div class="rpf-head">
		    <div class="rpf-title">Guide to The Report Card:</div>
		    <div class="rpf-desc">
			  <p>Each skill is graded on a scale of 1-10, where:</p>
			  <ul>
			    <li>1-3 = Need Significant Improvement</li>
			    <li>4-6 = Developing</li>
			    <li>7-9 = Good</li>
			    <li>10 = Excellent</li>
			  </ul>
			  <p>This evaluation reflects both training sessions and match performance.</p>
			</div>
		  </div>
		  <div class="rpf-data">
		    <div class="rpf-table">
			  <div class="rpf-row rpf-table-head">
			    <div class="rpf-label">Skill Category</div>
				<div class="rpf-score">Grade (1-10)</div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Pace</div>
				<div id="pace-display" class="rpf-score grade-score"></div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Passing</div>
          		<div id="passing-display" class="rpf-score grade-score"></div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Dribbling</div>
          		<div id="dribbling-display" class="rpf-score grade-score"></div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Physical</div>
          		<div id="physical-display" class="rpf-score grade-score"></div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Attacking</div>
          		<div id="attacking-display" class="rpf-score grade-score"></div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Defending</div>
          		<div id="defending-display" class="rpf-score grade-score"></div>
			  </div>
			  <div class="rpf-row">
			    <div class="rpf-label">Shooting</div>
          		<div id="shooting-display" class="rpf-score grade-score"></div>
			  </div>
			</div>
			<div class="rpf-graph">
			  <canvas id="report-content" class="grade-chart"></canvas>
			</div>
		  </div>
		  <div class="coach-comments">
		    <div class="coach-comments-label">Coach's Comments:</div>
            <div id="comment-display" class="grade-comment"></div>
		  </div>
		  <div class="coach-comments">
		    <div class="coach-comments-label">Recommendation:</div>
            <div id="recommendation-display" class="grade-comment"></div>
		  </div>
		</div>
      </div>
	</div>
	
	<div class="result-download">
	  <input type="file" id="excel-input" accept=".xlsx, .xls" style="display:none;" />
	  
	  <button id="download-report-btn" title="Download Report" class="btn button-download">Download Report</button>
	  
	  <button id="batch-download-btn" title="Download Bundling (.zip)" class="btn button-download">Upload Excel & Download Zip</button>
	</div>
  </div>
  
  
  
</div>

<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="report/generate/rancak.js"></script>
</body>
</html>