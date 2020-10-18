<?php snippet('header') ?>

<main>

  <?php if($page->cover_image()->isNotEmpty()) : ?>
    <section style="min-height: 60vh;">
      <div class="section__bg-image" style="background-image: url('<?= $page->image($page->cover_image())->url() ?>');"></div>
    </section>
  <?php endif ?>

  <section class="article u-pv10vh">
    <div class="row">

      <?php snippet('article/col-side') ?>

        <a href="<?= $page->parent()->url() ?>" ?><?= strtoupper($page->parent()->title()->html()) ?></a>

      </div>
      <?php snippet('article/col-main') ?>

        <h4 class="c-greylight u-mb1">CASE STUDY</h4>
        <h1 class="u-mb1 "><?= $page->title()->html() ?></h1>

        <div class="meta u-mb2 c-greylight"><date><?= $page->date('d M Y') ?></date> — <?php snippet('reading-time', ['text' => $page->text()]) ?></div>

        <?= $page->text()->kirbytext() ?>
        
      </div>
    </div>
  </section>

</main>

<?php snippet('footer') ?>