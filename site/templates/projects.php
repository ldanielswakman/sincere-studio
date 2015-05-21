<?php snippet('header') ?>

  <main>

    <div class="row">
      <div class="col-md-12">

        <div class="text">
          <?php echo $page->text()->kirbytext() ?>
        </div>

        <hr>

        <?php snippet('projects') ?>

      </div>
    </div>

  </main>

<?php snippet('footer') ?>