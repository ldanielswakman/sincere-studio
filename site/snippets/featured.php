<?php
// find featured projects on current page or fallback to 'work' page
$sourcepage = (strlen($page->featured1()->html()) > 0) ? $page : page('work');
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured1());
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured2());
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured3());
foreach ($featured as $project) : 
?>

<div class="col-xs-4 u-fullheight">
  <?php
  $featuredImage = $project->image($project->featuredimage());
  $thumbUrl = thumb($featuredImage, array('width' => 600, 'quality' => 80))->url();
  $style = (strlen($thumbUrl) > 0) ? ' style="background-image: url(\'' . $thumbUrl . '\');"' : '';
  ?>
  <a href="<?php echo $project->url() ?>" class="featured-project"<?php echo $style ?>>
    <span class="text"><?php echo $project->title() ?></span>
  </a>
</div>

<?php 
endforeach;
?>