<?php
$featured[] = page($page->uri() . '/' . $page->featured1());
$featured[] = page($page->uri() . '/' . $page->featured2());
$featured[] = page($page->uri() . '/' . $page->featured3());
foreach ($featured as $project) : 
?>

<div class="col-xs-4 u-fullheight">
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