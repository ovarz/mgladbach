<?php
  $sitename = 'Borussia Mönchengladbach Academy Indonesia';
  $sitedesc = 'Borussia Mönchengladbach Academy Indonesia adalah akademi sepak bola resmi dari Borussia Mönchengladbach untuk anak usia 3–16 tahun di Jakarta dan BSD. Menghadirkan pelatihan sepak bola ala Jerman dengan metode FUNiño dan kurikulum internasional.';
  $anticache = date ('s'.'i'.'H'.'d'.'m'.'Y');
?>
<!DOCTYPE html>
<head>  
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PW3NTZVN5X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PW3NTZVN5X');
</script>
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">	
<meta content="<?php echo $sitename; ?>" name="author"/>
<meta content="id" name="language"/>
<meta content="id" name="geo.country"/>
<meta content="Indonesia" name="geo.placename"/>
<meta http-equiv="content-language" content="In-Id"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="true" />
<meta name="apple-touch-fullscreen" content="yes" />

<title><?php echo $menu; ?> - <?php echo $sitename; ?> – Akademi Sepak Bola Resmi Borussia Mönchengladbach</title>
<meta name="description" content="<?php echo $sitedesc; ?>">
<meta name="copyright" content="2025 | <?php echo $sitename; ?>">

<link rel="preconnect" href="https://mgladbachacademy.id">
<link rel="dns-prefetch" href="https://mgladbachacademy.id">
<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
<link rel="preconnect" href="https://www.googletagmanager.com">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link href="admin/assets/img/favicon.ico?<?php echo $anticache; ?>" rel="icon" type="image/ico" />

<link rel="preload" href="admin/assets/fonts/N0bU2SZBIuF2PU_0DXR1.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="admin/assets/fonts/E218_cfngu7HiRpPX3ZpNE4kY5zKYvWhrw.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="admin/assets/css/rancak.css?<?php echo $anticache; ?>" as="style">
<link rel="preload" href="admin/assets/img/logo.webp?<?php echo $anticache; ?>" as="image">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" as="script">

<style><?php require ($_SERVER['BMG'].'admin/assets/css/font.css')?></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="admin/assets/js/jquery.js"><\/script>');</script>
<script async>
$("body,html").bind("touchstart touchmove scroll mousedown DOMMouseScroll mousewheel keyup", function(e){
  $("script").each(function(){
    var get_script = $(this).attr("rancak-hold");
    $(this).attr('src', get_script);
  })
});
</script>

<link rel="stylesheet" type="text/css" href="admin/assets/css/rancak.css?<?php echo $anticache; ?>"/>
<link rel="stylesheet" type="text/css" href="admin/assets/css/rancak-desktop.css?<?php echo $anticache; ?>" media="(min-width:1024px)">

<?php if($datatable == 'yes') { ?>
  <link rel="preconnect" href="https://cdn.datatables.net">
  <link rel="dns-prefetch" href="https://cdn.datatables.net">

  <link rel="preload" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" as="style">
  <link rel="preload" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" as="style">
  <link rel="preload" href="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" as="script">
  <link rel="preload" href="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js" as="script">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<?php } ?>

</head>
<body class="lang-<?php echo $lang;?>">
<?php if($site_title == 'default') { ?>
  <h1 class="hide"><?php echo $menu; ?> - <?php echo $sitename; ?> – Akademi Sepak Bola Resmi Borussia Mönchengladbach</h1>
<?php } ?>