<?php snippet('header') ?>

  <main>

    <?php foreach($page->sections()->toStructure() as $key => $section): ?>

      <?php
      $bgLocation = 'full';
      if($section->bg_image_pos()->isNotEmpty() && $section->bg_image_pos() == 'left') { $bgLocation = 'left'; }
      if($section->bg_image_pos()->isNotEmpty() && $section->bg_image_pos() == 'right') { $bgLocation = 'right'; }

      $bg = 'style="padding-top: 15vh; padding-bottom: 15vh; ';

      if ($section->bg_image()->isNotEmpty() && $bgLocation == 'full') :
        $image = $section->bg_image()->toFile();
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

          <?php if($section->num_cols() == '1' || $section->num_cols() == 'false') : ?>  
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 u-pv40">
              <?= $section->col_1()->kirbytext() ?>
              <?= $section->col_2()->kirbytext() ?>
            </div>
          <?php else : ?>  
            <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1 u-pv40" <?= ($bgLocation === 'left') ? $bg : '' ?>>
              <?= $section->col_1()->kirbytext() ?>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-5 col-md-offset-1 u-pv40" <?= ($bgLocation === 'right') ? $bg : '' ?>>
              <?= $section->col_2()->kirbytext() ?>
            </div>
          <?php endif ?>

        </div>

      </section>

      <?php if ($key == 0) : ?>
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
              <?php if($page->projecturl()->isNotEmpty()): ?>
                <a href="<?= $page->projecturl() ?>" target="_blank" class="button button--outline u-mt2">
                  see the project live
                  <svg style="float: right; width: 0.75rem; margin: 0.5rem 0 0 0.5rem;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
                    <style type="text/css">
                      .st0{fill:currentColor;}
                    </style>
                    <polygon class="st0" points="0,0 0,1 10.3,1 0,11.3 0.7,12 11,1.7 11,12 12,12 12,0 "/>
                  </svg>

                </a>
              <?php endif ?>
            </div>
          </div>
        </section>
      <?php endif ?>

      <?php if ($page->sections()->toStructure()->count() == 0) : ?>
      <section>
        <div class="row u-pv40">
          <div class="col-md-4">
            <?php snippet('project_info', array('page' => $page, 'key' => 1 )); ?>
          </div>
          <div class="col-md-8">
            <img src="<?= $page->url() . '/' . $page->featuredimage(); ?>" alt="" />
          </div>
        </div>
      </section>
      <?php endif ?>

    <?php endforeach ?>


    <?php
    if($next = $page->nextListed()):
    ?>
    <a href="<?= $next->url() ?>">
      <section class="section--next-project">
        <div class="section__header">
          <h4>next up</h4>
        </div>

        <div class="row" style="align-items: center;">
          <div class="col-xs-6 col-md-2">
            <?php if($image = $next->featuredimage()->toFile(0)): ?>
              <figure>
                <img src="<?= $image->thumb(['width' => 800])->url() ?>" alt="<?= $next->title() ?>" />
              </figure>
            <?php endif; ?>
          </div>
          <div class="col-xs-6 col-md-2 last-md u-alignright" style="font-size: 3rem;">
            &rarr;
          </div>
          <div class="col-xs-12 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-2">
              <p><big>
                <?= (strlen($next->description()) > 0) ? $next->description() : '<h3>' . $next->title() . '</h3>' ?>
              </big></p>
          </div>
        </div>
      </section>
    </a>
    <?php endif; ?>

    <?php snippet('project-related') ?>

  </main>

<?php snippet('footer') ?>