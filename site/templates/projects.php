<? snippet('header') ?>

  <main>

    <? snippet('page-header', ['page' => $page, 'subtitle' => 'selected']) ?>

    <? if (count($page->text()->kirbytext()) > 1) : ?>

      <section class="nopadding u-relative" style="border-bottom: 1px solid #ddd">

        <div class="row row-nopadding row-full u-abs-full">
          <? // snippet('featured', array('page' => $page )); ?>
        </div>

          <?= count($page->text()->kirbytext()) ?>
          <p class="text"><?= $page->text()->kirbytext() ?></p>

        </div>

      </section>

    <? endif ?>

    <?
    $projects = $page->children()->sortBy('year', 'desc');
    $pr_featured = $projects->filterBy('featured', '1');
    ?>

    <section class="u-pv5vh">
      <div class="row">

        <? foreach ($pr_featured as $project) : ?>
          <div class="col-xs-12 col-sm-6">
            <a href="<?= $project->url() ?>" class="card u-mb2" style="width: 100%;">
              <? if($image = $project->featuredimage()) : ?>
                <figure>
                  <img src="<?= thumb($project->image($image), ['width' => 800])->url() ?>" alt="">
                </figure>
              <? endif ?>
              <div style="padding: 1rem;">
                <h3 style="margin-bottom: 0.25rem;"><?= $project->title()->html() ?><sup class="c-greylight" style="font-size: 0.875rem;font-weight: normal; margin-left: 0.5rem;"><small><?= $project->year() ?></small></sup></h3>
                <p><?= $project->description()->html() ?></p>
              </div>
            </a>
          </div>
        <? endforeach ?>

      </div>
    </section>

    <section>
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1">

          <p style="margin: 4rem 0 1rem; font-size: 2rem;">chronology</p>

        </div>
      </div>
    </section>

    <section class="bg-bluedull u-pv10vh" style="color: rgba(255, 255, 255, 0.8);">

      <? foreach ($projects as $project) : ?>
        <div class="row">
          <div class="col-xs-12 col-sm-2 col-sm-offset-1">
            <?= ecco((!isset($prev) || $prev->year()->value() !== $project->year()->value()), '<big>' . $project->year() . '</big>') ?>
          </div>
          <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1">
              <a href="<?= $project->url() ?>" class="u-block <? ecco($project->isVisible(), 'c-white', 'c-grey') ?>" style="line-height: 1rem; margin-bottom: 0.75rem;">
                <?= $project->title() ?><br>
                <small style="color: rgba(255, 255, 255, <? ecco($project->isVisible(), '0.5', '0.25') ?>);"><?= $project->description() ?></small>
              </a>
          </div>
          <div class="col-xs-12 col-xs-offset-3 col-sm-10 col-sm-offset-1 col-md-3 u-hide">
              <small><? snippet('project_tags', array('page' => $project) ) ?></small>
          </div>
        </div>
      <? $prev = $project; endforeach; ?>


      <div class="row u-mt2">
        <div class="col-xs-12 col-sm-2 col-sm-offset-1">
          <big>before that</big>
        </div>
        <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1">
          <a href="<?= u('/architecture') ?>" class="c-white">architecture and urban design &rarr;</a>
      </div>

    </section>

    <section id="projects" class="u-hide">

      <div class="row">
        <div class="col-xs-12">

          <h3 class="u-mb20 u-ml10">
            projects

            <span class="filter-container">
              —
              <select id="project_filter" data-base-url="<?= $page->url(); ?>">
                <?
                // build a list of existing tags in subpages
                $tag_list = $page->children()->visible()->pluck('tags', ',', true);
                array_unshift($tag_list, 'all');
                foreach($tag_list as $tag):
                  $selected = ($tag == urldecode(param('tag'))) ? ' selected' : '';
                  echo '<option' . $selected . '>' . $tag . '</option>';
                endforeach;
                ?>
              </select>
            </span>
            <script>
              $('#project_filter').change(function() {
                $urlpath = ($(this).val() === 'all') ? '' : '/tag:' + $(this).val();
                window.location.href = $(this).attr('data-base-url') + $urlpath + '#projects';
              });
            </script>

            <? if($tag = param('tag')) : ?>
            <a href="<?= $page->url() . '#projects' ?>" class="u-ml10">
              <i class="ion ion-android-close"></i>
            </a>
            <? endif; ?>

          </h3>


        </div>
      </div>

      <?= js('https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js'); ?>

      <div class="row row-nopadding project-container">
        <? 
        $projects = $page->children()->visible()->sortBy('year', 'desc');
        if($tag = param('tag')) {
          $projects = $projects->filterBy('tags', urldecode($tag), ',');
        }
        foreach($projects as $project): ?>
        <div class="col-xs-12 col-sm-6 project">
          <a href="<?= $project->url() ?>" title="<?= $project->title()->html() ?>" class="u-inlineblock">

            <div class="row row-internalpadding">
              <div class="col-xs-5">
                <? if ($img = $project->featuredimage()): ?>
                  <?
                  $style = 'background-image: url(\'';
                  $style .= thumb($project->image($img), array('width' => 600, 'quality' => 80))->url();
                  $style .= '\');';
                  // $style .= (strlen($project->featuredcolour()) > 0) ? ' background-color: #' . $project->featuredcolour() . ';' : '';
                  ?>
                  <div class="project-teaser" style="<?= $style ?>"></div>
                <? endif ?>
              </div>
              <div class="col-xs-7 u-pv10">

                <h4 class="project__title u-mb10"><?= $project->title()->html() ?></h4>
                <p class="project__description meta"><?= $project->description() ?></p>

                <object><p class="meta project__tags">
                  <small><? snippet('project_tags', array('page' => $project) ) ?></small>
                </p></object>

              </div>
            </div>
            <div class="btn btn-tertiary project__btn">view project</div>
          </a>
        </div>
        <? endforeach; ?>
      </div>

    </section>

  </main>

<? snippet('footer') ?>