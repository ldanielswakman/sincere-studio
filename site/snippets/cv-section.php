<?php if (isset($title)) : ?>
<h3 style="margin: 2rem 0 1rem; font-size: 2rem;"><?= strtolower($title) ?></h3>
<?php endif ?>

<?php if (isset($section) && $section->isNotEmpty()) : ?>
<div class="card-container owl-carousel u-mt1">

  <?php foreach ($section->toStructure() as $item) : ?>

    <a href="<?php e($item->url()->isNotEmpty(), $item->url(), 'javascript:void(0)') ?>" class="card card--words" style="padding-top: 1rem;"<?php e(strpos($item->url()->value(), 'http') !== false, ' target="_blank"','') ?>>

      <?php if($image = $item->img()->toFile()): ?>
        <img src="<?= $image->resize(null, 40)->url() ?>" alt="<?= $item->title() ?>" style="width: auto; margin: 0.25rem 0.25rem;" />
      <?php endif ?>

      <p style="font-size: 1rem;"><?= $item->period() ?></p>
      <p style="margin: 0.25rem 0 0.5rem;" class="c-bluedull"><?= $item->title() ?></p>
      <p style="margin-top: 0.25rem; font-size: 1rem;" class="c-bluedull u-op"><?= $item->text() ?></p>
    </a>

  <?php endforeach ?>

</div>
<?php endif ?>
