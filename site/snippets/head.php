<head>

  <?php snippet('head-metadata', array('page' => $page)) ?>
  
  <?php
  $theme = $site->theme();
  // sets css & js assets based on ENV
  $css_asset = 'assets/css/style-' . $theme . '.css';

  // checks if not on localhost, then serves assets from CDN
  $js_assets = (c::get('env') !== 'DEV') ? array(
    '//code.jquery.com/jquery-1.11.1.min.js',
    'assets/js/scripts.min.js',
  ) : array(
    'assets/js/vendor/jquery-1.11.1.min.js',
    'assets/js/scripts.js',
  );

  echo js($js_assets);
  ?>

  <link rel="stylesheet" href="<?= url($css_asset) ?>" onload="this.media='all'">

  <link rel="manifest" href="<?= url('manifest.json') ?>">
  <link rel="icon" href="<?= url('assets/images/favicon.png') ?>">
  <link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>">
  <link rel="apple-touch-icon" href="<?= url('assets/images/app-icon.png') ?>">

</head>
