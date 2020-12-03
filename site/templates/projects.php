<?php snippet('header') ?>

  <main>

    <?php
    $projects = $page->children()->sortBy('year', 'desc');
    $pr_featured = $projects->filterBy('featured', 'in', ['1', 'true']);
    $subtitle = 'selected';

    if($page->slug() == 'architecture') {
      $subtitle = '';
    }

    if(param('tag')) {
      $pr_featured = $projects->filterBy('tags', param('tag'), ',');
      $subtitle = '<a href="' . $page->url() . '" class="u-floatright c-greylight">&times;</a><span class="u-op30">tag:</span> ' . param('tag') . '';
    }
    ?>

    <?php snippet('page-header', ['page' => $page, 'subtitle' => $subtitle]) ?>

    <?php if ($page->text()->isNotEmpty() && strlen($page->text()->kirbytext()) > 1) : ?>

      <section class="nopadding u-relative" style="border-bottom: 1px solid #ddd">

        <div class="row row-nopadding row-full u-abs-full">
          <?php // snippet('featured', array('page' => $page )); ?>
        </div>

          <p class="text"><?= $page->text()->kirbytext() ?></p>

        </div>

      </section>

    <?php endif ?>

    <?php if ($pr_featured->count() > 0) : ?>
      <section class="section--projects">
        <div class="row">

          <?php foreach ($pr_featured as $project) : ?>
            <div class="col-xs-12 col-sm-6">
              <a href="<?= $project->url() ?>" class="card u-mb2" style="width: 100%;">
                <?php if($image = $project->featuredimage()->toFile()) : ?>
                  <figure>
                    <img src="<?= $image->thumb(['width' => 1200])->url() ?>" alt="">
                  </figure>
                <?php endif ?>
                <div style="padding: 1rem;">
                  <h3 class="card__title"><?= $project->title()->html() ?><sup><?= $project->year() ?></sup></h3>
                  <p><?= $project->description()->html() ?></p>
                </div>
              </a>
            </div>
          <?php endforeach ?>

        </div>
      </section>
    <?php endif ?>

    <section>
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1">

          <p style="margin: 4rem 0 1rem; font-size: 2rem;">chronology</p>

        </div>
      </div>
    </section>

    <section class="bg-bluedull u-pv10vh" style="color: rgba(255, 255, 255, 0.8);">

      <?php foreach ($projects as $project) : ?>
        <div class="row">
          <div class="col-xs-12 col-sm-2 col-sm-offset-1 u-mb05 u-op70">
            <?= e((!isset($prev) || $prev->year()->value() !== $project->year()->value()), '<big>' . $project->year() . '</big>') ?>
          </div>
          <div class="col-xs-4 col-sm-1 u-mb05 u-op70">
            <?php if($image = $project->featuredimage()->toFile()) : ?>
              <a href="<?= $project->url() ?>" class="u-block" style="line-height: 1rem; margin-bottom: 0.75rem;">
                <figure>
                  <img src="<?= $image->thumb(['width' => 400])->url() ?>" alt="">
                </figure>
              </a>
            <?php endif ?>
          </div>
          <div class="col-xs-8 col-sm-7 u-mb05">
              <a href="<?= $project->url() ?>" class="u-block <?php e($project->isListed(), 'c-white', 'c-grey') ?>" style="line-height: 1rem; margin-bottom: 0.75rem;">
                <?= $project->title() ?><br>
                <small style="color: rgba(255, 255, 255, <?php e($project->isListed(), '0.5', '0.25') ?>);"><?= $project->description() ?></small>
              </a>
          </div>
        </div>
      <?php $prev = $project; endforeach; ?>

      <?php if($page->slug() !== 'architecture') : ?>
        <div class="row u-mt2">
          <div class="col-xs-12 col-sm-2 col-sm-offset-1">
            <big>before that</big>
          </div>
          <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1">
            <a href="<?= u('/architecture') ?>" class="c-white">architecture and urban design &rarr;</a>
        </div>
      <?php endif ?>

    </section>

  </main>

<?php snippet('footer') ?>