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

  <section class="section--bg2" style="background-color: #ececec; background-image: url('<?= url('assets/images/well-what-did-you-expect.jpg'); ?>'); min-height: 40vh;">

    <div class="row">
      <div class="col-xs-12 col-md-5 col-md-offset-1" style="padding: 15vh 0;">

        <div class="line"></div>

        <blockquote>...<strong>L Daniel Swakman</strong> is the 'full stack' designer running it. He also likes working at startups that want to be design-driven.</blockquote>

        <div class="u-mv2">
          <a href="<?= $pages->find('articles')->url() ?>" class="button button-dark u-mr1 u-mb1">read more</a>
          <a href="<?= $pages->find('projects')->url() ?>" class="button button-dark button-outline u-mb1">cv</a>
        </div>

      </div>
    </div>
  </section>

  <section class="u-pv5vh">
    <div class="row">
      <div class="col-xs-12 col-sm-11 col-sm-offset-1">

        <h5 class="u-mb1">STREAM OF WORDS</h5>

        <? snippet('twitterfeed'); ?>

      </div>
    </div>
  </section>

  <section class="bg-white u-pv5vh">
    <div class="row">
      <div class="col-xs-12 col-sm-11 col-sm-offset-1">

        <h5 class="u-mb1">STREAM OF IMAGES</h5>

        [instagram]

      </div>
    </div>
  </section>

  <section class="section--bg2" style="background-color: #34495e; background-image: url('<?= url('assets/images/sitting-w-habita.jpg'); ?>'); background-size: cover; color: rgba(255, 255, 255, 0.9);">

    <div class="row">
      <div class="col-xs-12 col-md-5 col-md-offset-1" style="padding: 15vh 0;">

        <div class="line"></div>

        <blockquote>Collaborate?</blockquote>

        <p>I'm currently available for work (while stocks last); I'm always excited to hear new projects, and see how we can collaborate in them. Drop me a line:</p>

        <div class="u-mv2">
          <a href="<?= $pages->find('projects')->url() ?>" class="button u-mb1">Say hello</a>
        </div>

      </div>
    </div>
  </section>

</main>

<?php snippet('footer') ?>