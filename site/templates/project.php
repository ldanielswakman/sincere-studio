<? snippet('header') ?>

  <main>

    <? foreach(yaml($page->sections()) as $key => $section): ?>

      <? 
      $bg = '';
      if (isset($section['fullscreen']) and $section['fullscreen'] == '1') : 
        // find url of (first) image and set as background image
        $imagecolumn = kirbytext($section['imagecolumn']);
        $needle = 'src="';
        $image_url = explode('" ',substr(strstr($imagecolumn, $needle), strlen($needle)))[0];
        $bg = ' style="min-height: 60vh; background-image: url(' . $image_url . ');';
        $bg .= ($page->featuredcolour()->isNotEmpty()) ? ' background-color: #' . $page->featuredcolour() . ';' : '';
        $bg .= '"';
      elseif (isset($section['bg_colour']) && strlen($section['bg_colour']) > 0) :
        $bg .= ' style="background-color: #' . $section['bg_colour'] . ';"';
      endif;
      ?>

      <section<?= ' id="part' . ($key+1) . '" ' . $bg ?> class="section-bg u-pv15vh">

        <div class="row u-pv40">

          <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1">

            <? if ($key == 0) : ?>
              <? // snippet('project_info', array('page' => $page, 'key' => $key )); ?>
            <? endif; ?>

            <p><?= kirbytext($section['textcolumn']) ?></p>

          </div>

          <? 
          // show right column normally if not fullscreen
          if (!isset($section['fullscreen']) or $section['fullscreen'] != '1') : 
          ?>
          <div class="col-xs-12 col-sm-7 col-md-5 col-md-offset-1">
            <?= kirbytext($section['imagecolumn']) ?>
          </div>
          <? endif; ?>

        </div>

      </section>

      <? if ($key == 0) : ?>
        <!-- NEW project info section -->
        <section>
          <div class="row u-pv3 u-ph05">
            <div class="col-xs-12 col-sm-7 col-md-4 col-md-offset-1">
              <h3 class="c-blue"><?= $page->title()->html() ?><sup class="c-grey" style="font-size: 0.875rem;font-weight: normal; margin-left: 0.5rem;"><small><?= $page->year() ?></small></sup></h3>
              <blockquote style="margin-top: 0;"><p><?= $page->description() ?></p></blockquote>
            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-2 u-mt2">
              <?php
              foreach (explode(',', $page->tags()->html()) as $tag) :
                echo '<div><a class="c-grey" href="' . $page->parent()->url() . '/tag:' . $tag . '#projects">' . $tag . '</a></div>';
              endforeach;
              ?>
            </div>
            <div class="col-xs-12 col-md-10 col-md-offset-1">
              <? if($page->projecturl()->isNotEmpty()): ?>
                <a href="<?= $page->projecturl() ?>" target="_blank" class="button button--outline u-mt2">
                  see the project live
                  <svg style="float: right; width: 0.75rem; margin: 0.4rem 0 0 0.5rem;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
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

      <? if (count(yaml($page ->sections())) == 0) : ?>
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

    <section class="bg-greylighter u-pv2">
      <div>
        <p style="margin: 4rem 0 1rem; font-size: 2rem;">related projects</p>
      </div>
      <!-- Project Cards -->
      <div class="card-container owl-carousel u-mt1">
        <? $options = array('minHits' => 3, 'startURI', '/' . $page->parent()->slug()) ?>
        <? foreach (relatedpages($options)->shuffle()->limit(3) as $project) : ?>

          <a href="<?php echo $project->url() ?>" class="card">
            <? if($image = $project->featuredimage()) : ?>
              <figure>
                <img src="<?= thumb($project->image($image), ['width' => 800])->url() ?>" alt="">
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

  </main>

<? snippet('footer') ?>