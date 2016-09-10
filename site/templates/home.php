<?php snippet('header') ?>

  <main>

    <section>

      <div class="row">

        <?php echo $page->text()->kirbytext() ?>

      </div>

      <div class="row">
        <div class="col-xs-12 u-aligncenter">
          <?php // https://oneplus.net/xman/op3jury/list/?status=0&sort=1&order=0 ?>
        </div>
      </div>

    </section>

    <section>
      <div class="row">
        <div class="col-xs-12 u-aligncenter">
          <h5>RECENT WORK</h5>
        </div>
      </div>
    </section>

    <?php snippet('featured', array('page' => $page )); ?>

    <?php snippet('twitterfeed'); ?>

  </main>

<?php snippet('footer') ?>