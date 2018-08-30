<!DOCTYPE html>
<html lang="en">

<? snippet('head') ?>

<body class="<?= $page->template() ?>">

  <a href="<?= ($page->url() != $site->url()) ? $site->url() : '#top' ?>" class="logo logo--init">
    <? snippet('svg/logo') ?>
  </a>

  <? snippet('nav') ?>

  <? snippet('contact', ['page' => $page]) ?>
  <? if(isset($contact_active) && $contact_active == true) : ?>
    <script>openContactForm()</script>
  <? endif ?>
