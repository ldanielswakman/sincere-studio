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
    // echo css('http://fonts.googleapis.com/css?family=Fira+Sans:400,700,400italic,700italic');
    // Ionicons
    echo css('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    // JQuery, SmoothScroll & Fastclick
    echo js('http://code.jquery.com/jquery-1.11.1.min.js');
    echo js('http://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.4/jquery.smooth-scroll.min.js');
    echo js('https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js');
    // echo js('http://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.2/fastclick.min.js');
  // if localhost then load local assets
  else :
    echo css('assets/css/bootstrap.min.css');
    echo css('assets/css/ionicons.min.css');
    echo js('assets/js/jquery-1.11.1.min.js');
    echo js('assets/js/jquery.smooth-scroll.min.js');
    echo js('assets/js/isotope.pkgd.min.js');
    // echo js('assets/js/fastclick.min.js');
  endif;

  // assets
  echo css('assets/css/style.css');
  echo js('assets/js/scripts.js');
  echo js('assets/js/twitterfetcher.min.js');
  ?>

  <!--[if lt IE 9]>
  <script type="text/javascript" src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
  <![endif]-->

</head>
<?php 
$bodyClass = $page->template();
$bodyClass .= ($page->isHomePage()) ? ' header-full' : ''; 
?>
<body class="<?php echo $bodyClass ?>">

  <header>
    <div class="row">
      <div class="col-md-5 col-xs-hide">
        <h6>
          <?php 
          if ($page->template() == 'project') :
            echo '<a href="' . $page->parent()->url() . '">' .
              '<i class="ion ion-ios-arrow-back u-mr5"></i>' .
              $page->parent()->title() .
              '</a>' . ' / ';
            echo $page->title()->html();
          elseif ($page->isHomePage()) :
            echo 'Graphic & web design';
          else:
            echo $page->title()->html();
          endif;
          ?>
        </h6>
      </div>
      <div class="col-md-2 col-xs-6">
        <a href="<?php echo ($page->url() != $site->url) ? $site->url : '#top' ?>" id="logo">
          <?php snippet('logo') ?>
        </a>
      </div>
      <div class="col-md-5 col-xs-6">
        <?php snippet('menu') ?>
      </div>
    </div>
  </header>
