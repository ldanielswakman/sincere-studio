<?php if ($image = $block->image()->toFile()): ?>
    <figure>
        <img src="<?= $image->url() ?>" alt="" />
    </figure>
<?php endif ?>
