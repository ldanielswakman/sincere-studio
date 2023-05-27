<!DOCTYPE html>
<html lang="en">

<?php snippet('head') ?>

<body class="<?= $page->template() ?>">

  <a href="<?= ($page->url() != $site->url()) ? $site->url() : '#top' ?>" class="logo logo--init">
    <?php if($site->theme() == 'ldaniel') : ?>
      <?php snippet('svg/logo') ?>
    <?php elseif($site->theme() == 'sincere') : ?>
      <?php snippet('svg/logo-sincere') ?>
    <?php endif ?>
  </a>
  
  <?php if(!isset($nav) || $nav !== false) : snippet('nav'); endif; ?>

  <?php snippet('contact', ['page' => $page]) ?>
  <?php if(isset($contact_active) && $contact_active == true) : ?>
    <script>openContactForm()</script>
  <?php endif ?>
