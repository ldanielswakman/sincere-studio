<?php snippet('header') ?>

<main>

  <section class="bg-white" style="padding-top: 1.5rem; padding-bottom: 1.5rem;">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1">

        <h1>articles</h1>

      </div>
    </div>
  </section>

  <section>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-1 u-pt10vh">

        <div class="line" style="margin-left: 2rem;"></div>

        <? foreach ($page->children()->visible() as $article) : ?>
          <a href="<?= $article->url() ?>" class="list__article">
            <h3><?= $article->title()->html() ?></h3>

            <div class="meta"><date><?= $article->date('d M Y') ?></date> — 9 min read</div>

            <p><?= $article->text()->kirbytext() ?></p>

            <button class="button button-outline">read</button>
          </a>
        <? endforeach ?>

      </div>
    </div>
  </section>

</main>

<?php snippet('footer') ?>