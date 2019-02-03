<? snippet('header') ?>

  <main>

    <? foreach($page->sections()->toStructure() as $key => $section): ?>

      <?
      $bgLocation = 'full';
      if($section->bg_image_pos()->isNotEmpty() && $section->bg_image_pos() == 'left') { $bgLocation = 'left'; }
      if($section->bg_image_pos()->isNotEmpty() && $section->bg_image_pos() == 'right') { $bgLocation = 'right'; }

      $bg = 'style="padding-top: 15vh; padding-bottom: 15vh; ';

      if ($section->bg_image()->isNotEmpty() && $bgLocation == 'full') :
        $image = $page->image($section->bg_image());
        $image_url = $image->url();
        $ratio = $image->dimensions()->height() / $image->dimensions()->width() * 100;
        $bg .= 'min-height: ';
        $bg .= ($key < 1 || $section->col_1()->isNotEmpty() ) ? '60vh;' : '40vh; padding-top: 0 !important; padding-bottom:' .  $ratio . '% !important;';
        $bg .= ' background-image: url(' . $image_url . '); background-repeat: no-repeat;';
        $bg .= ($page->featuredcolour()->isNotEmpty()) ? ' background-color: #' . $page->featuredcolour() . ';' : '';
      endif;

      if ($section->bg_colour()->isNotEmpty()) :
        $colour = (strpos($section->bg_colour()->value(), '#') !== false) ? $section->bg_colour() : '#' . $section->bg_colour();
        $bg .= 'background-color: ' . $colour . ';"';
      endif;

      $bg .= '"';
      ?>

      <section <?= 'id="part' . ($key+1) . '"' . $bg ?> class="section-bg <?= $section->classes() ?>">

        <div class="row">

          <? if($section->num_cols()->isNotEmpty() && $section->num_cols() == '1') : ?>  
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 u-pv40">
              <?= $section->col_1()->kirbytext() ?>
              <?= $section->col_2()->kirbytext() ?>
            </div>
          <? else : ?>  
            <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1 u-pv40" <?= ($bgLocation === 'left') ? $bg : '' ?>>
              <?= $section->col_1()->kirbytext() ?>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-5 col-md-offset-1 u-pv40" <?= ($bgLocation === 'right') ? $bg : '' ?>>
              <?= $section->col_2()->kirbytext() ?>
            </div>
          <? endif ?>

        </div>

      </section>

      <? if ($key == 0) : ?>
        <!-- NEW project info section -->
        <section>
          <div class="row u-pv3 u-ph05">
            <div class="col-xs-12 col-sm-7 col-md-5 col-md-offset-1">
              <h1><?= $page->title()->html() ?><sup class="c-grey" style="font-size: 0.875rem;font-weight: normal; margin-left: 0.5rem;"><small><?= $page->year() ?></small></sup></h1>
              <blockquote style="margin-top: 0;"><p><?= $page->description() ?></p></blockquote>
            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1 u-mt2">
              <?php
              foreach (explode(',', $page->tags()->html()) as $tag) :
                echo '<div><a class="c-grey" href="' . $page->parent()->url() . '/tag:' . $tag . '">' . $tag . '</a></div>';
              endforeach;
              ?>
            </div>
            <div class="col-xs-12 col-md-10 col-md-offset-1">
              <? if($page->projecturl()->isNotEmpty()): ?>
                <a href="<?= $page->projecturl() ?>" target="_blank" class="button button--outline u-mt2">
                  see the project live
                  <svg style="float: right; width: 0.75rem; margin: 0.5rem 0 0 0.5rem;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
                    <style type="text/css">
                      .st0{fill:currentColor;}
                    </style>
                    <polygon class="st0" points="0,0 0,1 10.3,1 0,11.3 0.7,12 11,1.7 11,12 12,12 12,0 "/>
                  </svg>

                </a>
              <? endif ?>
            </div>
          </div>
        </section>
      <? endif ?>

      <? if ($page->sections()->toStructure()->count() == 0) : ?>
      <section>
        <div class="row u-pv40">
          <div class="col-md-4">
            <? snippet('project_info', array('page' => $page, 'key' => 1 )); ?>
          </div>
          <div class="col-md-8">
            <img src="<?= $page->url() . '/' . $page->featuredimage(); ?>" alt="" />
          </div>
        </div>
      </section>
      <? endif; ?>

    <? endforeach; ?>

    <?
    // if($next = $page->nextVisible()):
    if (false) :
    ?>
    <a href="<?= $next->url() ?>">
      <section class="cta">
        <div class="row">
          <div class="col-md-4 col-md-offset-2 u-alignright">
              <p><big>
                <em>next up:</em><br />
                <?= (strlen($next->description()) > 0) ? $next->description() : '<h3>' . $next->title() . '</h3>' ?>
              </big></p>
          </div>
          <div class="col-md-2">
            <? if(strlen($next->featuredimage()) > 0): ?>
              <img src="<?= $next->url() . '/' . $next->featuredimage() ?>" alt="<?= $next->title() ?>" />
            <? endif; ?>
          </div>
          <div class="col-md-3 col-md-offset-1">
            <i class="ion ion-ios-arrow-thin-right ion-3x u-mt30"></i>
          </div>
        </div>
      </section>
    </a>
    <? endif; ?>

    <? if(true) : ?>
    <section class="bg-greylighter u-pv2">
      <div>
        <p style="margin: 4rem 0 1rem; font-size: 2rem;">related projects</p>
      </div>

      <?
      $related = $site->find('projects')->children()->shuffle()->limit(3);
      ?>
      <!-- Project Cards -->
      <div class="card-container owl-carousel u-mt1">
        <? foreach ($related as $project) : ?>

          <a href="<?php echo $project->url() ?>" class="card">
            <? if($image = $project->featuredimage()->toFile()) : ?>
              <figure>
                <img src="<?= $image->thumb(['width' => 800])->url() ?>" alt="">
              </figure>
            <? endif ?>
          </a>

        <? endforeach ?>

      </div>

      <a href="<?= $page->parent()->url() ?>">
          <div class="row cta u-pv1 u-mt2">
              <div class="col-md-4">
                <i class="ion ion-ios-arrow-thin-left ion-2x u-floatleft u-mr10"></i>
                <span class="u-inlineblock u-floatleft u-pt5">
                  <? if($next = $page->nextVisible()) { echo 'or, '; } ?>
                  get back to work
                </span>
              </div>
          </div>
      </a>

    </section>
    <? endif ?>

  </main>

<? snippet('footer') ?>