<?php 
  $lang='id';
  $menu='Home';
  $template='default';
  require ('template/inc/base.php')
?>
<?php require ($_SERVER['BMG'].'template/inc/sample.php')?>
<?php require ($_SERVER['BMG'].'template/inc/meta.php')?>
<?php require ($_SERVER['BMG'].'template/inc/header.php')?>
<h1 class="hide"><?php echo $sitename; ?> <?php echo $menu; ?></h1>
<div class="rancak-foundation">
  
  
  
  
  
  <section class="section-default section-intro content-center">
    <div class="site-container">
	
	  <div class="section-intro-box">
	    <div class="sib-content">
		  <div class="sib-logo img-frame thumb-loading">
            <img title="Logo" class="lazyload" data-sizes="auto" data-original="template/img/logo-black-mobile.webp"
			data-srcset="template/img/logo-black-mobile.webp 300w, template/img/logo-black.webp 600w"/>
          </div>
		  
		  <p>We have teamed up with renowned Bundesliga club <b>Borussia Mönchengladbach</b>, famous for its outstanding youth program. Together we bring you an excelent football experience, right here in the greater Jakarta area!</p>
		  <p>The football program is open to boys and girls aged 3 to 16 with any skill level. It doesn't matter if you're just starting or already a semi-pro – everyone is welcome.</p>
		  <p>Our training ground is the natural grass pitch at Deutsche Schule Jakarta (DSJ). The german school, located in BSD City, Tangerang offers great facilities in an international environment.</p>
		  <p>Come and train the Borussia Foals way and follow the footsteps of a number of well-known players: Lothar Matthäus, Stefan Effenberg, Marcell Jansen, Mahmoud Dahoud, Marc-André ter Stegen, Julian Korb, Tony Jantschke and Patrick Herrmann are just a few examples.</p>
		  		  
		  <div class="sib-tlap img-frame thumb-loading">
            <img title="Logo" class="lazyload" data-sizes="auto" data-original="template/img/train-like-a-pro-mobile.webp"
			data-srcset="template/img/train-like-a-pro-mobile.webp 300w, template/img/train-like-a-pro.webp 600w"/>
          </div>
		</div>
		<div class="sib-arrow desktop-only">
		  <?php require ($_SERVER['BMG'].'template/img/icon/gimmick.svg')?>
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
  
  
  
  
  
  <section class="section-default section-herrmann content-center">
    <div class="bg-blur"></div>
    <div class="site-container">
	
	  <div class="sph-left">
	    <h2 class="section-title">Borussia Legend <span style="color:var(--color-4)">Patrick Herrmann</span> Visits Indonesia</h2>
		<p>In June 2025, Borussia Mönchengladbach legend <b>Patrick <span style="color:var(--color-4)">@flaco7</span> Herrmann</b>  made a special visit to Indonesia as part of the Bundesliga Common Ground project and to spend time at the Borussia M'Gladbach Academy Indonesia.</p>
		<p>Patrick Herrmann, who played more than a decade in the Bundesliga for Borussia, is loved by fans for his loyalty, pace, and countless decisive goals and assists. His visit brought the spirit of Borussia directly to Jakarta, inspiring young footballers and strengthening the connection between the club and its fans in Southeast Asia.</p>
		<p>During his stay, Patrick joined community events at the Bundesliga Common Ground in Jakarta, meeting children and local players, signing autographs, and sharing stories from his professional career. He emphasized the importance of teamwork, fair play, and passion—values that Borussia has always stood for.</p>
		<p>At the <b>Borussia M'Ggladbach Academy Indonesia</b>, Patrick attended training sessions, spoke with coaches, and encouraged our young talents to keep pushing themselves on and off the pitch. He reminded the players that even legends like him once started as kids with big dreams, and that with commitment and hard work, they can also achieve great things.</p>
		<p>The Academy was honored to welcome such an iconic figure. Patrick Herrmann’s visit marks another milestone in Borussia’s mission to build bridges between Germany and Indonesia through football. His presence will be remembered by everyone who trained, played, and celebrated with him during those unforgettable days in June 2025.</p>
	  </div>
	  <div class="sph-right img-frame thumb-loading">
		<img title="Logo" class="lazyload" data-original="template/img/patrick-herrmann-borussia-mgladbach-academy-indonesia.webp">
	  </div>
	  
	</div>
  </section>
  
  
  
  
  
  <section class="section-default section-instagram content-center">
    <div class="site-container">
	
	  <?php 
        $ig_array = array();
        $ig_array[]=array(
          'ig_title'=>'Borussia spirit in Indonesia',
          'ig_embed'=>'DLo5MDwowTB',
        );
        $ig_array[]=array(
          'ig_title'=>'Mau susah sekarang apa nanti?',
          'ig_embed'=>'DMKA0V-yFJJ',
        );
        $ig_array[]=array(
          'ig_title'=>'From Mönchengladbach to Jakarta',
          'ig_embed'=>'DMPdDahoGDl',
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
  
  
  
  
  
  <section class="section-default section-border-logo content-center">
    <div class="site-container">
	
	  <div class="sbl-list">
        <?php 
          $sbl_array = array();
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-dsj.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-isco.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-wohnraum.jpg',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-gfi.webp',
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
  
  
  
  
  
  <?php require ($_SERVER['BMG'].'template/module/section-calendar.php')?>
  
  
  
  
  
  <section class="section-default section-methodology content-center">
    <div class="site-container">
	
	  <div class="section-methodology-row section-methodology-right">
        <div class="section-intro-box">
          <div class="sib-content">
		    <h2 class="section-title">Coaching Methodology</h2>
			<p><b>Borussia M'Gladbach Academy Indonesia has partnered with German Bundesliga club Borussia Mönchengladbach, that is internationally recognized for its outstanding youth development programs.</b></p>
			<p>So you can be confident that we follow the most modern  training practices. Borussia coaching employs age-specific training programs that focus on skill development, motor coordination and the fundamentals of team play.</p>
			<p>Borussia players do not stand in a queue to await their turn every few minutes. The small games approach (1v1,2v2,4v4) is particularly crucial and effective for the younger age groups (4 - 9), and ensures maximum engagement and contact with the ball for every player. <b>Borussia training methods</b> encourage players to be creative thinkers and decision makers in a variety of game situations. There are no boring, monotonous, repetitive drills!</p>
			<p>Once young players are ready, we will provide them with match play experiences without pressure to win.</p>
			<p>We focus on the players' long term development, not short term results, and our parents are most supportive. We do not want to win at all cost but give our best effort and play as a team.</p>
          </div>
          <div class="sib-arrow desktop-only">
            <?php require ($_SERVER['BMG'].'template/img/icon/gimmick.svg')?>
          </div>
        </div>
	  </div>
	
	  <div class="section-methodology-row">
        <div class="section-intro-box">
          <div class="sib-content">
		    <h2 class="section-title">Coaching philosophy</h2>
			<p><b>At Borussia M'Gladbach Academy Indonesia we believe that we not only train young footballers, but we are also coaching young people in their overall development and growth.</b></p>
			<p>Enjoying physical activity, meeting challenges and acquiring social skills are all aspects of every day life— important now and in the future !</p>
			<p>A team sport such a football provides the ideal environment to practise accepting <b>winning & losing</b>, respecting others and maintaining an active, physical lifestyle. These values are now more important than ever.</p>
			<p>We accept and encourage children of all abilities, and Borussia coaches attend to the different individual needs and talents of every player.</p>
			<p>It is our priority to guarantee every participant a positive experience in our training sessions and tournaments. <b>Fun, enjoyment & maximum participation</b> are the main ingredients of all Borussia Academy Indonesia sessions.</p>
          </div>
          <div class="sib-arrow desktop-only">
            <?php require ($_SERVER['BMG'].'template/img/icon/gimmick.svg')?>
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
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-dsj.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-isco.webp',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-wohnraum.jpg',
          );
          $sbl_array[]=array(
            'sbl_name'=>'Logo',
            'sbl_img'=>'logo-gfi.webp',
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
<?php require ($_SERVER['BMG'].'template/inc/footer.php')?>
<?php require ($_SERVER['BMG'].'template/inc/base-bottom.php')?>