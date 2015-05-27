<h4 class="u-mv20">Recent work</h4>

<div class="row u-mb40">

  <?php foreach(page('work')->children()->visible()->limit(3) as $project): ?>
  <div class="col-md-4">
    <?php if($image = $project->images()->sortBy('sort', 'asc')->first()): ?>
    <a href="<?php echo $project->url() ?>">
      <img src="<?php echo $image->url() ?>" alt="<?php echo $project->title()->html() ?>" >
    </a>
    <?php endif ?>
  </div>
  <?php endforeach ?>

</div>
