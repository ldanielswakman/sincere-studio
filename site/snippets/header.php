<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <? snippet('header-metadata', array('page' => $page)) ?>

  <? ecco(strpos(kirby()->request()->url(),'_/new') !== false, '<meta name="robots" value="noindex" />') ?>

  <?
  // sets css & js assets based on ENV
  $css_assets = (c::get('env') !== 'DEV') ? array(
    '//cdn.jsdelivr.net/flexboxgrid/6.3.0/flexboxgrid.min.css',
    '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css',
    // '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
    'assets/css/style.css',
  ) : array(
    'assets/css/flexboxgrid.min.css',
    'assets/css/style.css',
    // 'assets/css/ionicons.min.css',
    'assets/css/owl.carousel.min.css',
  );

  // checks if not on localhost, then serves assets from CDN
  $js_assets = (c::get('env') !== 'DEV') ? array(
    '//code.jquery.com/jquery-1.11.1.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.4/jquery.smooth-scroll.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js',
    'assets/js/scripts.js',
  ) : array(
    'assets/js/vendor/jquery-1.11.1.min.js',
    'assets/js/vendor/jquery.smooth-scroll.min.js',
    'assets/js/vendor/owl.carousel.min.js',
    'assets/js/scripts.js',
  );

  echo css($css_assets);
  echo js($js_assets);
  ?>

  <link rel="alternate" href="http://www.ldaniel.eu/" hreflang="en-gb" />

  <link rel="manifest" href="<?= url('manifest.json') ?>">
  <link id="favicon" rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>">

  <!--[if lt IE 9]>
  <script type="text/javascript" src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
  <![endif]-->

</head>

<body class="<?= $page->template() ?>">

  <a href="<?= ($page->url() != $site->url()) ? $site->url() : '#top' ?>" class="logo">
    <? snippet('logo') ?>
  </a>

  <? snippet('nav') ?>

  <? snippet('contact', ['page' => $page]) ?>
  <? if(isset($contact_active) && $contact_active == true) : ?>
    <script>openContactForm()</script>
  <? endif ?>
