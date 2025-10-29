<div class="register-tab">
  <?php
    $reg_tab_array = array();
    $reg_tab_array[]=array(
      'reg_tab_title'=>'Academy',
      'reg_tab_link'=>'register/',
    );
    $reg_tab_array[]=array(
      'reg_tab_title'=>'Free Trial',
      'reg_tab_link'=>'register/free-trial/',
    );

    foreach($reg_tab_array as $reg_tab_list){
      if($reg_tab_curr == $reg_tab_list['reg_tab_title']){
        ?>
          <div class="register-tab-button register-tab-curr">
            <?php echo($reg_tab_list['reg_tab_title']); ?>
          </div>
        <?php
      }else{
        ?>
          <a title="<?php echo($reg_tab_list['reg_tab_title']); ?>" class="register-tab-button" href="<?php echo($reg_tab_list['reg_tab_link']); ?>">
            <?php echo($reg_tab_list['reg_tab_title']); ?>
          </a>
        <?php
      }
    }
  ?>
</div>

