<?php snippet('header') ?>

  <main>

    <div class="row">
      <div class="col-md-12">

        <div class="text">
          <h1><?php echo $page->title()->html() ?></h1>
          <?php echo $page->text()->kirbytext() ?>
        </div>

      </div>
    </div>

    <hr />

    <div class="row">
      <div class="col-md-12">

        <?php snippet('projects') ?>
        
      </div>
    </div>

  </main>

<?php snippet('footer') ?>