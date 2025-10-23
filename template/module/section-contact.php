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
        <div class="scu-cf-list">
          <ul class="scu-cf-row">
            <li>
              <div class="scu-cf-label">
                <span class="text-id">Nama</span>
                <span class="text-en">Name</span>
                <span class="text-de">Name</span>
              </div>
              <div class="form-box scu-cf-box">
                <input class="form-field" name="" type="text" placeholder="">
              </div>
            </li>
          </ul>
          <ul class="scu-cf-row scu-cf-split">
            <li>
              <div class="scu-cf-label">Email</div>
              <div class="form-box scu-cf-box">
                <input class="form-field" name="" type="text" placeholder="">
              </div>
            </li>
            <li>
              <div class="scu-cf-label">
                <span class="text-id">Telepon/Whatsapp</span>
                <span class="text-en">Phone/Whatsapp</span>
                <span class="text-de">Phone/Whatsapp</span>
              </div>
              <div class="form-box scu-cf-box">
                <input class="form-field" name="" type="text" placeholder="">
              </div>
            </li>
          </ul>
          <ul class="scu-cf-row">
            <li>
              <div class="scu-cf-label">
                <span class="text-id">Pesan</span>
                <span class="text-en">Message</span>
                <span class="text-de">Message</span>
              </div>
              <div class="form-box scu-cf-box">
                <textarea class="form-field" placeholder=""></textarea>
              </div>
            </li>
          </ul>
          <ul class="scu-cf-row">
            <li>
              <button title="Send" class="btn" href="">
                <span class="text-id">Kirim</span>
                <span class="text-en">Send</span>
                <span class="text-de">Send</span>
              </button>
            </li>
          </ul>
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
          <a title="Register" class="btn srs-action-button" href="">Register</a>
          <a title="Free Trial" class="btn srs-action-button" href="">Free Trial</a>
        </div>
      </div>

      <div class="scu-box scu-list">
        <?php 
          $bai_array = array();
          $bai_array[]=array(
            'bai_title'=>'Email',
            'bai_link'=>'mailto:goal@gffi.de',
            'bai_icon'=>'email',
            'bai_data'=>'goal@gffi.de',
          );
          $bai_array[]=array(
            'bai_title'=>'Whatsapp',
            'bai_link'=>'https://api.whatsapp.com/send/?phone=6281118898205',
            'bai_icon'=>'whatsapp',
            'bai_data'=>'+62 8111 8898 205',
          );
          $bai_array[]=array(
            'bai_title'=>'Instagram',
            'bai_link'=>'https://www.instagram.com/borussiaacademy.id/',
            'bai_icon'=>'instagram',
            'bai_data'=>'@borussiaacademy.id',
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