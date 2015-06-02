<?php
$featured[] = page(page('work')->uri() . '/' . page('work')->featured1());
$featured[] = page(page('work')->uri() . '/' . page('work')->featured2());
$featured[] = page(page('work')->uri() . '/' . page('work')->featured3());
foreach ($featured as $project) : 
?>

<div class="col-md-4">
  <?php
  $style = ($project->hasImages()) ? ' style="background-image: url( ' . $project->url() . '/' . $project->featuredimage() . ');"' : '';
  ?>
  <a href="<?php echo $project->url() ?>" class="featured-project"<?php echo $style ?>>
    <span class="text"><?php echo $project->title() ?></span>
  </a>
</div>

<?php 
endforeach;
?>