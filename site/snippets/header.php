<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  <? snippet('header-metadata', array('page' => $page)) ?>


  <?php
  // checks if not on localhost, then serves assets from CDN
  $local = strpos($_SERVER['SERVER_NAME'], 'localhost');
  if($local === false) :
    // Bootstrap
    echo css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
    // Ionicons
    echo css('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    // Google Fonts
    echo css('https://fonts.googleapis.com/css?family=Overpass:400,400i,700,700i');
    // JQuery SmoothScroll
    echo js('http://code.jquery.com/jquery-1.11.1.min.js');
    echo js('http://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.4/jquery.smooth-scroll.min.js');
  // if localhost then load local assets
  else :
    // echo css('assets/css/bootstrap.min.css');
    echo css('assets/css/ionicons.min.css');
    echo js('assets/js/jquery-1.11.1.min.js');
    echo js('assets/js/jquery.smooth-scroll.min.js');
    // echo js('assets/js/fastclick.min.js');
  endif;

  // assets
  echo css('assets/css/style.css');
  echo js('assets/js/scripts.js');
  echo js('assets/js/twitterfetcher.min.js');

  ?>

  <link rel="alternate" href="http://ldaniel.eu" hreflang="en-GB" />

  <!--[if lt IE 9]>
  <script type="text/javascript" src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
  <![endif]-->

</head>
<?php 
$bodyClass = $page->template();
$bodyClass .= ($page->isHomePage()) ? ' header-full' : ''; 
?>
<body class="<?php echo $bodyClass ?>">

  <a href="<?php echo ($page->url() != $site->url()) ? $site->url() : '#top' ?>" class="logo">
    <?php snippet('logo') ?>
  </a>

  <?php snippet('menu') ?>