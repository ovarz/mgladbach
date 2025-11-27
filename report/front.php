<?php 
  $lang='id';
  $menu='Report';
  $template='default';
  require ('../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'report/meta.php')?>
<div class="rancak-foundation">



  <div class="sidebar">
    <div class="sidebar-container">
      <div class="sidebar-logo"><img alt="<?php echo $sitename; ?>" src="template/img/logo.png?<?php echo $anticache; ?>"/></div>
      <div class="sidebar-tab">
        <a title="Front" class="sidebar-tab-button sidebar-tab-curr" href="report/">Front</a>
        <a title="Back" class="sidebar-tab-button" href="report/back.php">Back</a>
      </div>
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
          <div class="sfr-label">Age Group / Team</div>
          <div class="form-box">
            <input id="age-input" placeholder="" type="text" value="" class="form-field">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <div class="sfr-label">Coach</div>
          <div class="form-box">
            <input id="coach-input" placeholder="" type="text" value="" class="form-field">
          </div>
        </li>
        <li class="sidebar-form-row sidebar-form-full">
          <button title="Generate Report" class="btn button-generate">Generate Report</button>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="result">
    <div class="result-preview content-center">
      <div class="result-preview-frame" id="result-preview-frame">
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
		    <div class="rpf-desc">January - July 2025 Period</div>
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
		</div>
      </div>
	</div>
	<div class="result-download">
	  <button id="download-report-btn" title="Download Report" class="btn button-download">Download Report</button>
	</div>
  </div>
  
  
  
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="report/front.js"></script>
</body>
</html>