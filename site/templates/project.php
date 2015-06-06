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
            <h2 class="u-mb40"><?php echo $page->title()->kirbytext() ?></h2>

            <big><em><?php echo $page->description()->kirbytext() ?></em></big>

            <p class="meta u-mt40"><i class="ion ion-android-calendar u-mr10"></i> <?php echo $page->year()->html() ?></p>
            <p class="meta">
              <i class="ion ion-pricetags u-mr10"></i>
              <?php snippet('project_tags', array('page' => $page) ); ?>
            </p>
            <?php 
            if(strlen($page->projecturl()->kirbytext()) > 0) :
              // removes http and trailing slashes
              $needle = '://';
              $cleanurl = rtrim(substr(strstr($page->projecturl()->html(), $needle), strlen($needle)), '/');
            ?>
              <p class="meta">
                <i class="ion ion-forward u-mr10"></i>
                <a href="<?php echo $page->projecturl()->html() ?>" target="_blank"><?php echo $cleanurl ?></a>
              </p>
            <?php endif; ?>

            <div class="u-aligncenter u-mt40">
              <a href="<?php echo '#part' . ($key) ?>" class="btn btn-outline btn-circle"><i class="ion ion-chevron-down"></i></a>
            </div>

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

    <?php if($next = $page->nextVisible()): ?>
    <a href="<?php echo $next->url() ?>">
      <section class="cta">
        <div class="row">
          <div class="col-md-5 col-md-offset-1 u-alignright">
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

  </main>

<?php snippet('footer') ?>