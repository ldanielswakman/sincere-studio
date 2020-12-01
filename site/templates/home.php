<?php snippet('header') ?>

<main>

  <?php foreach ($page->sections()->toBuilderBlocks() as $key => $section): ?>
    <section id="<?= str::slug($section->title()); ?>" class="section--<?= $section->_key()->html() ?> <?= $section->classes()->html() ?>">

      <?php
      $bg_style = 'background-color: ' . $section->bg_color() . ';';
      if($image = $section->bg_image()->toFile()) { 
        $bg_style .= " background-image: url('" . $image->url() . "');"; 
      }
      ?>
      <div class="section__bg-image" style="<?= $bg_style ?>"></div>

      <?php if($section->_key() == 'text') : ?>

        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-5 col-md-offset-1">
            <?= $section->text()->kirbytext() ?>
          </div>
        </div>

      <?php elseif($section->_key() == 'hero') : ?>

        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-5 col-md-offset-1">
            <?= $section->text()->kirbytext() ?>

            <div class="u-mt2">
                <a href="javascript:openContactForm()" class="button u-mr1">see how</a>
                <a href="#read-on" class="button button--outline u-op70">go on...</a>
              </div>

              <h5 class="u-mt2">CURRENTLY WORKING ON</h5>

              <p>
                <?php
                $items = $section->current()->toStructure();
                foreach($items as $count => $item):
                  e($item->link()->isNotEmpty(), '<a href="' . $item->link() . '" target="_blank">');
                  echo $item->text()->html();
                  e($item->link()->isNotEmpty(), '</a>');
                  if($count < $items->count()-1) {
                    e(($items->count()-2 == $count), ' &amp; ', ', ');
                  }
                endforeach;
                ?>.
              </p>
          </div>
        </div>

      <?php elseif($section->_key() == 'recent_work') : ?>

        <?php snippet('featured', ['recent' => $section->recent()]) ?>

      <?php elseif($section->_key() == 'stream_of_words') : ?>

        <div class="row">
          <div class="col-xs-12 col-sm-11 col-sm-offset-1">

            <h5 class="u-mb15">
              <a href="//twitter.com/ldanielswakman" target="_blank" class="a--icon a--twitter u-floatright u-op70">
                <?php snippet('svg/twitter-icon') ?>
              </a>
              <?= $section->title()->html() ?>
            </h5>

            <div id="twitterfeed"></div>

          </div>
        </div>

      <?php elseif($section->_key() == 'stream_of_images') : ?>

            <div class="row">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">

                <h5 class="u-mb15">
                  <a href="//dribbble.com/ldanielswakman" target="_blank" class="a--icon-lg a--twitter u-floatright" style="margin-top: -0.25rem;">
                    <?php snippet('svg/dribbble-icon') ?>
                  </a>
                  <?= $section->title()->html() ?>
                </h5>

                <div class="card-container u-mt1" id="dribbblefeed">
                </div>

              </div>
            </div>

      <?php endif ?>

    </section>
  <?php endforeach ?>

</main>

<?php snippet('footer') ?>
