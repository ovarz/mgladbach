<?php 
  $lang='id';
  $menu='Absence';
  $site_title='default';
  require ('../template/inc/base.php');
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<div class="scb-bg">
  <script>
	$(window).on('load',function(){
	  if (window.videoLoaded) return;
	  window.videoLoaded = true;

	  if ($(window).width() > 1024) {
		$('.scb-bg').append('<video autoplay loop muted playsinline class="desktop-only"><source src="template/img/cover.mp4" type="video/mp4"></video>');
		$('.scb-bg video').hide().fadeIn(1000);
	  }
	});
  </script>
</div>
<div class="rancak-foundation">
  
  
  
  
  <style>
    .absence-page-box{width:100%; max-width:377px; background-color:var(--bg-2); position:relative; z-index:2000; box-shadow:rgb(100 100 111 / 34%) 0px 8px 34px 0px;}
	.absence-page-box .jotform:after{background-color:#f3f3fe}
  </style>
  <section class="section-default absence-page content-center">
    <div class="site-container content-center">
	  <div class="absence-page-box">
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
  </section>
  
  
  
  
  
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>