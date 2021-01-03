<?php if ($block->full()->toBool() === true) : ?>
    <?= $block->text()->kt() ?>
<?php else : ?>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 u-pv40">
            <?= $block->text()->kt() ?>
        </div>
    </div>
<?php endif ?>
