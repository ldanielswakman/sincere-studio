<?php snippet('header') ?>

  <main>

    <section class="u-mb40">

      <div class="row">

        <?php echo $page->text()->kirbytext() ?>

      </div>

    </section>

    <section class="u-nopadding">

      <div class="row">
        <div class="col-xs-12 u-aligncenter">
          <h5 class="u-mb30">RECENT WORK</h5>
        </div>
      </div>

      <div class="u-relative" style="height: 200px;">

        <div class="row row-nopadding row-full u-abs-full">
          <?php snippet('featured', array('page' => $page )); ?>
        </div>

      </div>

    </section>

  </main>

<?php snippet('footer') ?>