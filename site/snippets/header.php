<!DOCTYPE html>
<html lang="en">

<?php snippet('head') ?>

<body class="<?= $page->template() ?>">

  <?php snippet('nav') ?>

  <?php snippet('contact', ['page' => $page]) ?>
  <?php if(isset($contact_active) && $contact_active == true) : ?>
    <script>openContactForm()</script>
  <?php endif ?>
