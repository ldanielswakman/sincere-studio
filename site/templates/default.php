<? snippet('header') ?>

  <main>

      <? snippet('page-header', ['page' => $page]) ?>

      <section>
        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-3">
            <?= $page->text()->kirbytext() ?>
          </div>
        </div>
      </section>

  </main>

<? snippet('footer') ?>