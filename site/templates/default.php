<?php snippet('header') ?>

  <main>

      <?php echo $page->text()->kirbytext() ?>

      <?php if($page->slug() == 'contact') : ?>
        <?php snippet('twitterfeed'); ?>
      <?php endif; ?>

  </main>

<?php snippet('footer') ?>