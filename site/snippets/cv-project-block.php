<?php if (isset($url) && strlen($url) > 0) : ?>

    <a href="<?= $url ?>" class="project-item project-item--linked">
        <h4><?= $project->title() ?> <?php snippet('svg/chevron-down') ?></h4>
        <?php if($image = $project->image()->toFile()): ?>
        <figure class="project-image"><img src="<?= $image->url() ?>" alt="<?= $project->title() ?>" /></figure>
        <?php endif ?>
    </a>

<?php else : ?>

    <div class="project-item">
        <h4><?= $project->title() ?></h4>
        <?php if($image = $project->image()->toFile()): ?>
        <figure class="project-image"><img src="<?= $image->url() ?>" alt="<?= $project->title() ?>" /></figure>
        <?php endif ?>
    </div>

<?php endif ?>
