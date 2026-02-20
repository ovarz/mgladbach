<section class="section-default section-view-report section-view-player content-center">
  <div class="site-container">
    <div class="svr-header">
      <div class="svr-info">
        <h2 class="svr-name"><?php echo $nickname;?></h2>
      </div>
      <div class="svr-download">
        <button title="Absence" class="btn svr-download-button open-sticky" aria-popup-button="AbsencePopup">
          <span class="text-id">Absensi</span>
          <span class="text-en">Absence</span>
          <span class="text-de">Absence</span>
        </button>
	    <a title="Logout" class="btn svr-download-button" href="player/logout.php">
          <span class="text-id">Keluar</span>
          <span class="text-en">Logout</span>
          <span class="text-de">Herunterladen</span>
	    </a>
	  </div>
    </div>
    
	
	<div class="white-box coach-profile">
	  <div class="coach-photo">
	    <div class="coach-photo-frame img-frame thumb-loading">
          <img title="<?php echo $nickname;?> Photo" class="lazyload" data-original="template/img/player/<?php echo $nickname;?>.png?v1"/>
		</div>
	  </div>
	  <div class="coach-info">
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
            <span class="text-id">Tim</span>
            <span class="text-en">Team</span>
            <span class="text-de">Team</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $team;?></div>
		</div>
	    <div class="coach-row">
		  <div class="coach-label">
            <span class="text-id">Pelatih</span>
            <span class="text-en">Coach</span>
            <span class="text-de">Team</span>
		  </div>
		  <div class="coach-separator">:</div>
		  <div class="coach-data"><?php echo $coach;?></div>
		</div>
	  </div>
	
	</div>
    
	
	
	
	
	<div class="white-box coach-profile">
	  <div class="training-plan">
        <div class="section-title">
          <span class="text-id">Laporan Pemain</span>
          <span class="text-en">Player Report</span>
          <span class="text-de"></span>
		</div>
		<?php foreach ($users as $userId => $userData): ?>
          <div class="player-report">
			<?php foreach ($userData['file'] as $fileItem): ?>
			  <a title="Report <?= htmlspecialchars($fileItem['file_name']) ?>" class="player-report-list" href="player/file/<?= htmlspecialchars($fileItem['file_label']) ?>.pdf" target="_blank">
			    <div class="prl-left">
				  <div class="prl-name"><?= htmlspecialchars($fileItem['file_name']) ?></div>
				  <div class="prl-team"><?= htmlspecialchars($fileItem['file_team']) ?></div>
				</div>
				<div class="prl-right">
				  <button class="btn prl-button">
				    <?php require ($_SERVER['BMG'].'template/img/icon/download.svg')?>
				  </button>
				</div>
			  </a>
			<?php endforeach; ?>
          </div>
		<?php endforeach; ?>
      </div>
	</div>
    
	
	
	
	
	<div class="white-box coach-profile">
	  <div class="training-plan">
        <div class="section-title">
          <span class="text-id">Pembayaran</span>
          <span class="text-en">Payment</span>
          <span class="text-de"></span>
		</div>
		<?php foreach ($users as $userId => $userData): ?>
          <div class="player-payment">
			<?php foreach ($userData['payment'] as $fileItem): ?>
			  <div class="player-payment-list">
			    <div class="ppl-box">
				  <div class="ppl-label">Payment</div>
				  <div class="ppl-info"><?= htmlspecialchars($fileItem['payment_name']) ?></div>
				</div>
			    <div class="ppl-box">
				  <div class="ppl-label">Price</div>
				  <div class="ppl-info"><?= htmlspecialchars($fileItem['payment_total']) ?></div>
				</div>
			    <div class="ppl-box">
				  <div class="ppl-label">Date</div>
				  <div class="ppl-info"><?= htmlspecialchars($fileItem['payment_date']) ?></div>
				</div>
			    <div class="ppl-box">
				  <div class="ppl-label">Status</div>
				  <div class="ppl-info" aria-status="<?= htmlspecialchars($fileItem['payment_status']) ?>"><?= htmlspecialchars($fileItem['payment_status']) ?></div>
				</div>
			  </div>
			<?php endforeach; ?>
          </div>
		<?php endforeach; ?>
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