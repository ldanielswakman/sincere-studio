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
      $bg = ' class="slide" style="background-image: url(' . $image_url . ');';
      $bg .= (strlen($page->featuredcolour()) > 0) ? ' background-color: #' . $page->featuredcolour() . ';' : '';
      $bg .= '"';
    endif;
    ?>

    <section<?= ' id="part' . ($key+1) . '" ' . $bg ?>>

      <div class="row u-pv40">

        <div class="col-md-4">

          <? if ($key == 0) : ?>
            <? snippet('project_info', array('page' => $page, 'key' => $key )); ?>
          <? endif; ?>

          <p><?= kirbytext($section['textcolumn']) ?></p>

        </div>

        <? 
        // show right column normally if not fullscreen
        if (!isset($section['fullscreen']) or $section['fullscreen'] != '1') : 
        ?>
        <div class="col-md-8">
          <?= kirbytext($section['imagecolumn']) ?>
        </div>
        <? endif; ?>

      </div>

    </section>

    <? endforeach; ?>

    <? if (count(yaml($page->sections())) == 0) : ?>
    <section>
      <div class="row u-pv40">
        <div class="col-md-4">
          <? snippet('project_info', array('page' => $page, 'key' => $key )); ?>
        </div>
        <div class="col-md-8">
          <img src="<?= $page->url() . '/' . $page->featuredimage(); ?>" alt="" />
        </div>
      </div>
    </section>
    <? endif; ?>

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

    <section class="bg-greylighter u-mt2 u-pv2">
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