<?php 
  $lang='id';
  $menu='Register';
  $template='default';
  require ('../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/sample.php')?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<h1 class="hide"><?php echo $sitename; ?> <?php echo $menu; ?></h1>
<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-register content-center">
    <div class="site-container">
	
	  <div class="register-logo content-center">
	    <div class="register-logo-frame img-frame thumb-loading">
          <img title="Logo" class="lazyload" data-original="template/img/train-like-a-pro.webp">
        </div>
	  </div>
	  
	  <div class="register-box">
	    <?php $reg_tab_curr='Academy'; require ($_SERVER['BMG'].'template/module/register-tab.php')?>
		<div class="register-form">
		  <div class="register-form-title">Academy Registration:</div>
		  <div class="jotform">

            <iframe
              id="JotFormIFrame-253009181990054"
              title="Academy Registration"
              onload="window.parent.scrollTo(0,0)"
              allowtransparency="true"
              allow="geolocation; microphone; camera; fullscreen; payment"
              src="https://form.jotform.com/253009181990054"
              frameborder="0"
              style="min-width:100%;max-width:100%;height:539px;border:none;"
              scrolling="no"
            >
            </iframe>
            <script src='https://cdn.jotfor.ms/s/umd/latest/for-form-embed-handler.js'></script>
            <script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-253009181990054']", "https://form.jotform.com/")</script>
    
		  </div>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <?php require ($_SERVER['BMG'].'template/module/section-training-ground.php')?>
  <?php require ($_SERVER['BMG'].'template/module/section-contact.php')?>
  
  
  
  
  
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>