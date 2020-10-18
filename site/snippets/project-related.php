<?php $related_pages = (isset($related_pages) && $related_pages->count() > 1) ? $related_pages : $site->find('projects')->children()->not($page)->not($page->nextListed())->shuffle()->limit(3) ?>

<section class="bg-greylighter u-pv2">
  <div>
    <p style="margin: 4rem 0 1rem; font-size: 2rem;">related projects</p>
  </div>
  
  <!-- Project Cards -->
  <div class="card-container owl-carousel u-mt1">
    <?php foreach ($related_pages as $project) : ?>

      <a href="<?php echo $project->url() ?>" class="card card--shadow card--related">
        <?php if($image = $project->featuredimage()->toFile()) : ?>
          <figure>
            <img src="<?= $image->thumb(['width' => 800])->url() ?>" alt="">
          </figure>
        <?php endif ?>
      </a>

    <?php endforeach ?>

  </div>

  <a href="<?= $page->parent()->url() ?>">
      <div class="row cta u-pv1 u-mt2">
          <div class="col-md-4">
            <i class="ion ion-ios-arrow-thin-left ion-2x u-floatleft u-mr10"></i>
            <span class="u-inlineblock u-floatleft u-pt5">
              <?php if($next = $page->nextListed()) { echo 'or, '; } ?>
              get back to work
            </span>
          </div>
      </div>
  </a>

</section>