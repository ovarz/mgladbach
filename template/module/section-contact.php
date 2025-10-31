<section class="section-default section-contact content-center">
  <div class="site-container">
    <div class="scu-left">

      <div class="scu-box scu-contact-form">
        <h2 class="section-title">
          <span class="text-id">Kontak</span>
          <span class="text-en">Contact</span>
          <span class="text-de">Contact</span>
        </h2>
        <h3 class="section-subtitle">
          <span class="text-id">Untuk pertanyaan umum saja, bukan untuk pendaftaran.</span>
          <span class="text-en">For general inquiries only, not intended for registration use</span>
          <span class="text-de">For general inquiries only, not intended for registration use</span>
        </h3>
        <div class="jotform">
		  <?php $jotform_id='252999107452062'; $jotform_date='1761623287941'; require ($_SERVER['BMG'].'template/module/form-contact.php')?>
        </div>
      </div>

    </div>
    <div class="scu-right">

      <div class="scu-box scu-address">
        <h2 class="section-title">Borussia Academy Indonesia</h2>
        <p>PT. German Football Indonesia</p>
        <p>Roseville Soho Lantai 10</p>
        <p>BSD City</p>
        <p>Tangerang Selatan, 15310 Banten</p>
        <p>Indonesia</p>
      </div>

      <div class="scu-box scu-address">
        <div class="srs-action">
          <a title="Register" class="btn srs-action-button" href="register/">Register</a>
          <a title="Free Trial" class="btn srs-action-button" href="register/free-trial/">Free Trial</a>
        </div>
      </div>

      <div class="scu-box scu-list">
        <?php 
          $bai_array = array();
          $bai_array[]=array(
            'bai_title'=>'Email',
            'bai_link'=>'mailto:manager@mgladbachacademy.id',
            'bai_icon'=>'email',
            'bai_data'=>'manager@mgladbachacademy.id',
          );
          $bai_array[]=array(
            'bai_title'=>'Whatsapp',
            'bai_link'=>'https://api.whatsapp.com/send/?phone=6281118898205',
            'bai_icon'=>'whatsapp',
            'bai_data'=>'+62 8111 8898 205',
          );
          $bai_array[]=array(
            'bai_title'=>'Instagram',
            'bai_link'=>'https://www.instagram.com/mgladbachacademy.id/',
            'bai_icon'=>'instagram',
            'bai_data'=>'@mgladbachacademy.id',
          );
          foreach($bai_array as $bai_list){
        ?>
          <a title="<?php echo($bai_list['bai_title'])?>" class="scu-row" href="<?php echo($bai_list['bai_link'])?>" target="_blank">
            <div class="scu-icon content-center">
              <?php require ($_SERVER['BMG'].'template/img/icon/bai-'.$bai_list['bai_icon'].'.svg')?>
            </div>
            <div class="scu-label content-center"><?php echo($bai_list['bai_data'])?></div>
          </a>
        <?php } ?>
      </div>

    </div>
  </div>
</section>