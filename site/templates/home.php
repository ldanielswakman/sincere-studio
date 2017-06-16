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

              <h5 class="u-mt2">CURRENTLY WORKING ON</h5>

              <p>
                <?
                $items = $page->current()->toStructure();
                foreach($items as $key => $item):
                  ecco($item->link()->isNotEmpty(), '<a href="' . $item->link() . '" target="_blank">');
                  echo $item->text()->html();
                  ecco($item->link()->isNotEmpty(), '</a>');
                  if($key < $items->count()-1) { ecco(($items->count()-2 == $key), ' &amp; ', ', '); }
                endforeach;
                ?>.
              </p>

              <div class="u-mt2">
                <a href="javascript:openContactForm()" class="button button--white u-mr1">Say hi!</a>
                <a href="#read-on" class="button button--subtle">Go on...</a>
              </div>

            <? endif ?>

          <? elseif($section->type() == 'recent_work') : ?>

            <div class="row">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">

                <h5>RECENT WORK</h5>

                <? snippet('featured'); ?>

                <div class="u-mb2 u-mt1">
                  <a href="<?= $pages->find('articles')->url() ?>" class="button u-mr1 u-mb1">case studies</a>
                  <a href="<?= $pages->find('projects')->url() ?>" class="button button--outline u-mb1">all projects</a>
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
                  STREAM OF WORDS
                </h5>

                <? snippet('twitterfeed'); ?>

              </div>
            </div>

          <? elseif($section->type() == 'stream_of_images') : ?>

            <div class="row">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">

                <h5 class="u-mb15">
                  <a href="//dribbble.com/ldanielswakman" target="_blank" class="a--icon-lg a--twitter u-floatright" style="margin-top: -0.25rem;">
                    <? snippet('svg/dribbble-icon') ?>
                  </a>
                  STREAM OF IMAGES
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