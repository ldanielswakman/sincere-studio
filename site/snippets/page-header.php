<section class="bg-white" style="padding-top: 1.5rem;">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

      <h1 class="u-mb15"><?= strtolower($page->title()->html()) ?></h1>

      <? if (isset($link_url) && isset($link_text)) : ?>
      <p class="u-floatright u-mt2"><a href="<?= $link_url ?>" target="_blank" class="c-grey"><?= $link_text ?></a></p>
      <? endif ?>

      <? if (isset($subtitle) && strlen($subtitle) > 0) : ?>
      <h3 class="u-mt3 u-mb1 u-text-2x c-bluedull"><?= strtolower($subtitle) ?></h3>
      <? endif ?>

    </div>
  </div>
</section>
