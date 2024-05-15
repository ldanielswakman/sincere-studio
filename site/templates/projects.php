<?php snippet('header') ?>

  <main>

    <?php
    $projects = $page->children()->sortBy('year', 'desc');
    $filteredProjects = $projects;
    $featuredProjects = $projects->filterBy('featured', 'in', ['1', 'true']);
    $subtitle = 'selected';
    $list_title = 'all projects';

    if($page->slug() == 'architecture') {
      $subtitle = '';
    }

    if($tag = param('tag')) {
      $filteredProjects = $projects->filterBy('tags', urldecode($tag), ',');
      $subtitle = '';
      $list_title = '<a href="' . $page->url() . '" class="u-floatright">&times;</a><span class="u-op30">projects tagged</span> ' . urldecode($tag) . '';
    }
    ?>

    <?php snippet('page-header', ['page' => $page, 'subtitle' => $subtitle]) ?>

    <?php if (!param('tag') && $featuredProjects->count() > 0) : ?>
      <!-- Selected projects -->
      <section class="section--projects">
        <div class="row">

          <?php foreach ($featuredProjects as $project) : ?>
            <div class="col-xs-12 col-sm-6">
              <a href="<?= $project->url() ?>" class="card u-mb2" style="width: 100%;">
                <?php if($image = $project->featuredimage()->toFile()) : ?>
                  <figure>
                    <img src="<?= $image->thumb(['width' => 1200])->url() ?>" alt="">
                  </figure>
                <?php endif ?>
                <div class="card__info">
                  <h3 class="card__title"><?= $project->title()->html() ?><sup><?= $project->year() ?></sup></h3>
                  <p><?= $project->description()->html() ?></p>
                </div>
              </a>
            </div>
          <?php endforeach ?>

        </div>
      </section>
    <?php endif ?>

    <?php if(true): // Listing all tags ?>
    <section>
      <div class="row">
        <div class="col-xs-12">
        </div>
      </div>
    </section>
    <?php endif ?>

    <section style="border-top: 1px solid #34495e;">
      <div class="row">
        <div class="col-xs-12 u-mt3">

        <?php
        // Create an empty associative array to store tags and their counts
        $tagCounts = [];

        // Iterate over projects to collect tag counts
        foreach($projects->pluck('tags', ', ', true) as $tag) {
            $decodedTag = urldecode($tag);
            $count = $projects->filterBy('tags', $tag, ',')->count();
            if ($count > 0) {
                // Store tag and count in the associative array
                $tagCounts[$decodedTag] = $count;
            }
        }

        // Sort the tag counts array by count in descending order
        arsort($tagCounts);

        // Iterate over the sorted tag counts array to output tags
        foreach ($tagCounts as $tag => $count) {
            $isActive = (urldecode($tag) === urldecode(param('tag')));
        ?>
            <a href="<?= url($page->url(), ['params' => ['tag' => urlencode($tag)]]) ?>" class="<?= $isActive ? 'c-blue' : 'c-grey' ?>" style="margin-right: 0.5rem; white-space: nowrap;">
                <?= $tag ?><sup class="u-op30"><?= $count ?></sup>
            </a>
        <?php
        }
        ?>

          
          <p class="u-mt3 u-text-2x c-blue"><?= $list_title ?></p>

        </div>
      </div>
    </section>

    <section class="u-pv3" style="color: rgba(255, 255, 255, 0.8);">

      <?php foreach ($filteredProjects as $project) : ?>
        <div class="row">
          <div class="col-xs-12 col-sm-2 u-mb05">
            <?= e((!isset($prev) || $prev->year()->value() !== $project->year()->value()), '<big>' . $project->year() . '</big>') ?>
          </div>
          <div class="col-xs-4 col-sm-2 col-md-1 u-mb05">
            <?php if($image = $project->featuredimage()->toFile()) : ?>
              <a href="<?= $project->url() ?>" class="u-block" style="line-height: 1rem; margin-bottom: 0.75rem;">
                <figure style="border-radius: 0.25rem; overflow: hidden;">
                  <img src="<?= $image->thumb(['width' => 200])->url() ?>" class="u-block" alt="">
                </figure>
              </a>
            <?php endif ?>
          </div>
          <div class="col-xs-8 col-sm-5 col-md-6 u-mb05">
              <a href="<?= $project->url() ?>" class="u-block <?php e($project->isListed(), 'c-white', 'c-grey') ?>" style="line-height: 1rem; margin-bottom: 0.75rem;">
                <h4 class="u-mt05"><?= $project->title() ?></h4>
                <small class="u-block u-mt05" style="color: rgba(255, 255, 255, <?php e($project->isListed(), '0.5', '0.25') ?>);"><?= $project->description() ?></small>
              </a>
          </div>
          <div class="col-xs-12 col-sm-3 u-mb05 u-text-1x u-hide-on-mobile">
            <?php foreach($project->tags()->split() as $key => $tag) : ?>
              <a href="<?= $page->url() . '/tag:' . $tag ?>" class="c-grey">
                <?= $tag ?></a><?php if($key+1 !== count($project->tags()->split()) ) { echo ','; } ?>
            <?php endforeach ?>
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