<a title="Chat with us" class="float-whatsapp content-center hide" href="https://api.whatsapp.com/send/?phone=6281118898205&text=Hi%2C+I+visited+www.borussiaacademy.id&type=phone_number&app_absent=0" target="_blank">
  <div class="tooltip">Chat with us</div>
  <?php require ($_SERVER['BMG'].'template/img/icon/float-whatsapp.svg')?>
</a>



<noscript id="deferred-styles">
  <?php if($menu == 'Home' || $menu == 'Gallery') { ?>
    <link rel="stylesheet" type="text/css" href="template/css/venobox.min.css?<?php echo $anticache; ?>" media="print" onload="this.media='all'"/>
  <?php } ?>
  <link rel="stylesheet" type="text/css" href="template/css/hold.css?<?php echo $anticache;?>" media="print" onload="this.media='all'"/>
</noscript>
<script defer>
  var loadDeferredStyles = function() {
	var addStylesNode = document.getElementById("deferred-styles");
	var replacement = document.createElement("div");
	replacement.innerHTML = addStylesNode.textContent;
	document.body.appendChild(replacement)
	addStylesNode.parentElement.removeChild(addStylesNode);
  };
  var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
  window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  if (raf) raf(function(){window.setTimeout(loadDeferredStyles,0);});
  else window.addEventListener('load', loadDeferredStyles);
</script>
<script defer src="template/js/lazysizes.min.js"></script>
<script defer rancak-hold="template/js/rancak.js?<?php echo $anticache;?>"></script>
<script defer>
  window.scrollTo(0,0);
</script>



</body>
</html>