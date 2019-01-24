<?php
// find featured projects on current page or fallback to 'projects' page
$sourcepage = (strlen($page->featured1()->html()) > 0) ? $page : page('projects');
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured1());
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured2());
$featured[] = page($sourcepage->uri() . '/' . $sourcepage->featured3());
?>

<!-- Project Cards -->
<div class="card-container owl-carousel u-mt1">
  <? foreach ($featured as $project) : ?>

    <a href="<?php echo $project->url() ?>" class="card">
      <? if($image = $project->featuredimage()) : ?>
        <figure>
          <img src="<?= $project->image($image)->thumb(['width' => 800])->url() ?>" alt="">
        </figure>
      <? endif ?>
    </a>

  <? endforeach ?>

</div>
