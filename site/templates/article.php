<?php snippet('header') ?>

<main>

  <? if($page->cover_image()->isNotEmpty()) : ?>
    <section style="min-height: 60vh;">
      <div class="section__bg-image" style="background-image: url('<?= $page->image($page->cover_image())->url() ?>');"></div>
    </section>
  <? endif ?>

  <section class="article">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-2 col-md-offset-1 u-pt10vh">

        <a href="<?= $page->parent()->url() ?>" ?>&larr; <?= strtoupper($page->parent()->title()->html()) ?></a>

      </div>
      <div class="col-xs-12 col-md-7 u-pv10vh">

        <h4 class="c-greylight u-mb1">CASE STUDY</h4>
        <h1 class="u-mb1 "><?= $page->title()->html() ?></h1>

        <div class="meta u-mb2 c-greylight"><date><?= $page->date('d M Y') ?></date> — <? snippet('reading-time', ['text' => $page->text()]) ?></div>

        <?= $page->text()->kirbytext() ?>
        
      </div>
    </div>
  </section>

</main>

<?php snippet('footer') ?>