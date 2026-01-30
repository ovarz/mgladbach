<?php 
  $lang='id';
  $menu='Home';
  $site_title='default';
  require ('../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<div class="rancak-foundation">
  
  
  
  
  
  <style>
    .section-quick-access .site-container{max-width:568px; min-height:100vh; min-height:100svh; background-color:var(--bg-2); padding:var(--size-5) var(--body-padding);
	display:grid; grid-gap:var(--size-5); grid-auto-rows:min-content;}
	.sqa-logo img{width:auto; height:var(--size-7);}
	.sqa-pagename{text-align:center; margin-bottom:0; font-size:1.75rem;}
	.sqa-box{display:grid; grid-gap:var(--size-2);}
	.sqa-title{margin-bottom:var(--size-1);}
	.sqa-link{display:flex; padding:var(--size-3) var(--size-4); justify-content:space-between; align-items:center; border-radius:var(--rounded-1); 
	background-color:var(--color-4a); color:var(--color-4); fill:var(--color-4); border:1px solid rgb(0 0 0 / 2%);}
	.sqa-link:hover{background-color:var(--color-4); color:var(--bg-2); fill:var(--bg-2);}
	
	@media screen and (min-width:568px){
	  .section-quick-access .site-container{min-height:90vh; min-height:90svh; margin:5vh 0; margin:5svh 0; border-radius:var(--rounded-2); box-shadow:var(--shadow-default);}
	}
  </style>
  
  <section class="section-default section-quick-access content-center">
    <div class="site-container">
	  
	  <div class="sqa-head">
        <div class="sqa-logo content-center">
          <img alt="<?php echo $sitename; ?>" src="template/img/logo-big.webp?<?php echo $anticache; ?>"/>
        </div>
		<div class="section-title sqa-pagename">Quick Access</div>
	  </div>
	  
      <?php 
        $shortcut_array = array();
        $shortcut_array[] = array(
          'shortcut_section' => 'Coach',
          'shortcut_list' => [
            [
              'shortcut_title' => 'Login',
              'shortcut_link' => 'coach/',
            ],
            [
              'shortcut_title' => 'Absence',
              'shortcut_link' => 'coach/absence/',
            ],
            [
              'shortcut_title' => 'Feedback',
              'shortcut_link' => 'coach/feedback/',
            ],
            [
              'shortcut_title' => 'Training Plan',
              'shortcut_link' => 'coach/training-plan/',
            ],
          ],
        );
        foreach($shortcut_array as $shortcut_row => $shortcut_box){
      ?>
        <div class="sqa-container">
          <div class="srs-title sqa-title"><?php echo($shortcut_box['shortcut_section'])?></div>
          <div class="sqa-box">
		    <?php foreach ($shortcut_box['shortcut_list'] as $shortcut_box) { ?>
              <a title="<?php echo($shortcut_box['shortcut_title'])?>" class="sqa-link" href="<?php echo($shortcut_box['shortcut_link'])?>">
			    <?php echo($shortcut_box['shortcut_title'])?>
				<?php require ($_SERVER['BMG'].'template/img/icon/more.svg')?>
			  </a>
			<?php } ?>
          </div>
        </div>
	  <?php } ?>
	  
	</div>
  </section>
  
  
  
  
  
</div>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>