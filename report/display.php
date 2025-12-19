<section class="section-default section-view-report content-center">
  <div class="site-container">
    <div class="svr-header">
      <div class="svr-info">
        <h2 class="svr-name"><?php echo $name;?></h2>
        <h3 class="svr-team"><?php echo $team;?></h3>
      </div>
      <div class="svr-download">
	    <a title="Logout" class="btn svr-download-button" href="report/logout.php">
          <span class="text-id">Keluar</span>
          <span class="text-en">Logout</span>
          <span class="text-de">Abmelden</span>
	    </a>
	  </div>
    </div>
    <div class="svr-embed <?php if (file_exists($pdfPath)){ ?>svr-embed-display<?php } ?>">
      <?php if (file_exists($pdfPath)): ?>
        <!--<embed type="application/pdf" src="report/file/<?= $file ?>.pdf" width="100%" height="2350"> -->

  <iframe src="report/file/<?= $file ?>.pdf">
    <p>Your browser does not support PDFs. <a href="your-document.pdf">Download the PDF</a> instead.</p>
  </iframe>

      <?php else: ?>
        <div class="svr-embed-notfound">
          Data tidak ditemukan, silakan hubungi customer service
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
