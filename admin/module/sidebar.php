<div class="rancak-sidebar">
  <div class="sidebar-top">
    
	<div class="logo img-frame content-center">
	  <img class="lazyload mobile-only" data-original="/admin/assets/img/icon.webp"/>
	  <img class="lazyload desktop-only" data-original="/admin/assets/img/logo.webp"/>
	</div>
  
    <nav class="nav-list">
	  <div class="nav-section desktop-only">Main Menu</div>
      <?php 
        $nav_array = array();
        $nav_array[]=array(
          'nav_id'=>'Home',
          'nav_icon'=>'home',
          'nav_link'=>'',
        );
        $nav_array[]=array(
          'nav_id'=>'Player',
          'nav_icon'=>'player',
          'nav_link'=>'player/',
        );
        $nav_array[]=array(
          'nav_id'=>'Coach',
          'nav_icon'=>'coach',
          'nav_link'=>'coach/',
        );
        foreach($nav_array as $nav_list){
      ?>
        <a title="<?php echo($nav_list['nav_id'])?>" class="nav-box <?php if($menu == $nav_list['nav_id']) { ?>nav-curr<?php } ?>" 
		href="/admin/<?php echo($nav_list['nav_link'])?>">
          <div class="nav-icon">
            <div class="nav-icon-frame content-center">
              <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-'.$nav_list['nav_icon'].'.svg')?>
            </div>
          </div>
          <div class="nav-info desktop-only">
            <div class="nav-title"><?php echo($nav_list['nav_id'])?></div>
          </div>
        </a>
	  <?php } ?>
    </nav>

    <nav class="nav-list">
	  <div class="nav-section desktop-only">Setting</div>
      <?php 
        $nav_array = array();
        $nav_array[]=array(
          'nav_id'=>'Team',
          'nav_icon'=>'team',
          'nav_link'=>'setting/team/',
        );
        $nav_array[]=array(
          'nav_id'=>'Location',
          'nav_icon'=>'location',
          'nav_link'=>'setting/location/',
        );
        $nav_array[]=array(
          'nav_id'=>'Session',
          'nav_icon'=>'session',
          'nav_link'=>'setting/session/',
        );
        foreach($nav_array as $nav_list){
      ?>
        <a title="<?php echo($nav_list['nav_id'])?>" class="nav-box <?php if($menu == $nav_list['nav_id']) { ?>nav-curr<?php } ?>" 
		href="/admin/<?php echo($nav_list['nav_link'])?>">
          <div class="nav-icon">
            <div class="nav-icon-frame content-center">
              <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-'.$nav_list['nav_icon'].'.svg')?>
            </div>
          </div>
          <div class="nav-info desktop-only">
            <div class="nav-title"><?php echo($nav_list['nav_id'])?></div>
          </div>
        </a>
	  <?php } ?>
    </nav>
	
  </div>
  <div class="sidebar-bottom">
  
    <nav class="nav-list">
      <div class="nav-box nav-user" href="/admin/setting/team/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame profile-frame img-frame">
		    <img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $_SESSION['photo'] ?: 'default.png'; ?>"/>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title"><?php echo $_SESSION['username']; ?></div>
		</div>
      </div>
      <a title="" class="nav-box" href="/logout/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame content-center">
		    <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-logout.svg')?>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title">Logout</div>
		</div>
      </a>
    </nav>
	
  </div>
</div>



<div class="rancak-main">