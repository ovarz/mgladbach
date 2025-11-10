<div class="register-tab">
  <?php
    $reg_tab_array = array();
    $reg_tab_array[]=array(
      'reg_tab_title_id'=>'Akademi',
      'reg_tab_title_en'=>'Academy',
      'reg_tab_title_de'=>'Akademie',
      'reg_tab_link'=>'register/',
    );
    $reg_tab_array[]=array(
      'reg_tab_title_id'=>'Coba Gratis',
      'reg_tab_title_en'=>'Free Trial',
      'reg_tab_title_de'=>'Kostenloses Probetraining',
      'reg_tab_link'=>'register/free-trial/',
    );

    foreach($reg_tab_array as $reg_tab_list){
      if($reg_tab_curr == $reg_tab_list['reg_tab_title_en']){
        ?>
          <div class="register-tab-button register-tab-curr"><?php echo($reg_tab_list['reg_tab_title_en']); ?></div>
        <?php
      }else{
        ?>
          <a title="<?php echo($reg_tab_list['reg_tab_title_en']); ?>" class="register-tab-button" href="<?php echo($reg_tab_list['reg_tab_link']); ?>">
			<?php echo($reg_tab_list['reg_tab_title_en']); ?>
          </a>
        <?php
      }
    }
  ?>
</div>

