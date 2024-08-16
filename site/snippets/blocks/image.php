<?php if ($image = $block->image()->toFile()): ?>

    <?php if ($image->type() == 'video') : ?>

        <video autoplay loop muted playsinline style="width: 100%; max-width: 100%">
            <source src="<?= $image->url() ?>" type="video/mp4">
        </video>

    <?php else : ?>

        <figure style="width: 100%; max-width: 100%">
            <img src="<?= $image->url() ?>" alt=""  style="width: 100%; max-width: 100%" />
        </figure>

    <?php endif ?>

<?php endif ?>
