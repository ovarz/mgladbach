<header class="content-center">
  <ul class="site-container">
	<li class="header-left">
	  <a title="<?php echo $sitename; ?>" class="header-box header-logo content-center" href="">
	    <img src="template/img/logo.png?<?php echo $anticache; ?>"/>
	  </a>
	</li>
	<li class="header-center rancak-popup" aria-popup-box="MainNav">
      <div class="main-nav">
        <?php 
          $nav_array = array();
          $nav_array[]=array(
            'nav_label_id'=>'Beranda',
            'nav_label_en'=>'Home',
            'nav_label_de'=>'Home',
            'nav_link'=>'',
          );
          $nav_array[]=array(
            'nav_label_id'=>'Registrasi',
            'nav_label_en'=>'Register',
            'nav_label_de'=>'Register',
            'nav_link'=>'',
          );
          $nav_array[]=array(
            'nav_label_id'=>'Kalender',
            'nav_label_en'=>'Calendar',
            'nav_label_de'=>'Calendar',
            'nav_link'=>'',
          );
          $nav_array[]=array(
            'nav_label_id'=>'Galeri',
            'nav_label_en'=>'Gallery',
            'nav_label_de'=>'Gallery',
            'nav_link'=>'',
          );
          foreach($nav_array as $nav_list){
        ?>
          <a title="<?php echo($nav_list['nav_label_en'])?>" 
          class="nav-link <?php if($menu == $nav_list['nav_label_en']) { ?>nav-curr<?php } ?>"
          href="<?php echo($nav_list['nav_link'])?>">
            <span class="text-id"><?php echo($nav_list['nav_label_id'])?></span>
            <span class="text-en"><?php echo($nav_list['nav_label_en'])?></span>
            <span class="text-de"><?php echo($nav_list['nav_label_de'])?></span>
          </a>
        <?php } ?>
      </div>
	</li>
	<li class="header-right">
	  <div class="header-box header-lang content-center">
        <?php 
          $lang_array = array();
          $lang_array[]=array(
            'lang_code'=>'id',
            'lang_title'=>'Indonesia',
          );
          $lang_array[]=array(
            'lang_code'=>'en',
            'lang_title'=>'English',
          );
          $lang_array[]=array(
            'lang_code'=>'de',
            'lang_title'=>'Deutsch',
          );
          foreach($lang_array as $lang_list){
        ?>
          <button title="<?php echo($lang_list['lang_title'])?>" class="choice-lang choice-<?php echo($lang_list['lang_code'])?>" 
		  aria-lang="<?php echo($lang_list['lang_code'])?>"><?php require ($_SERVER['BMG'].'template/img/icon/lang-'.$lang_list['lang_code'].'.svg')?></button>
        <?php } ?>
	  </div>
	  <button title="Toggle Menu" class="header-box header-togglemenu content-center mobile-only open-sticky" aria-popup-button="MainNav">
	    <?php require ($_SERVER['BMG'].'template/img/icon/menu.svg')?>
	    <?php require ($_SERVER['BMG'].'template/img/icon/close.svg')?>
	  </button>
	</li>
  </ul>
</header>