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
      $bg = ' style="background-image: url(' . $image_url . '); min-height: 500px;"';
    endif;
    ?>

    <section<?php echo $bg ?>>

      <div class="row u-pv40">

        <div class="col-md-4">

          <?php if ($key == 0) : ?>
            <h2 class="u-mb40"><?php echo $page->title()->kirbytext() ?></h2>
          <?php endif; ?>

          <p><?php echo kirbytext($section['textcolumn']) ?></p>

          <?php if ($key == 0) : ?>
            <p class="meta u-mt40"><i class="ion ion-android-calendar u-mr10"></i> <?php echo $page->year()->html() ?></p>
            <p class="meta">
              <i class="ion ion-pricetags u-mr10"></i>
              <?php
              $tags = explode(',', $page->tags()->html());
              foreach ($tags as $key => $tag) :
              echo '<a href="/work/tag:' . $tag . '">' . $tag . '</a>';
              echo (($key+1) < count($tags)) ? ', ' : '';
              endforeach;
              ?>
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
          <?php endif; ?>

        </div>

        <?php if ($section['fullscreen'] != '1') : ?>
        <div class="col-md-8">
          <?php echo kirbytext($section['imagecolumn']) ?>
        </div>
        <?php endif; ?>

      </div>

    </section>

    <?php endforeach; ?>

    <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
      <?php endif ?>
    </nav>

  </main>

<?php snippet('footer') ?>