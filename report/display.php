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
    <div class="svr-embed">
      <embed type="application/pdf" id="report_doc" src="report/file/<?php echo $file;?>.pdf" width="956" height="2350"></embed>
    </div>
  </div>
</section>
