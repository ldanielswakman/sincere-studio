<?php
// find featured projects on current page or fallback to 'projects' page
$sourcepage = (strlen($page->featured1()->html()) > 0) ? $page : page('projects');
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured1());
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured2());
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured3());
foreach ($featured as $project) : 
?>

  <?php
  $featuredImage = $project->image($project->featuredimage());
  $thumbUrl = thumb($featuredImage, array('width' => 1500))->url();
  $style  = ' style="';
  $style .= (strlen($thumbUrl) > 0) ? 'background-image: url(\'' . $thumbUrl . '\');' : '';
  $style .= (strlen($project->featuredcolour()) > 0) ? ' background-color: #' . $project->featuredcolour() . ';' : '';
  $style .= '"';
  ?>

<!-- <div class="col-xs-4 u-fullheight">
  <a href="<?php echo $project->url() ?>" class="featured-project"<?php echo $style ?>>
    <span class="text"><?php echo $project->title() ?></span>
  </a>
</div> -->

<section class="u-pv60 featured-slide"<?php echo $style ?>>

  <div class="col-sm-7 col-sm-offset-1 u-mt60">
    <h2><a href="<?php echo $project->url() ?>">
      <span class="text"><?php echo $project->title() ?></span>
    </a></h2>
  </div>

  <div class="col-sm-4 col-sm-offset-1 u-mt60">
    <h3><em><?php echo $project->description() ?></em></h3>
    <a href="<?php echo $project->url() ?>" class="btn btn-whiteoutline u-mt20">view project <i class="ion ion-ios-arrow-forward u-ml5"></i></a>
  </div>

</section>

<?php
endforeach;
?>


