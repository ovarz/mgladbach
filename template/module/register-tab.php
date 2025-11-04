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
          <div class="register-tab-button register-tab-curr">
			<span class="text-id"><?php echo($reg_tab_list['reg_tab_title_id']); ?></span>
			<span class="text-en"><?php echo($reg_tab_list['reg_tab_title_en']); ?></span>
			<span class="text-de"><?php echo($reg_tab_list['reg_tab_title_de']); ?></span>
          </div>
        <?php
      }else{
        ?>
          <a title="<?php echo($reg_tab_list['reg_tab_title_en']); ?>" class="register-tab-button" href="<?php echo($reg_tab_list['reg_tab_link']); ?>">
			<span class="text-id"><?php echo($reg_tab_list['reg_tab_title_id']); ?></span>
			<span class="text-en"><?php echo($reg_tab_list['reg_tab_title_en']); ?></span>
			<span class="text-de"><?php echo($reg_tab_list['reg_tab_title_de']); ?></span>
          </a>
        <?php
      }
    }
  ?>
</div>

