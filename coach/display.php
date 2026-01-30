<section class="section-default section-view-report content-center">
  <div class="site-container">
    <div class="svr-header">
      <div class="svr-info">
        <h2 class="svr-name"><?php echo $nickname;?></h2>
        <h3 class="svr-team"><?php echo $position;?></h3>
      </div>
      <div class="svr-download">
	    <a title="Logout" class="btn svr-download-button" href="coach/logout.php">
          <span class="text-id">Keluar</span>
          <span class="text-en">Logout</span>
          <span class="text-de">Herunterladen</span>
	    </a>
	  </div>
    </div>
    
	
	<div class="white-box coach-profile">
	  <div class="coach-photo">
	    <div class="coach-photo-frame img-frame thumb-loading">
          <img title="<?php echo $nickname;?> Photo" class="lazyload" data-original="template/img/coach/<?php echo $nickname;?>.png?v6"/>
		</div>
	  </div>
	  <div class="coach-info">
		<div class="quick-access">
          <button title="Absence" class="btn svr-download-button open-sticky" aria-popup-button="AbsencePopup">
            <span class="text-id">Absence</span>
            <span class="text-en">Absence</span>
            <span class="text-de">Absence</span>
          </button>
          <button title="Feedback" class="btn svr-download-button open-sticky" aria-popup-button="FeedbackPopup">
            <span class="text-id">Feedback</span>
            <span class="text-en">Feedback</span>
            <span class="text-de">Feedback</span>
          </button>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Nama Lengkap</span>
            <span class="text-en">Full Name</span>
            <span class="text-de">Vollständiger Name</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $name;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Tanggal Lahir</span>
            <span class="text-en">Birth Date</span>
            <span class="text-de">Geburtsdatum</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $birtdate;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Usia</span>
            <span class="text-en">Age</span>
            <span class="text-de">Alter</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $umur->y;?> years old</div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Email</span>
            <span class="text-en">Email</span>
            <span class="text-de">Email</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Telepon</span>
            <span class="text-en">Phone</span>
            <span class="text-de">Telefon</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><a href="tel:<?php echo $phone;?>"><?php echo $phone;?></a></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Alamat</span>
            <span class="text-en">Address</span>
            <span class="text-de">Adresse</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $address;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Tanggal Bergabung</span>
            <span class="text-en">Join Date</span>
            <span class="text-de">Eintrittsdatum</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $joindate;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Posisi</span>
            <span class="text-en">Position</span>
            <span class="text-de">Position</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $position;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Jadwal</span>
            <span class="text-en">Schedule</span>
            <span class="text-de">Zeitplan</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $schedule;?></div>
		</div>
	  </div>
	  
      <div class="training-plan">
        <div class="section-title">
          <span class="text-id">Rencana Latihan</span>
          <span class="text-en">Training Plan</span>
          <span class="text-de">Trainingsplan</span>
          <button title="Training Plan" class="btn svr-download-button open-sticky" aria-popup-button="TrainingPlanPopup">
            <span class="text-id">Unggah Rencana Latihan</span>
            <span class="text-en">Upload Training Plan</span>
            <span class="text-de">Trainingsplan hochladen</span>
          </button>
		</div>
		<div class="gdrive-embed">
		  <iframe src="https://drive.google.com/embeddedfolderview?id=<?php echo $trainingplan;?>#list" style="width:100%; height:600px; border:0;"></iframe>
		</div>
      </div>
	
	</div>
  </div>
</section>



<script src='https://cdn.jotfor.ms/s/umd/latest/for-form-embed-handler.js'></script>



<div class="rancak-popup absence-popup" aria-popup-box="AbsencePopup">
  <div class="rancak-popup-container content-center">
    <div class="rancak-popup-overlay"></div>
	<div class="rancak-popup-content absence-popup-container">
      <button title="Close" class="rancak-popup-close content-center">
        <?php require ($_SERVER['BMG'].'template/img/icon/close-popup.svg')?>
      </button>
      <div class="rancak-popup-box absence-popup-box">

		  <div class="jotform">
			<iframe
			  id="JotFormIFrame-260290932274053"
			  title="Form"
			  onload="window.parent.scrollTo(0,0)"
			  allowtransparency="true"
			  allow="geolocation; microphone; camera; fullscreen; payment"
			  src="https://form.jotform.com/260290932274053"
			  frameborder="0"
			  style="min-width:100%;max-width:100%;height:539px;border:none;"
			>
			</iframe>
			<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-260290932274053']", "https://form.jotform.com/")</script>
		  </div>

      </div>
	</div>
  </div>
</div>



<div class="rancak-popup absence-popup" aria-popup-box="FeedbackPopup">
  <div class="rancak-popup-container content-center">
    <div class="rancak-popup-overlay"></div>
	<div class="rancak-popup-content absence-popup-container">
      <button title="Close" class="rancak-popup-close content-center">
        <?php require ($_SERVER['BMG'].'template/img/icon/close-popup.svg')?>
      </button>
      <div class="rancak-popup-box absence-popup-box">

		  <div class="jotform">
			<iframe
			  id="JotFormIFrame-260290770268056"
			  title="Form"
			  onload="window.parent.scrollTo(0,0)"
			  allowtransparency="true"
			  allow="geolocation; microphone; camera; fullscreen; payment"
			  src="https://form.jotform.com/260290770268056"
			  frameborder="0"
			  style="min-width:100%;max-width:100%;height:539px;border:none;"
			>
			</iframe>
			<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-260290770268056']", "https://form.jotform.com/")</script>
		  </div>

      </div>
	</div>
  </div>
</div>



<div class="rancak-popup absence-popup" aria-popup-box="TrainingPlanPopup">
  <div class="rancak-popup-container content-center">
    <div class="rancak-popup-overlay"></div>
	<div class="rancak-popup-content absence-popup-container">
      <button title="Close" class="rancak-popup-close content-center">
        <?php require ($_SERVER['BMG'].'template/img/icon/close-popup.svg')?>
      </button>
      <div class="rancak-popup-box absence-popup-box">

		  <div class="jotform">
			<iframe
			  id="JotFormIFrame-260290873251456"
			  title="Form"
			  onload="window.parent.scrollTo(0,0)"
			  allowtransparency="true"
			  allow="geolocation; microphone; camera; fullscreen; payment"
			  src="https://form.jotform.com/260290873251456"
			  frameborder="0"
			  style="min-width:100%;max-width:100%;height:539px;border:none;"
			>
			</iframe>
			<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-260290873251456']", "https://form.jotform.com/")</script>
		  </div>

      </div>
	</div>
  </div>
</div>