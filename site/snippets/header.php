<!DOCTYPE html>
<html lang="en">

<?php snippet('head') ?>

<body class="<?= $page->template() ?>">

  <?php
  $logoTarget = "#top";
  if (get('src') == 'cv') {
    $logoTarget = page('cv')->url();
  } else if ($page->url() != $site->url()) {
    $logoTarget = $site->url();
  }
  ?>
  <a href="<?= $logoTarget ?>" aria-label="Navigate home" class="logo logo--init">
    <?php if($site->theme() == 'ldaniel') : ?>
      <?php snippet('svg/logo') ?>
    <?php elseif($site->theme() == 'sincere') : ?>
      <?php snippet('svg/logo-sincere') ?>
    <?php endif ?>
  </a>
  
  <?php if(!isset($nav) || $nav !== false) : snippet('nav'); endif; ?>
