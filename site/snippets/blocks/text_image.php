<div class="row">
    <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1 block__text">
        <?= $block->text()->kt() ?>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1 block__image">

        <?php if ($images = $block->image()->toFiles()): ?>
            <?php foreach($images as $image): ?>
                <figure>
                    <img src="<?= $image->url() ?>" alt="" />
                </figure>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>
