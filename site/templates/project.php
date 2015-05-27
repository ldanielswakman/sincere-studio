<?php snippet('header') ?>

  <main>

    <?php foreach(yaml($page->sections()) as $section): ?>

    <div class="row">
      <div class="col-md-4">
        <p><?php echo $section['textcolumn'] ?></p>
      </div>
      <div class="col-md-8">
        <?php echo $section['imagecolumn']->kirbytext() ?>
      </div>
    </div>

    <?php endforeach; ?>

    <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
      <?php endif ?>
    </nav>

  </main>

<?php snippet('footer') ?>