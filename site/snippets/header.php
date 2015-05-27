<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <meta name="author" content="<?php echo $site->author()->html() ?>" />

  <?php
  // checks if not on localhost, then serves assets from CDN
  $local = strpos($_SERVER['SERVER_NAME'], 'localhost');
  if($local === false) :
    // Bootstrap
    echo css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
    // Google Webfonts
    // echo css('http://fonts.googleapis.com/css?family=Quando');
    // echo css('http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700italic,700,300,300italic');
    // Ionicons
    echo css('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    // JQuery, SmoothScroll & Fastclick
    echo js('http://code.jquery.com/jquery-1.11.1.min.js');
    // echo js('http://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.4/jquery.smooth-scroll.min.js');
    // echo js('http://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.2/fastclick.min.js');
  // if localhost then load local assets
  else :
    echo css('assets/css/bootstrap.min.css');
    echo css('assets/css/ionicons.min.css');
    echo js('assets/js/jquery-1.11.1.min.js');
    // echo js('assets/js/jquery.smooth-scroll.min.js');
    // echo js('assets/js/fastclick.min.js');
  endif;

  // assets
  echo css('assets/css/style.css');
  echo js('assets/js/scripts.js');
  ?>

  <!--[if lt IE 9]>
  <script type="text/javascript" src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
  <![endif]-->

</head>
<body class="<?php echo $page->template() ?>">

  <header>
    <div class="row">
      <div class="col-md-5">
        <h6><?php echo $page->title()->html() ?></h6>
      </div>
      <div class="col-md-2">
        <a href="<?php echo ($page->url() != $site->url) ? $site->url : '#top' ?>" id="logo">
          <b>ldaniel</b>.eu
          <svg version="1.1" id="logo-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="150px" height="150px" viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
            <path class="logo-svg-path" fill="none" stroke="#003355" stroke-width="1.7297" stroke-miterlimit="10" d="M130.363,84.294
              c0,3.46,4.359,6.102,9.283,6.102c3.891,0,9.162-3.366,9.162-11.796v-3.53c0-40.76-33.16-73.921-73.921-73.921
              c-40.76,0-73.921,33.162-73.921,73.921s33.161,73.921,73.921,73.921c32.726,0,60.554-21.378,70.251-50.9" />
          </svg>
        </a>
      </div>
      <div class="col-md-5">
        <?php snippet('menu') ?>
      </div>
    </div>
  </header>
