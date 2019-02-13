<?php snippet('header') ?>

<main>

  <? foreach ($page->sections()->toStructure() as $key => $section): ?>
    <section id="<?= str::slug($section->title()); ?>" class="section--<?= $section->type()->html() ?> <?= $section->classes()->html() ?>">

      <?
      $bg_style = 'background-color: ' . $section->bg_color() . ';';
      if($section->bg_image()->isNotEmpty()) { 
        $bg_style .= " background-image: url('" . $page->image($section->bg_image())->url() . "');"; 
      }
      ?>
      <div class="section__bg-image" style="<?= $bg_style ?>"></div>

      <? if($section->type() == 'text') : ?>

        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-5 col-md-offset-1">

            <?= $section->text()->kirbytext() ?>

            <? if ($key == 0) : ?>

              <div class="u-mt2">
                <a href="javascript:openContactForm()" class="button button--white u-mr1">say hi!</a>
                <a href="#read-on" class="button button--outline button--white u-op70">go on...</a>
              </div>

              <h5 class="u-mt2">CURRENTLY WORKING ON</h5>

              <p>
                <?
                $items = $page->current()->toStructure();
                foreach($items as $key => $item):
                  e($item->link()->isNotEmpty(), '<a href="' . $item->link() . '" target="_blank">');
                  echo $item->text()->html();
                  e($item->link()->isNotEmpty(), '</a>');
                  if($key < $items->count()-1) { e(($items->count()-2 == $key), ' &amp; ', ', '); }
                endforeach;
                ?>.
              </p>

            <? endif ?>

          <? elseif($section->type() == 'recent_work') : ?>

            <div class="row">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">

                <h5><?= $section->title()->html() ?></h5>

                <? snippet('featured'); ?>

                <div class="u-mb2 u-mt1">
                  <!-- See -->
                  <a href="<?= $pages->find('projects')->url() ?>" class="button u-mb1 u-mr1">all projects</a>
                  <!-- or read  -->
                  <a href="<?= $pages->find('articles')->url() ?>" class="button button--outline u-mb1">case studies</a>
                </div>

              </div>
            </div>

          <? elseif($section->type() == 'stream_of_words') : ?>

            <div class="row">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">

                <h5 class="u-mb15">
                  <a href="//twitter.com/ldanielswakman" target="_blank" class="a--icon a--twitter u-floatright u-op70">
                    <? snippet('svg/twitter-icon') ?>
                  </a>
                  <?= $section->title()->html() ?>
                </h5>

                <div id="twitterfeed"></div>

              </div>
            </div>

          <? elseif($section->type() == 'stream_of_images') : ?>

            <div class="row">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">

                <h5 class="u-mb15">
                  <a href="//dribbble.com/ldanielswakman" target="_blank" class="a--icon-lg a--twitter u-floatright" style="margin-top: -0.25rem;">
                    <? snippet('svg/dribbble-icon') ?>
                  </a>
                  <?= $section->title()->html() ?>
                </h5>

                <div class="card-container u-mt1" id="dribbblefeed">
                </div>

              </div>
            </div>

          <? endif ?>

        </div>
      </div>

    </section>
  <? endforeach ?>

</main>

<?php snippet('footer') ?>