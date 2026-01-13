<section class="section-default section-view-report content-center">
  <div class="site-container">
    <div class="svr-header">
      <div class="svr-info">
        <h2 class="svr-name"><?php echo $name;?></h2>
        <h3 class="svr-team"><?php echo $team;?></h3>
      </div>
      <div class="svr-download">
	    <button title="Download" class="btn svr-download-button open-sticky" aria-popup-button="AbsencePopup">
          <span class="text-id">Absensi</span>
          <span class="text-en">Absence</span>
          <span class="text-de">Abwesenheit</span>
	    </button>
	    <a title="Download" class="btn svr-download-button" href="report/file/<?= $file ?>.pdf" target="_blank">
          <span class="text-id">Unduh</span>
          <span class="text-en">Download</span>
          <span class="text-de">Abmelden</span>
	    </a>
	    <a title="Logout" class="btn svr-download-button" href="report/logout.php">
          <span class="text-id">Keluar</span>
          <span class="text-en">Logout</span>
          <span class="text-de">Herunterladen</span>
	    </a>
	  </div>
    </div>
    <div class="svr-embed <?php if (file_exists($pdfPath)){ ?>svr-embed-display<?php } ?>">
      <?php if (file_exists($pdfPath)): ?>
	    <img title="<?= $file ?>" src="report/file/<?= $file ?>.jpg" />
      <?php else: ?>
        <div class="svr-embed-notfound">
          Data tidak ditemukan, silakan hubungi customer service
        </div>
      <?php endif; ?>
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