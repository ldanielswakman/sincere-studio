<?php snippet('header') ?>

  <main>

      <?php snippet('page-header', ['page' => $page]) ?>

      <section>
        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <?= $page->text()->kirbytext() ?>
          </div>
        </div>
      </section>

  </main>

<?php snippet('footer') ?>