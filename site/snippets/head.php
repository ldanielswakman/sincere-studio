<head>

  <?php snippet('head-metadata', array('page' => $page)) ?>
  
  <?php
  $theme = $site->theme();
  // sets css & js assets based on ENV
  $css_assets = array('assets/css/style-' . $theme . '.css');

  // checks if not on localhost, then serves assets from CDN
  $js_assets = (c::get('env') !== 'DEV') ? array(
    '//code.jquery.com/jquery-1.11.1.min.js',
    'assets/js/scripts.min.js',
  ) : array(
    'assets/js/vendor/jquery-1.11.1.min.js',
    'assets/js/scripts.js',
  );

  echo css($css_assets);
  echo js($js_assets);
  ?>

  <link rel="manifest" href="<?= url('manifest.json') ?>">
  <link rel="icon" href="<?= url('assets/images/favicon.png') ?>">
  <link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>">
  <link rel="apple-touch-icon" href="<?= url('assets/images/app-icon.png') ?>">

  <!--[if lt IE 9]>
  <script type="text/javascript" src="//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
  <![endif]-->

</head>