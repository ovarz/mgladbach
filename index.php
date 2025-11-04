<?php 
  $lang='id';
  $menu='Home';
  $template='default';
  require ('template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<h1 class="hide"><?php echo $sitename; ?> <?php echo $menu; ?></h1>
<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-cover content-center">
    <div class="site-container">
	
	  <div class="section-cover-box">
	    <div class="scb-bg">
		  <script>
			$(window).on('load',function(){
              if (window.videoLoaded) return;
              window.videoLoaded = true;

              if ($(window).width() > 1024) {
                $('.scb-bg').append('<video autoplay loop muted playsinline class="desktop-only"><source src="template/img/cover.mp4" type="video/mp4"></video>');
                $('.scb-bg video').hide().fadeIn(1000);
              }
			});
		  </script>
		</div>
	    <div class="scb-content">
          <div class="sib-arrow desktop-only">
            <?php require ($_SERVER['BMG'].'template/img/icon/gimmick.svg')?>
          </div>
		  <div class="scb-content-container">
            <div class="scb-logo img-frame thumb-loading">
              <img title="Logo" class="lazyload mobile-only" data-sizes="auto" data-original="template/img/logo-black-mobile.webp"
              data-srcset="template/img/logo-black-mobile.webp 300w, template/img/logo-black.webp 600w" fetchpriority="high"/>
              <img title="Logo" class="lazyload desktop-only" data-sizes="auto" data-original="template/img/logo.png" fetchpriority="high"/>
            </div>
			<span class="text-id">
              <p>Kami telah menjalin kerja sama dengan klub Bundesliga ternama, <b>Borussia Mönchengladbach</b>, yang dikenal memiliki salah satu program pembinaan pemain muda terbaik di Jerman. Bersama-sama, kami menghadirkan pengalaman sepak bola yang luar biasa, langsung di kawasan Jakarta dan sekitarnya!</p>
              <p>Program sepak bola ini terbuka untuk anak laki-laki dan perempuan usia 3 hingga 16 tahun, di semua tingkat kemampuan. Tidak masalah apakah kamu baru mulai belajar atau sudah berpengalaman di level semi-profesional, semua dipersilakan bergabung!</p>
              <p>Kegiatan latihan kami berlangsung di lapangan rumput alami Deutsche Schule Jakarta (DSJ). Sekolah Jerman yang berlokasi di BSD City, Tangerang ini menawarkan fasilitas berkualitas tinggi dalam lingkungan internasional.</p>
              <p>Ayo berlatih dengan gaya Borussia Foals dan ikuti jejak para pemain hebat seperti Lothar Matthäus, Stefan Effenberg, Marcell Jansen, Mahmoud Dahoud, Marc-André ter Stegen, Julian Korb, Tony Jantschke, dan Patrick Herrmann.</p>
			</span>
			<span class="text-en">
              <p>We are proud to partner with the legendary Bundesliga club <b>Borussia Mönchengladbach</b>, renowned for its exceptional youth academy. Together, we bring you a world-class football experience, right here in the Greater Jakarta area!</p>
              <p>Our football program welcomes boys and girls aged 3 to 16 of all skill levels. Whether you’re taking your first steps in football or already playing at a semi-professional level, everyone is welcome to join.</p>
              <p>Training sessions take place on the natural grass pitch at Deutsche Schule Jakarta (DSJ). The German school, located in BSD City, Tangerang, offers top-notch facilities in a vibrant international setting.</p>
              <p>Train the Borussia Foals way and follow in the footsteps of legendary players such as Lothar Matthäus, Stefan Effenberg, Marcell Jansen, Mahmoud Dahoud, Marc-André ter Stegen, Julian Korb, Tony Jantschke, and Patrick Herrmann.</p>
			</span>
			<span class="text-de">
              <p>Wir freuen uns über die Zusammenarbeit mit dem bekannten Bundesligaverein <b>Borussia Mönchengladbach</b>, der für seine herausragende Nachwuchsarbeit bekannt ist. Gemeinsam bieten wir euch ein erstklassiges Fußballerlebnis, direkt hier in der Großregion Jakarta!</p>
              <p>Unser Fußballprogramm richtet sich an Jungen und Mädchen im Alter von 3 bis 16 Jahren, unabhängig vom Leistungsniveau. Egal, ob du gerade erst anfängst oder schon halbprofessionell spielst, jeder ist herzlich willkommen!</p>
              <p>Das Training findet auf dem Naturrasenplatz der Deutschen Schule Jakarta (DSJ) statt. Die in BSD City, Tangerang, gelegene Deutsche Schule bietet hervorragende Einrichtungen in einem internationalen Umfeld.</p>
              <p>Trainiere auf die Borussia-Fohlen-Art und folge den Spuren bekannter Spieler wie Lothar Matthäus, Stefan Effenberg, Marcell Jansen, Mahmoud Dahoud, Marc-André ter Stegen, Julian Korb, Tony Jantschke und Patrick Herrmann.</p>
			</span>

            <div class="scb-tlap img-frame thumb-loading">
              <img title="Train Like a Pro" class="lazyload mobile-only" data-sizes="auto" data-original="template/img/train-like-a-pro-mobile.webp"
              data-srcset="template/img/train-like-a-pro-mobile.webp 300w, template/img/train-like-a-pro.webp 600w" fetchpriority="high"/>
              <img title="Train Like a Pro" class="lazyload desktop-only" data-sizes="auto" data-original="template/img/train-like-a-pro-white.webp" fetchpriority="high"/>
            </div>
          </div>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-dark section-registration content-center">
    <div class="site-container">
	
	  <div class="section-title">
	    <span class="text-id">Akademi</span>
	    <span class="text-en">Academy</span>
	    <span class="text-de">Akademie</span>
	  </div>
	
	  <div class="section-registration-split">
	    <div class="srs-left">
		  <div class="srs-box">
            <h2 class="srs-title">
              <span class="text-id">Informasi Harga</span>
              <span class="text-en">Price Information</span>
              <span class="text-de">Preisinformationen</span>
            </h2>
            <p>
              <span class="text-id">Biaya pendaftaran: Rp 1.000.000 (termasuk jersey resmi)</span>
              <span class="text-en">Registration Fee: IDR 1,000,000 (includes official jersey)</span>
              <span class="text-de">Anmeldegebühr: 1.000.000 IDR (inklusive offizielles Trikot)</span>
			</p>
            <ul>
              <li>
                <span class="text-id">1 sesi per minggu: Rp 800.000 / bulan</span>
                <span class="text-en">1 session per week: IDR 800,000 / month</span>
                <span class="text-de">1 Training pro Woche: 800.000 IDR / Monat</span>
			  </li>
              <li>
                <span class="text-id">2 sesi per minggu: Rp 1.000.000 / bulan</span>
                <span class="text-en">2 Session per week IDR 1.000.000 / month</span>
                <span class="text-de">2 Trainings pro Woche: 1.000.000 IDR / Monat</span>
			  </li>
              <li>
                <span class="text-id">3 sesi per minggu: Rp 1.200.000 / bulan</span>
                <span class="text-en">3 Session per week IDR 1.200.000 / month</span>
                <span class="text-de">3 Trainings pro Woche: 1.200.000 IDR / Monat</span>
			  </li>
            </ul>
            <p>
              <span class="text-id">*Diskon pembayaran awal tersedia!</span>
              <span class="text-en">*Early payment discounts available!</span>
              <span class="text-de">*Frühzahler erhalten Rabatt!</span>
			</p>
		  </div>
		  <div class="srs-box">
            <h2 class="srs-title">
              <span class="text-id">Lokasi Latihan</span>
              <span class="text-en">Training Ground</span>
              <span class="text-de">Trainingsgelände</span>
			</h2>
            <h3>German School Jakarta (DSJ)</h3>
            <p>Jl. Puspa Widya No.8, BSD City,</p>
            <p>Kec. Serpong, Kota Tangerang Selatan,</p>
            <p>Banten 15322, Indonesia</p>
            <div class="srs-action">
			  <a title="Register" class="btn srs-action-button" href="register/">
                <span class="text-id">Daftar Sekarang</span>
                <span class="text-en">Register</span>
                <span class="text-de">Anmelden</span>
			  </a>
			  <a title="Free Trial" class="btn srs-action-button" href="register/free-trial/">
                <span class="text-id">Coba Gratis</span>
                <span class="text-en">Free Trial</span>
                <span class="text-de">Kostenloses Probetraining</span>
			  </a>
			</div>
		  </div>
		</div>
		<div class="srs-right">
		  <div class="srs-box">
            <h2 class="srs-title">
              <span class="text-id">Jadwal</span>
              <span class="text-en">Schedule</span>
              <span class="text-de">Zeitplan</span>
			</h2>
            <ul>
              <li>
                <span class="text-id">Senin: 16.00 – 17.30 (semua usia kecuali U6)</span>
                <span class="text-en">Monday: 16.00 – 17.30 (all ages except U6)</span>
                <span class="text-de">Montag: 16.00 – 17.30 (alle Altersklassen außer U6)</span>
			  </li>
              <li>
                <span class="text-id">Kamis: 16.00 – 17.30 (semua usia kecuali U6)</span>
                <span class="text-en">Thursday: 16.00 – 17.30 (all ages except U6)</span>
                <span class="text-de">Donnerstag: 16:00 – 17:30 (alle Altersklassen außer U6)</span>
			  </li>
              <li>
                <span class="text-id">Sabtu: 07.30 – 08.30 (U6)</span>
                <span class="text-en">Saturday: 07.30 – 08.30 (U6)</span>
                <span class="text-de">Samstag: 07.30 – 08.30 (U6)</span>
			  </li>
              <li>
                <span class="text-id">Sabtu 7:30 - 9:00 (U8, U10)</span>
                <span class="text-en">Saturday 7:30 - 9:00 (U8, U10)</span>
                <span class="text-de">Samstag 7:30 - 9:00 (U8, U10)</span>
			  </li>
              <li>
                <span class="text-id">Sabtu 9:00 - 10:30 (U12, U14)</span>
                <span class="text-en">Saturday 9:00 - 10:30 (U12, U14)</span>
                <span class="text-de">Samstag 9:00 - 10:30 (U12, U14)</span>
			  </li>
              <li>
                <span class="text-id">Sabtu 7:30 - 8:30 (U8, U10, U12)</span>
                <span class="text-en">Saturday 7:30 - 8:30 (U8, U10, U12)</span>
                <span class="text-de">Samstag 7:30 - 8:30 (U8, U10, U12)</span>
			  </li>
            </ul>
		  </div>
		  <div class="srs-box">
            <h3 class="srs-subtitle">
              <span class="text-id">Sesi khusus penjaga gawang:</span>
              <span class="text-en">Designated goal keeper sessions:</span>
              <span class="text-de">Torwart-Trainingseinheiten:</span>
			</h3>
            <ul>
              <li>
                <span class="text-id">Sabtu 7:30 - 8:30 U8, U10, U12</span>
                <span class="text-en">Saturday 7:30 - 8:30 U8, U10, U12</span>
                <span class="text-de">Samstag 7:30 - 8:30 U8, U10, U12</span>
			  </li>
              <li>
                <span class="text-id">Sabtu 10:30 - 11:30 U14, U16, U17</span>
                <span class="text-en">Saturday 10:30 - 11:30 U14, U16, U17</span>
                <span class="text-de">Samstag 10:30 - 11:30 U14, U16, U17</span>
			  </li>
            </ul>
            <p>
              <span class="text-id">*tidak ada latihan saat hari libur nasional.</span>
              <span class="text-en">*excluding public holidays.</span>
              <span class="text-de">*kein Training an gesetzlichen Feiertagen.</span>
			</p>
            <p>
              <span class="text-id">*sesi U6 berdurasi sekitar 60 menit.</span>
              <span class="text-en">*U6 sessions last about 60 minutes.</span>
              <span class="text-de">*U6-Einheiten dauern etwa 60 Minuten.</span>
			</p>
            <p>
              <span class="text-id">*untuk usia lebih besar dapat lebih dari 90 menit.</span>
              <span class="text-en">*sessions for older kids may extend beyond 90 min.</span>
              <span class="text-de">*ältere Gruppen können bis zu 90+ Minuten trainieren.</span>
			</p>
		  </div>
		  <div class="srs-box">
            <p>
              <span class="text-id">Silakan cek kalender untuk detail lebih lanjut dan konfirmasi jadwal melalui WhatsApp!</span>
              <span class="text-en">Please check our calendar for detail and confirm training times via Whatsapp!</span>
              <span class="text-de">Bitte überprüft unseren Kalender für Details und bestätigt eure Trainingszeiten über WhatsApp!</span>
			</p>
            <div class="srs-action">
			  <a title="Go to calendar" class="btn srs-action-button" href="calendar/">
                <span class="text-id">Kalender</span>
                <span class="text-en">Calendar</span>
                <span class="text-de">Kalender</span>
			  </a>
			</div>
		  </div>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-border-logo content-center">
    <div class="site-container">
	
	  <div class="sbl-list">
        <?php 
          $sbl_array = array();
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-bmg-dev.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-bundesliga.webp',
          );
          foreach($sbl_array as $sbl_list){
        ?>
          <div class="sbl-box content-center">
            <div class="sbl-frame img-frame thumb-loading">
              <img title="<?php echo($sbl_list['sbl_name'])?>" class="lazyload" data-original="template/img/<?php echo($sbl_list['sbl_img'])?>">
            </div>
          </div>
		<?php } ?>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-instagram content-center">
    <div class="bg-blur"></div>
    <div class="site-container">
	
	  <?php 
        $ig_array = array();
        $ig_array[]=array(
          'ig_title'=>'Ready for @topyouth_premierleague',
          'ig_embed'=>'DQL0rAECU2f',
        );
        $ig_array[]=array(
          'ig_title'=>'Friendly match vs Persera Rawabuntu @perserafc_',
          'ig_embed'=>'DQD3j2XCR5G',
        );
        $ig_array[]=array(
          'ig_title'=>'U14 @borussiaacademy.id ready for @askotpssitangsel',
          'ig_embed'=>'DP795XWiZJt',
        );
        $ig_array[]=array(
          'ig_title'=>'From Mönchengladbach to Jakarta',
          'ig_embed'=>'DMPdDahoGDl',
        );
        $ig_array[]=array(
          'ig_title'=>'Borussia spirit in Indonesia',
          'ig_embed'=>'DLo5MDwowTB',
        );
        $ig_array[]=array(
          'ig_title'=>'Throwback: When Borussia Came to Indonesia',
          'ig_embed'=>'DLHWVwaSNHN',
        );
        foreach($ig_array as $ig_list){
	  ?>
		<div class="ig-box img-frame thumb-loading">
		  <iframe title="<?php echo($ig_list['ig_title'])?>" class="instagram-media instagram-media-rendered lazyload" id="instagram-embed-0" data-original="https://www.instagram.com/p/<?php echo($ig_list['ig_embed'])?>/embed/captioned/" allowtransparency="true" allowfullscreen="true" frameborder="0" height="880" data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"></iframe>
		</div>
	  <?php } ?>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-gallery-1 content-center">
    <div class="bg-blur"></div>
    <div class="site-container">
	  
	  <div class="sg1-container">
	    <div class="section-title">Borussia Academy Indonesia at Bali7s Tournament</div>
        
		<div class="sg1-list">
          <?php 
            $bali7s_array = array();
            for ($i = 1; $i <= 18; $i++) {
              $bali7s_array[] = array(
                'bali7s_title' => "Borussia Academy Indonesia at Bali7s Tournament - Foto {$i}",
                'bali7s_img'=>"bali7s/{$i}.jpeg",
              );
            }
			foreach($bali7s_array as $bali7s_list){
		  ?>
            <a title="<?php echo($bali7s_list['bali7s_title'])?>" class="sg1-box img-frame thumb-loading" data-gall="gallery01" href="template/img/<?php echo($bali7s_list['bali7s_img'])?>">
              <img class="lazyload" data-original="template/img/<?php echo($bali7s_list['bali7s_img'])?>">
            </a>
          <?php } ?>
        </div>
        <script>
          new VenoBox({
            selector:'.sg1-box',
            numeration:true,
            infinigall:true,
            fitView:true,
            spinner:'rotating-plane'
          });
        </script>
		
		<div class="sg1-desc">
		  <p>We’re proud to announce that Borussia Academy Indonesia participated in the Bali7s Tournament, bringing 6 teams across various age groups. It was an incredible experience for our young talents to showcase their skills and passion for the game!</p>
		  <p>A huge thank you to our official sponsor, <b>PRISTINE 8.6+</b> (@pristine.official) Drinking Water for their unwavering support and for keeping our players refreshed throughout the matches. Your partnership plays a vital role in our journey!</p>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <?php require ($_SERVER['BMG'].'template/module/section-calendar.php')?>
  
  
  
  
  
  <section class="section-default section-photo-gallery index-photo-gallery content-center">
    <div class="bg-blur"></div>
    <div class="site-container">
	
	  <div class="section-title">Photo Gallery</div>
        
      <div class="spg-list">
        <?php 
          $pg1_array = array();
		  
          for ($i = 1; $i <= 4; $i++) {
            $pg1_array[] = array(
              'pg1_title'=>"Photo Gallery - Foto {$i}",
              'pg1_img'=>"home/{$i}-small.webp",
              'pg1_img_ori'=>"home/{$i}-original.jpg",
            );
          }
          foreach($pg1_array as $pg1_list){
        ?>
          <a title="<?php echo($pg1_list['pg1_title'])?>" class="spg-box img-frame thumb-loading" data-gall="gallery02" href="template/img/<?php echo($pg1_list['pg1_img_ori'])?>">
            <img title="<?php echo($pg1_list['pg1_title'])?>" class="lazyload" data-original="template/img/<?php echo($pg1_list['pg1_img'])?>">
          </a>
        <?php } ?>
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
	  
	  <div class="spg-action content-center">
	    <a title="Gallery" class="btn" href="gallery/">View All Photos</a>
	  </div>
	
    </div>
  </section>
  
  
  
  
  
  <?php require ($_SERVER['BMG'].'template/module/section-training-ground.php')?>
  
  
  
  
  
  <section class="section-default section-herrmann section-dsj content-center">
    <div class="bg-blur"></div>
    <div class="site-container">
	
	  <div class="sph-right img-frame thumb-loading">
		<img title="Logo" class="lazyload" data-original="template/img/dsj.webp">
	  </div>
	  <div class="sph-left">
	    <h2 class="section-title">WINNING PARTNERSHIP</h2>
		<p>Borussia M'Gladbach Academy Indonesia is thrilled to partner with the prestigious German School Jakarta (DSJ), a key German institution in Indonesia. Our collaboration extends beyond sharing DSJ's impressive 42,000m2 campus in the heart of BSD. As multicultural and multilingual organizations, we both prioritize cultural exchange, while emphasizing sports, physical health, and mental well-being. </p>
		<p>With over 66 years of Educational Excellence, DSJ's diverse student community of over 10 nationalities provides an ideal environment for nurturing young talents. Together, DSJ and Borussia M'Gladbach Academy are dedicated to a holistic approach to education, empowering students to reach their full potential. Learn more on DSJ's website about this exciting partnership and our shared commitment to excellence in education and sports.</p>
		<div class="sph-scanqr">
		  <div class="sph-scanqr-left">
		    <div class="sph-scanqr-title">Scan this QR</div>
		    <div class="sph-scanqr-subtitle">to get 50% off registration fee</div>
		  </div>
		  <div class="sph-scanqr-center"><?php require ($_SERVER['BMG'].'template/img/icon/fancy-arrow.svg')?></div>
		  <div class="sph-scanqr-right content-center"><?php require ($_SERVER['BMG'].'template/img/sample-qr.svg')?></div>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-border-logo section-border-contact content-center">
    <div class="site-container">
	
	  <div class="section-title">Partners, Sponsors & Supporters</div>
	
	  <div class="sbl-list">
        <?php 
          $sbl_array = array();
          $sbl_array[]=array(
            'sbl_name'=>'DSJ',
            'sbl_img'=>'logo-dsj.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'ISCO',
            'sbl_img'=>'logo-isco.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Wohnraum',
            'sbl_img'=>'logo-wohnraum.jpg',
          );
          $sbl_array[]=array(
            'sbl_name'=>'German Football Indonesia',
            'sbl_img'=>'logo-gfi.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Grassroot',
            'sbl_img'=>'logo-grassroot.svg',
          );
          foreach($sbl_array as $sbl_list){
        ?>
          <div class="sbl-box content-center">
            <div class="sbl-frame img-frame thumb-loading">
              <img title="<?php echo($sbl_list['sbl_name'])?>" class="lazyload" data-original="template/img/<?php echo($sbl_list['sbl_img'])?>">
            </div>
          </div>
		<?php } ?>
	  </div>
	  
	  <div class="sbc-note">
	    <div class="sbc-note-label">Please contact us to become our sponsor or partner!</div>
	    <div class="sbc-action content-center">
		  <a title="Contact" class="btn" href="">Contact</a>
		</div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <?php require ($_SERVER['BMG'].'template/module/section-contact.php')?>
  
  
  
  
  
</div>
<script>
  $(window).on('load',function(){
    if ($(window).width() > 1024) {
      ScrollReveal({distance:'55px',viewFactor:0.1,useDelay:'once'});
      ScrollReveal().reveal('.scb-content',{origin:'right'});
      ScrollReveal().reveal('.srs-left',{origin:'left'});
      ScrollReveal().reveal('.srs-right',{origin:'right',delay:100});
      ScrollReveal().reveal('.sbl-list > *',{origin:'right',interval:100});
      ScrollReveal().reveal('.section-instagram .site-container > *',{origin:'right',interval:100});
      ScrollReveal().reveal('.sg1-list > *',{origin:'right',interval:100});
      ScrollReveal().reveal('.section-calendar .site-container > *',{origin:'right',interval:100});
      ScrollReveal().reveal('.sib-content',{origin:'right'});
      ScrollReveal().reveal('.spg-list > *',{origin:'right',interval:100});
      ScrollReveal().reveal('.stg-info',{origin:'left'});
      ScrollReveal().reveal('.section-contact-container > *',{origin:'right',interval:100});
    }
  });
</script>
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>