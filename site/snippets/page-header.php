<section class="bg-white" style="padding-top: 1.5rem;">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-1">

      <h1 class="u-mb15"><?= strtolower($page->title()->html()) ?></h1>

      <? if (isset($subtitle) && strlen($subtitle) > 0) : ?>
      <h3 style="margin: 3rem 0 1rem; font-size: 2rem;"><?= $subtitle ?></h3>
      <? endif ?>

    </div>
  </div>
</section>
