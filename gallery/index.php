<?php 
  $lang='id';
  $menu='Gallery';
  $site_title='default';
  require ('../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-photo-gallery page-photo-gallery content-center">
    <div class="site-container activity-list">
	
	  <?php 
        $gallery_id='gallery12';
        $gallery_date='2025';
        $gallery_title='Top Youth';
        $pg_array = array();
        for ($i = 1; $i <= 17; $i++) {
          $pg_array[] = array(
            'pg_title' => "Top Youth - Foto {$i}",
            'pg_img' => "topyouth2025/{$i}-small.jpg",
            'pg_img_ori' => "topyouth2025/{$i}.jpg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	  
	  
	
	  <?php 
        $gallery_id='gallery11';
        $gallery_date='2025';
        $gallery_title='Askot Tangerang Selatan';
        $pg_array = array();
        for ($i = 1; $i <= 24; $i++) {
          $pg_array[] = array(
            'pg_title' => "Askot Tangerang Selatan - Foto {$i}",
            'pg_img' => "askot-20251119/{$i}-small.jpg",
            'pg_img_ori' => "askot-20251119/{$i}.jpg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery10';
        $gallery_date='2024';
        $gallery_title='<b>Borussia Academy CAMP</b> - JAKARTA - Day 3 (9 June 2024)';
        $pg_array = array();
        for ($i = 1; $i <= 8; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia Academy CAMP - JAKARTA - Day 3 (9 June 2024) - Foto {$i}",
            'pg_img' => "2024-bac-day3/{$i}-small.webp",
            'pg_img_ori' => "2024-bac-day3/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery9';
        $gallery_date='2024';
        $gallery_title='<b>Borussia Academy CAMP</b> - JAKARTA - Day 2 (8 June 2024)';
        $pg_array = array();
        for ($i = 1; $i <= 8; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia Academy CAMP - JAKARTA - Day 2 (8 June 2024) - Foto {$i}",
            'pg_img' => "2024-bac-day2/{$i}-small.webp",
            'pg_img_ori' => "2024-bac-day2/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery8';
        $gallery_date='2024';
        $gallery_title='<b>Borussia Academy CAMP</b> - JAKARTA - Day 1 (7 June 2024)';
        $pg_array = array();
        for ($i = 1; $i <= 8; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia Academy CAMP - JAKARTA - Day 1 (7 June 2024) - Foto {$i}",
            'pg_img' => "2024-bac-day1/{$i}-small.webp",
            'pg_img_ori' => "2024-bac-day1/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery7';
        $gallery_date='2023';
        $gallery_title='<b>borussia Academy CAMP</b> - JAKARTA 3 June 2023 (FUN AND ELITE, DAY 1)';
        $pg_array = array();
        for ($i = 1; $i <= 68; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia Academy CAMP - JAKARTA 3 June 2023 (FUN AND ELITE, DAY 1) - Foto {$i}",
            'pg_img' => "2023-bac-day1/{$i}-small.webp",
            'pg_img_ori' => "2023-bac-day1/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery6';
        $gallery_date='2023';
        $gallery_title='<b>BUNDESLIGA</b> COMMON GROUND JAKARTA';
        $pg_array = array();
        for ($i = 1; $i <= 4; $i++) {
          $pg_array[] = array(
            'pg_title' => "BUNDESLIGA COMMON GROUND JAKARTA - Foto {$i}",
            'pg_img' => "2023-bundesliga-common-ground/{$i}-small.webp",
            'pg_img_ori' => "2023-bundesliga-common-ground/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery5';
        $gallery_date='2023';
        $gallery_title='<b>Borussia Park</b> Live';
        $pg_array = array();
        for ($i = 1; $i <= 8; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia Park Live - Foto {$i}",
            'pg_img' => "2023-borussia-live/{$i}-small.webp",
            'pg_img_ori' => "2023-borussia-live/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery4';
        $gallery_date='2022';
        $gallery_title='<b>MEETING</b> WITH KONI AND PSSI';
        $pg_array = array();
        for ($i = 1; $i <= 4; $i++) {
          $pg_array[] = array(
            'pg_title' => "MEETING WITH KONI AND PSSI - Foto {$i}",
            'pg_img' => "2022-koni-pssi/{$i}-small.webp",
            'pg_img_ori' => "2022-koni-pssi/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery3';
        $gallery_date='2022';
        $gallery_title='<b>COACHES WORKSHOP</b> at PERSIJA';
        $pg_array = array();
        for ($i = 1; $i <= 4; $i++) {
          $pg_array[] = array(
            'pg_title' => "COACHES WORKSHOP at PERSIJA - Foto {$i}",
            'pg_img' => "2022-workshop-persija/{$i}-small.webp",
            'pg_img_ori' => "2022-workshop-persija/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery2';
        $gallery_date='2022';
        $gallery_title='<b>Borussia camp</b> at DSJ';
        $pg_array = array();
        for ($i = 1; $i <= 8; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia camp at DSJ - Foto {$i}",
            'pg_img' => "2022-camp-dsj/{$i}-small.webp",
            'pg_img_ori' => "2022-camp-dsj/{$i}-original.jpg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>
	
	
	
	  <?php 
        $gallery_id='gallery1';
        $gallery_date='2022';
        $gallery_title='<b>Borussia CAMP</b> AT YOUNG WARRIORS';
        $pg_array = array();
        for ($i = 1; $i <= 4; $i++) {
          $pg_array[] = array(
            'pg_title' => "Borussia CAMP AT YOUNG WARRIORS - Foto {$i}",
            'pg_img' => "2022-young-warrior/{$i}-small.webp",
            'pg_img_ori' => "2022-young-warrior/{$i}-original.jpeg",
          );
        }
	    require ($_SERVER['BMG'].'template/module/gallery-list.php')
	  ?>

    </div>
  </section>
  
  
  
  <?php require ($_SERVER['BMG'].'template/module/section-contact.php')?>
  
  
  
  
  
</div>
<script>
  new VenoBox({
    selector:'.spg-box',
    numeration:true,
    infinigall:true,
    fitView:true,
    spinner:'rotating-plane'
  });
</script>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>