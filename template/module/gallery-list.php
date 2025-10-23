<div class="activity-container">
  <div class="section-title">
    <div class="section-title-secondary">2024</div>
    <div class="section-title-primary">Borussia Academy CAMP - JAKARTA. Day 3, 9 June 2024</div>
  </div>

  <div class="spg-list">
    <?php foreach($pg_array as $pg_list){?>
      <a title="<?php echo($pg_list['pg_title'])?>" class="spg-box img-frame thumb-loading" data-gall="gallery10" href="template/img/<?php echo($pg_list['pg_img_ori'])?>">
        <img class="lazyload" data-original="template/img/<?php echo($pg_list['pg_img'])?>">
      </a>
    <?php } ?>
  </div>
</div>