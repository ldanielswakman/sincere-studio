<?php if ($image = $block->image()->toFile()): ?>

    <?php if ($image->type() == 'video') : ?>

        <video autoplay loop muted playsinline style="max-width: 100%">
            <source src="<?= $image->url() ?>" type="video/mp4">
        </video>

    <?php else : ?>

        <figure>
            <img src="<?= $image->url() ?>" alt="" />
        </figure>

    <?php endif ?>

<?php endif ?>
