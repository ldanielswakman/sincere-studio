<?php snippet('header') ?>

  <main>

      <? snippet('page-header', ['page' => $page, 'subtitle' => 'work experience']) ?>

      <?php echo $page->text()->kirbytext() ?>

      <?php if($page->slug() == 'contact') : ?>
        <?php snippet('twitterfeed'); ?>
      <?php endif; ?>

  </main>

<?php snippet('footer') ?>