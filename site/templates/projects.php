<?php snippet('header') ?>

  <main>

    <div class="row u-pv40">
      <div class="col-md-12">

        <div class="text">
          <?php echo $page->text()->kirbytext() ?>
        </div>

      </div>
    </div>

    <div class="row u-pv40">
      <div class="col-sm-6 col-sm-offset-3">

        <ol>
          <?php foreach(page('work')->children()->visible() as $project): ?>
          <li>
            <a href="<?php echo $project->url() ?>"><?php echo $project->title()->html() ?></a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>

    <div class="row u-pv40">
      <div class="col-md-12">

        <?php snippet('projects') ?>

      </div>
    </div>

  </main>

<?php snippet('footer') ?>