<head>  
<meta charset="utf-8">
<meta name="robots" content="noindex, follow">				
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="true" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="description" content="<?php echo $sitename; ?> <?php echo $menu; ?>">
<link rel="preconnect" href="https://aufarmahardi.com">
<link rel="dns-prefetch" href="https://aufarmahardi.com">
<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
<title><?php echo $sitename; ?> <?php echo $menu; ?></title>
<link href="template/img/favicon.ico?<?php echo $anticache; ?>" rel="icon" type="image/ico" />

<link rel="preload" href="template/fonts/N0bU2SZBIuF2PU_0DXR1.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="template/fonts/E218_cfngu7HiRpPX3ZpNE4kY5zKYvWhrw.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="template/css/rancak.css?<?php echo $anticache; ?>" as="style">
<link rel="preload" href="template/img/logo.png?<?php echo $anticache; ?>" as="image">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" as="script">
<?php if($menu == 'Home') { ?>
  <link rel="preload" href="template/img/bg-1.webp?<?php echo $anticache; ?>" as="image" media="(min-width:1024px)">
  <link rel="preload" href="template/img/bg-1-mobile-preload.webp?<?php echo $anticache; ?>" as="image">
  <link rel="preload" href="template/img/logo-black.webp?<?php echo $anticache; ?>" as="image">
  <link rel="preload" href="template/img/train-like-a-pro.webp?<?php echo $anticache; ?>" as="image">
<?php } ?>
<?php if($menu == 'Home' || $menu == 'Gallery') { ?>
  <link rel="preload" href="template/css/venobox.min.css?<?php echo $anticache; ?>" as="style">
  <link rel="preload" href="template/js/venobox.min.js?<?php echo $anticache; ?>" as="script">
<?php } ?>
<?php if($menu == 'Register') { ?>
  <link rel="preload" href="template/img/bg-6.webp?<?php echo $anticache; ?>" as="image">
<?php } ?>

<style><?php require ($_SERVER['BMG'].'template/css/font.css')?></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>');</script>
<script async>
$("body,html").bind("touchstart touchmove scroll mousedown DOMMouseScroll mousewheel keyup", function(e){
  $("script").each(function(){
    var get_script = $(this).attr("rancak-hold");
    $(this).attr('src', get_script);
  })
});
</script>
<?php if($menu == 'Home' || $menu == 'Gallery') { ?>
  <script src="template/js/venobox.min.js"></script>
<?php } ?>

<link rel="stylesheet" type="text/css" href="template/css/rancak.css?<?php echo $anticache; ?>"/>
<link rel="stylesheet" type="text/css" href="template/css/rancak-desktop.css?<?php echo $anticache; ?>" media="(min-width:1024px)">

</head>
<body class="lang-id">