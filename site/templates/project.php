<?php snippet('header') ?>

  <main>

    <?php foreach(yaml($page->sections()) as $key => $section): ?>

    <?php 
    $bg = '';
    if ($section['fullscreen'] == '1') : 
      // find url of (first) image and set as background image
      $imagecolumn = kirbytext($section['imagecolumn']);
      $needle = 'src="';
      $image_url = explode('" ',substr(strstr($imagecolumn, $needle), strlen($needle)))[0];
      $bg = ' class="slide" style="background-image: url(' . $image_url . ');"';
    endif;
    ?>

    <section<?php echo ' id="part' . ($key+1) . '" ' . $bg ?>>

      <div class="row u-pv40">

        <div class="col-md-4">

          <?php if ($key == 0) : ?>
            <?php snippet('project_info', array('page' => $page )); ?>
          <?php endif; ?>

          <p><?php echo kirbytext($section['textcolumn']) ?></p>

        </div>

        <?php 
        // show right column normally if not fullscreen
        if ($section['fullscreen'] != '1') : 
        ?>
        <div class="col-md-8">
          <?php echo kirbytext($section['imagecolumn']) ?>
        </div>
        <?php endif; ?>

      </div>

    </section>

    <?php endforeach; ?>

    <?php if (count(yaml($page->sections())) == 0) : ?>
    <section>
      <div class="row u-pv40">
        <div class="col-md-4">
          <?php snippet('project_info', array('page' => $page )); ?>
        </div>
        <div class="col-md-8">
          <img src="<?php echo $page->url() . '/' . $page->featuredimage(); ?>" alt="" />
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if($next = $page->nextVisible()): ?>
    <a href="<?php echo $next->url() ?>">
      <section class="cta">
        <div class="row">
          <div class="col-md-4 col-md-offset-2 u-alignright">
              <p><big>
                <em>next up:</em><br />
                <?php echo (strlen($next->description()) > 0) ? $next->description() : '<h3>' . $next->title() . '</h3>' ?>
              </big></p>
          </div>
          <div class="col-md-2">
            <?php if(strlen($next->featuredimage()) > 0): ?>
              <img src="<?php echo $next->url() . '/' . $next->featuredimage() ?>" alt="<?php echo $next->title() ?>" />
            <?php endif; ?>
          </div>
          <div class="col-md-3 col-md-offset-1">
            <i class="ion ion-ios-arrow-thin-right ion-3x u-mt30"></i>
          </div>
        </div>
      </section>
    </a>
    <?php endif; ?>

    <a href="<?php echo $page->parent()->url() ?>">
      <section class="cta u-pv10">
        <div class="row">
            <div class="col-md-4">
              <i class="ion ion-ios-arrow-thin-left ion-2x u-floatleft u-mr10"></i>
              <span class="u-inlineblock u-floatleft u-pt5 c-greylight">
                <?php if($next = $page->nextVisible()) { echo 'or, '; } ?>
                get back to work
              </span>
            </div>
        </div>
      </section>
    </a>

  </main>

<?php snippet('footer') ?>