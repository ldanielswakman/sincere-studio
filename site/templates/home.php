<?php snippet('header') ?>

  <main>

    <section class="u-mb40">

      <div class="row">

        <?php echo $page->text()->kirbytext() ?>

      </div>

    </section>


    <div class="row row-nopadding row-full">
      <?php snippet('featured') ?>
    </div>

  </main>

<?php snippet('footer') ?>