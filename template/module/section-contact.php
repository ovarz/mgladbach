<section class="section-default section-dark section-contact content-center">
  <div class="site-container">
    <div class="section-contact-container">

      <div class="scc-box content-center">
        <div class="srs-action">
          <a title="Register" class="btn srs-action-button" href="register/">Register</a>
          <a title="Free Trial" class="btn srs-action-button" href="register/free-trial/">Free Trial</a>
        </div>
      </div>

      <div class="scc-box scc-address">
        <h2 class="section-title">Borussia Mönchengladbach Academy</h2>
        <h3 class="section-title">Indonesia</h3>
        <p>PT. German Football Indonesia</p>
        <p>Roseville Soho Lantai 10, BSD City</p>
        <p>Tangerang Selatan, 15310 Banten, Indonesia</p>
      </div>

      <div class="scc-box scc-list">
        <?php 
          $bai_array = array();
          $bai_array[]=array(
            'bai_title'=>'Email',
            'bai_link'=>'mailto:manager@mgladbachacademy.id',
            'bai_icon'=>'mail',
            'bai_data'=>'manager@mgladbachacademy.id',
          );
          $bai_array[]=array(
            'bai_title'=>'Whatsapp',
            'bai_link'=>'https://api.whatsapp.com/send/?phone=6281118898205',
            'bai_icon'=>'wa',
            'bai_data'=>'+62 8111 8898 205',
          );
          $bai_array[]=array(
            'bai_title'=>'Instagram',
            'bai_link'=>'https://www.instagram.com/mgladbachacademy.id/',
            'bai_icon'=>'ig',
            'bai_data'=>'@mgladbachacademy.id',
          );
          foreach($bai_array as $bai_list){
        ?>
          <a title="<?php echo($bai_list['bai_title'])?>" class="scc-row" href="<?php echo($bai_list['bai_link'])?>" target="_blank">
            <div class="scc-icon content-center">
              <?php require ($_SERVER['BMG'].'template/img/icon/footer-outline-'.$bai_list['bai_icon'].'.svg')?>
            </div>
          </a>
        <?php } ?>
      </div>

    </div>
  </div>
</section>