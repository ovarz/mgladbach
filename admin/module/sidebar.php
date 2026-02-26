<div class="rancak-sidebar">
  <div class="sidebar-top">
  
    <nav class="nav-list">
	  <div class="nav-section desktop-only">Main Menu</div>
      <a title="" class="nav-box nav-curr" href="/admin/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame content-center">
		    <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-home.svg')?>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title">Home</div>
		</div>
      </a>
      <a title="" class="nav-box" href="/admin/player/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame content-center">
		    <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-player.svg')?>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title">Player</div>
		</div>
      </a>
      <a title="" class="nav-box" href="/admin/coach/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame content-center">
		    <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-coach.svg')?>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title">Coach</div>
		</div>
      </a>
    </nav>

    <nav class="nav-list">
	  <div class="nav-section desktop-only">Setting</div>
      <a title="" class="nav-box" href="/admin/setting/team/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame content-center">
		    <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-team.svg')?>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title">Team</div>
		</div>
      </a>
      <a title="" class="nav-box" href="/admin/setting/session/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame content-center">
		    <?php require ($_SERVER['BMG'].'admin/assets/img/icon/nav-session.svg')?>
		  </div>
		</div>
	    <div class="nav-info desktop-only">
		  <div class="nav-title">Session</div>
		</div>
      </a>
    </nav>
	
  </div>
  <div class="sidebar-bottom">
  
    <nav class="nav-list">
      <div class="nav-box nav-user" href="/admin/setting/team/">
	    <div class="nav-icon">
		  <div class="nav-icon-frame img-frame content-center">
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