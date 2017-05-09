<?php snippet('header') ?>

  <main>

    <section class="u-pt30vh u-pb10vh">

      <?
      $bg_style = 'background-color: ' . $page->intro_bg_color() . ';';
      if($image = $page->intro_bg_image()) {
        $bg_style .= " background-image: url('" . thumb($page->image($image), ['width' => 1200])->url() . "');";
      }
      ?>
      <div class="section__bg-image section__bg-homeintro" style="<?= $bg_style ?>"></div>

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1">

          <?= $page->text()->kirbytext() ?>

          <h5 class="u-mt2">CURRENTLY WORKING ON</h5>

          <div>
            <? $items = $page->current()->toStructure() ?>
            <? foreach($items as $key => $item): ?><a href="<?= $item->text()->url() ?>" target="_blank"><?= $item->text()->html() ?></a><? if($key < $items->count()-1) { ecco(($items->count()-2 == $key), ' &amp; ', ', '); } ?><? endforeach; ?>.
          </div>

        </div>
      </div>

      </div>

    </section>

    <section class="bg-white u-pv5vh">
      <div class="row">
        <div class="col-xs-12 col-sm-11 col-sm-offset-1">

          <h5>RECENT WORK</h5>

          <? snippet('featured'); ?>

          <div class="u-mb2 u-mt1">
            <a href="<?= $pages->find('articles')->url() ?>" class="button u-mr1 u-mb1">case studies</a>
            <a href="<?= $pages->find('projects')->url() ?>" class="button button-outline u-mb1">all projects</a>
          </div>

        </div>
      </div>
    </section>

    <?php snippet('twitterfeed'); ?>

  </main>

<?php snippet('footer') ?>