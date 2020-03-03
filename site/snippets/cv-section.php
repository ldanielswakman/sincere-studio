<? if (isset($title)) : ?>
<h3 style="margin: 2rem 0 1rem; font-size: 2rem;"><?= strtolower($title) ?></h3>
<? endif ?>

<? if (isset($section) && $section->isNotEmpty()) : ?>
<div class="card-container owl-carousel u-mt1">

  <? foreach ($section->toStructure() as $item) : ?>

    <a href="<? e($item->url()->isNotEmpty(), $item->url(), 'javascript:void(0)') ?>" class="card card--words" style="padding-top: 1rem;"<? e(strpos($item->url()->value(), 'http') !== false, ' target="_blank"','') ?>>

      <? if($image = $item->img()->toFile()): ?>
        <img src="<?= $image->resize(null, 40)->url() ?>" alt="<?= $item->title() ?>" style="width: auto; margin: 0.25rem 0.25rem;" />
      <? endif ?>

      <p style="font-size: 1rem;"><?= $item->period() ?></p>
      <p style="margin: 0.25rem 0 0.5rem;" class="c-bluedull"><?= $item->title() ?></p>
      <p style="margin-top: 0.25rem; font-size: 1rem;" class="c-bluedull u-op"><?= $item->text() ?></p>
    </a>

  <? endforeach ?>

</div>
<? endif ?>
