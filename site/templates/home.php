<?php snippet('header') ?>

  <main>

    <section>

      <div class="row">

        <?php echo $page->text()->kirbytext() ?>

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