<?php 
  $lang='id';
  $menu='Success';
  $template='default';
  require ('../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/sample.php')?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>

<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-success content-center">
    <style>
	  .section-success{background:url(template/img/bg-6.webp) no-repeat fixed center var(--color-3); min-height:calc(100vh - var(--header-height)); min-height:calc(100svh - var(--header-height));}
	  .success-box{padding:var(--size-5); background-color:var(--bg-2); max-width:610px;}
	  .success-image{margin-bottom:var(--size-4); margin-top:-175px;}
	  .success-image-frame{--aspect-ratio:300/270; width:100%; max-width:300px;}
	  .success-title, .success-desc, .success-button span{text-align:center;}
	  .success-title{font-weight:bold; text-transform:uppercase; font-size:2rem; color:var(--color-3); margin-bottom:var(--size-1);}
	  .success-desc{line-height:150%; margin-bottom:var(--size-4);}
	</style>
    <div class="site-container content-center">
	
	  <div class="success-box">
	    <div class="success-image content-center">
	      <div class="success-image-frame img-frame thumb-loading">
            <img title="Success" class="lazyload" data-original="template/img/success.png">
          </div>
        </div>
	    <h1 class="success-title">
          <span class="text-id">Formulir telah berhasil dikirim</span>
          <span class="text-en">Form has been successfully submitted</span>
          <span class="text-de">Ihr Formular wurde erfolgreich eingereicht</span>
		</h1>
		<h2 class="success-desc">
          <span class="text-id">Data berhasil dikirim dan sedang kami proses. Kami akan segera menghubungi Anda untuk memberikan informasi lebih lanjut.</span>
          <span class="text-en">Your data has been successfully submitted and is currently being processed. We will contact you shortly to provide further information.</span>
          <span class="text-de">Ihre Daten wurden erfolgreich übermittelt und werden derzeit bearbeitet. Wir werden Sie in Kürze kontaktieren, um weitere Informationen bereitzustellen.</span>
		</h2>
		<div class="success-action content-center">
		  <a title="Back to Home" class="btn success-button" href="">
            <span class="text-id">Kembali ke Halaman Utama</span>
            <span class="text-en">Back to Home Page</span>
            <span class="text-de">Zurück zur Startseite</span>
		  </a>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>