<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';
?>
<?php 
  $lang='en';
  $menu='Home';
  $datatable='no';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title">Dashboard</h2>
  </div>
  
  
  <?php 
    $nav_array = array();
    $nav_array[]=array(
      'nav_title'=>'Player',
      'nav_list' => [
        ['nav_title'=>'Player List', 'nav_link'=>'/admin/player/',],
        ['nav_title'=>'Add Player', 'nav_link'=>'/admin/player/add/',],
        ['nav_title'=>'Attendance List', 'nav_link'=>'/admin/player/attendance/',],
        ['nav_title'=>'Report List', 'nav_link'=>'/admin/player/report/',],
        ['nav_title'=>'Payment List', 'nav_link'=>'/admin/player/payment/',],
      ],
    );
    $nav_array[]=array(
      'nav_title'=>'Coach',
      'nav_list' => [
        ['nav_title'=>'Coach List', 'nav_link'=>'/admin/coach/',],
        ['nav_title'=>'Add Coach', 'nav_link'=>'/admin/coach/add/',],
      ],
    );
    $nav_array[]=array(
      'nav_title'=>'Team',
      'nav_list' => [
        ['nav_title'=>'Team List', 'nav_link'=>'/admin/setting/team/',],
        ['nav_title'=>'Add Team', 'nav_link'=>'/admin/setting/team/add/',],
      ],
    );
    $nav_array[]=array(
      'nav_title'=>'Location',
      'nav_list' => [
        ['nav_title'=>'Location List', 'nav_link'=>'/admin/setting/location/',],
        ['nav_title'=>'Add Location', 'nav_link'=>'/admin/setting/location/add/',],
      ],
    );
    $nav_array[]=array(
      'nav_title'=>'Session',
      'nav_list' => [
        ['nav_title'=>'Session List', 'nav_link'=>'/admin/setting/session/',],
        ['nav_title'=>'Add Session', 'nav_link'=>'/admin/setting/session/add/',],
      ],
    );
  ?>
  
  <?php foreach($nav_array as $nav_row => $nav_box){ ?>
    <div class="home-shortcut">
      <h3 class="home-shortcut-title"><?php echo($nav_box['nav_title'])?></h3>
      <div class="home-shortcut-list">
	    <?php foreach($nav_box['nav_list'] as $nav_box){ ?>
          <a title="<?php echo($nav_box['nav_title'])?>" class="btn hcl-button" href="<?php echo($nav_box['nav_link'])?>">
		    <?php echo($nav_box['nav_title'])?>
		  </a>
		<?php } ?>
      </div>
    </div>
  <?php } ?>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>