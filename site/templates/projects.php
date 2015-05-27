<?php snippet('header') ?>

  <main>

    <section class="featured bg-darkBlue">

      <div class="row u-pv40">
        <div class="col-md-8 col-md-offset-2">

          <div class="text">
            <p><big><em>Currently I'm working on creating a <a href="javascript:void(0)">local governance platform</a> and redesigning the identity of a <a href="javascript:void(0)">chef website</a>. Recently I've worked on:</em></big></p>
            <?php // echo $page->text()->kirbytext() ?>
          </div>

        </div>
      </div>

      <div class="row u-pv20">

        <?php
        $featured[] = page($page->uri() . '/' . $page->featured1());
        $featured[] = page($page->uri() . '/' . $page->featured2());
        $featured[] = page($page->uri() . '/' . $page->featured3());
        foreach ($featured as $project) : 
        ?>
        <div class="col-md-4">
          <?php
          $style = ($project->hasImages()) ? ' style="background-image: url( ' . $project->images()->first()->url() . ');"' : '';
          ?>
          <a href="<?php echo $project->url() ?>" class="featured-project"<?php echo $style ?>>
            <span class="text"><?php echo $project->title() ?></span>
          </a>
        </div>
        <?php
        endforeach;
        ?>

      </div>

    </section>

    <div class="row u-pv40">
      <div class="col-sm-6 col-sm-offset-3">

        <ol>
          <?php foreach($page->children()->visible() as $project): ?>
          <li>
            <a href="<?php echo $project->url() ?>"><?php echo $project->title()->html() ?></a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>

  </main>

<?php snippet('footer') ?>