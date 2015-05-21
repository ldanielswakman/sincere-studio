<?php snippet('header') ?>

  <main>

    <section>

      <div class="row">

        <?php echo $page->text()->kirbytext() ?>

      </div>

    </section>

    <hr />

    <div class="row">
      <div class="col-md-12">

        <?php snippet('projects') ?>
        
      </div>
    </div>

  </main>

<?php snippet('footer') ?>