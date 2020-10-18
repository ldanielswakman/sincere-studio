<div class="row">
  <div class="col-xs-12 col-sm-11 col-sm-offset-1">

    <h5><?= isset($title) ? $title : 'Recent work' ?></h5>

    <!-- Project Cards -->
		<div class="card-container owl-carousel u-mt1">
		  <?php foreach ($page->recent()->toPages() as $project) : ?>

		    <a href="<?php echo $project->url() ?>" class="card">
		      <?php if($image = $project->featuredimage()->toFile()) : ?>
		        <figure>
		          <img src="<?= $image->thumb(['width' => 800])->url() ?>" alt="">
		        </figure>
		      <?php endif ?>
		    </a>

		  <?php endforeach ?>
		</div>

    <div class="u-mb2 u-mt1">
      <!-- See -->
      <a href="<?= $pages->find('projects')->url() ?>" class="button u-mb1 u-mr1">all projects</a>
      <!-- or read  -->
      <a href="<?= $pages->find('articles')->url() ?>" class="button button--outline u-mb1">case studies</a>
    </div>

  </div>
</div>
