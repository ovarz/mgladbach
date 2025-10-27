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
	    <?php $reg_tab_curr='Register'; require ($_SERVER['BMG'].'template/module/register-tab.php')?>
		<div class="register-form">
		  <div class="register-form-title">Academy Registration:</div>
		  <div class="register-form-list">
		    <div class="rfl-row">
			  <div class="rfl-label">Full Player Name:<span class="rfl-mandatory">*</span></div>
			</div>
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