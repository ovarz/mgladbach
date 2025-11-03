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

            <p>We have teamed up with renowned Bundesliga club <b>Borussia Mönchengladbach</b>, famous for its outstanding youth program. Together we bring you an excelent football experience, right here in the greater Jakarta area!</p>
            <p>The football program is open to boys and girls aged 3 to 16 with any skill level. It doesn't matter if you're just starting or already a semi-pro – everyone is welcome.</p>
            <p>Our training ground is the natural grass pitch at Deutsche Schule Jakarta (DSJ). The german school, located in BSD City, Tangerang offers great facilities in an international environment.</p>
            <p>Come and train the Borussia Foals way and follow the footsteps of a number of well-known players: Lothar Matthäus, Stefan Effenberg, Marcell Jansen, Mahmoud Dahoud, Marc-André ter Stegen, Julian Korb, Tony Jantschke and Patrick Herrmann are just a few examples.</p>

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
	
	  <div class="section-title">Academy</div>
	
	  <div class="section-registration-split">
	    <div class="srs-left">
		  <div class="srs-box">
            <h2 class="srs-title">Price Information</h2>
            <p>Registration fee IDR 1.000.000 (Including Jersey)</p>
            <ul>
              <li>1 Session per week IDR 800.000 / month</li>
              <li>2 Session per week IDR 1.000.000 / month</li>
              <li>3 Session per week IDR 1.200.000 / month</li>
            </ul>
            <p>*Early Payment Discounts apply</p>
		  </div>
		  <div class="srs-box">
            <h2 class="srs-title">Training ground</h2>
            <h3>German School Jakarta (DSJ)</h3>
            <p>Jl. Puspa Widya No.8, BSD City,</p>
            <p>Kec. Serpong, Kota Tangerang Selatan,</p>
            <p>Banten 15322, Indonesia</p>
            <div class="srs-action">
			  <a title="Register" class="btn srs-action-button" href="register/">Register</a>
			  <a title="Free Trial" class="btn srs-action-button" href="register/free-trial/">Free Trial</a>
			</div>
		  </div>
		</div>
		<div class="srs-right">
		  <div class="srs-box">
            <h2 class="srs-title">Schedule</h2>
            <ul>
              <li>Monday 16:00 - 17:30 (all ages except U6)</li>
              <li>Thursday 16:00 - 17:30 (all ages except U6)</li>
              <li>Saturday 7:30 - 8:30 Bambini (U6)</li>
              <li>Saturday 7:30 - 9:00 U8, U10</li>
              <li>Saturday 9:00 - 10:30 U12, U14</li>
              <li>Saturday 10:30 - 12:00 U16, U18</li>
            </ul>
		  </div>
		  <div class="srs-box">
            <h3 class="srs-subtitle">Designated goal keeper sessions:</h3>
            <ul>
              <li>Saturday 7:30 - 8:30 U8, U10, U12</li>
              <li>Saturday 10:30 - 11:30 U14, U16, U17</li>
            </ul>
            <p>*excluding public holidays</p>
            <p>*U6 sessions are typically 60 minutes only</p>
            <p>*Sessions for older kids may extend beyond 90 min</p>
		  </div>
		  <div class="srs-box">
            <p>Please check our calendar for detail and confirm training times via Whatsapp!</p>
            <div class="srs-action">
			  <a title="Go to calendar" class="btn srs-action-button" href="calendar/">Calendar</a>
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
  
  
  
  
  
  <section class="section-default section-methodology content-center">
    <div class="site-container">
	
	  <div class="section-methodology-row section-methodology-right">
	    <div class="smr-image img-frame thumb-loading">
		  <img title="Background" class="lazyload" data-original="template/img/bg-3.jpg">
		</div>
        <div class="section-intro-box">
          <div class="sib-content">
		    <h2 class="section-title">Coaching Methodology</h2>
			<p><b>Borussia M'Gladbach Academy Indonesia has partnered with German Bundesliga club Borussia Mönchengladbach, that is internationally recognized for its outstanding youth development programs.</b></p>
			<p>So you can be confident that we follow the most modern  training practices. Borussia coaching employs age-specific training programs that focus on skill development, motor coordination and the fundamentals of team play.</p>
			<p>Borussia players do not stand in a queue to await their turn every few minutes. The small games approach (1v1,2v2,4v4) is particularly crucial and effective for the younger age groups (4 - 9), and ensures maximum engagement and contact with the ball for every player. <b>Borussia training methods</b> encourage players to be creative thinkers and decision makers in a variety of game situations. There are no boring, monotonous, repetitive drills!</p>
			<p>Once young players are ready, we will provide them with match play experiences without pressure to win.</p>
			<p>We focus on the players' long term development, not short term results, and our parents are most supportive. We do not want to win at all cost but give our best effort and play as a team.</p>
          </div>
        </div>
	  </div>
	
	  <div class="section-methodology-row section-methodology-left">
	    <div class="smr-image img-frame thumb-loading">
		  <img title="Background" class="lazyload" data-original="template/img/bg-2.jpg">
		</div>
        <div class="section-intro-box">
          <div class="sib-content">
		    <h2 class="section-title">Coaching philosophy</h2>
			<p><b>At Borussia M'Gladbach Academy Indonesia we believe that we not only train young footballers, but we are also coaching young people in their overall development and growth.</b></p>
			<p>Enjoying physical activity, meeting challenges and acquiring social skills are all aspects of every day life— important now and in the future !</p>
			<p>A team sport such a football provides the ideal environment to practise accepting <b>winning & losing</b>, respecting others and maintaining an active, physical lifestyle. These values are now more important than ever.</p>
			<p>We accept and encourage children of all abilities, and Borussia coaches attend to the different individual needs and talents of every player.</p>
			<p>It is our priority to guarantee every participant a positive experience in our training sessions and tournaments. <b>Fun, enjoyment & maximum participation</b> are the main ingredients of all Borussia Academy Indonesia sessions.</p>
          </div>
        </div>
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-photo-gallery index-photo-gallery content-center">
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