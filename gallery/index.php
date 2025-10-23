<?php 
  $lang='id';
  $menu='Gallery';
  $template='default';
  require ('../template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/sample.php')?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<h1 class="hide"><?php echo $sitename; ?> <?php echo $menu; ?></h1>
<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-photo-gallery index-photo-gallery content-center">
    <div class="site-container activity-list">
	
	  <?php 
        $pg_array = array();
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/1-small.webp',
          'pg_img_ori'=>'bac-day3/1-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/2-small.webp',
          'pg_img_ori'=>'bac-day3/2-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/3-small.webp',
          'pg_img_ori'=>'bac-day3/3-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/4-small.webp',
          'pg_img_ori'=>'bac-day3/4-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/5-small.webp',
          'pg_img_ori'=>'bac-day3/5-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/6-small.webp',
          'pg_img_ori'=>'bac-day3/6-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/7-small.webp',
          'pg_img_ori'=>'bac-day3/7-original.jpeg',
        );
        $pg_array[]=array(
          'pg_title'=>'',
          'pg_img'=>'bac-day3/8-small.webp',
          'pg_img_ori'=>'bac-day3/8-original.jpeg',
        );
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
    share:true,
    fitView:true,
    spinner:'rotating-plane'
  });
</script>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>