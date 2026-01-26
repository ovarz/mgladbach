<section class="section-default section-view-report content-center">
  <div class="site-container">
    <div class="svr-header">
      <div class="svr-info">
        <h2 class="svr-name"><?php echo $nickname;?></h2>
        <h3 class="svr-team"><?php echo $position;?></h3>
      </div>
      <div class="svr-download">
	    <button title="Download" class="btn svr-download-button open-sticky" aria-popup-button="AbsencePopup">
          <span class="text-id">Absensi</span>
          <span class="text-en">Absence</span>
          <span class="text-de">Abwesenheit</span>
	    </button>
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
          <img title="<?php echo $nickname;?> Photo" class="lazyload" data-original="template/img/coach/<?php echo $nickname;?>.jpg"/>
		</div>
	  </div>
	  <div class="coach-info">
	    <div class="coach-row">
		  <div class="coach-label">Full Name</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $name;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Birth Date</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $birtdate;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Age</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $umur->y;?> years old</div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Email</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Phone</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><a href="tel:<?php echo $phone;?>"><?php echo $phone;?></a></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Address</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $address;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Join Date</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $joindate;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Position</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $position;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">Schedule</div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $schedule;?></div>
		</div>
	  </div>
	</div>
  </div>
</section>



<div class="rancak-popup absence-popup" aria-popup-box="AbsencePopup">
  <div class="rancak-popup-container content-center">
    <div class="rancak-popup-overlay"></div>
	
	<div class="absence-popup-container">
      <button title="Close" class="rancak-popup-close content-center">
        <?php require ($_SERVER['BMG'].'template/img/icon/close-popup.svg')?>
      </button>
      <div class="rancak-popup-box absence-popup-box">

		  <div class="jotform">
			<iframe
			  id="JotFormIFrame-260118437385055"
			  title="Form"
			  onload="window.parent.scrollTo(0,0)"
			  allowtransparency="true"
			  allow="geolocation; microphone; camera; fullscreen; payment"
			  src="https://form.jotform.com/260118437385055"
			  frameborder="0"
			  style="min-width:100%;max-width:100%;height:539px;border:none;"
			  scrolling="no"
			>
			</iframe>
			<script src='https://cdn.jotfor.ms/s/umd/latest/for-form-embed-handler.js'></script>
			<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-260118437385055']", "https://form.jotform.com/")</script>
		  </div>

      </div>
	</div>
  </div>
</div>