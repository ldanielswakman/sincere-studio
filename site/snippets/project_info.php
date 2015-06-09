<h2 class="u-mb40"><?php echo $page->title()->kirbytext() ?></h2>

<big><em><?php echo $page->description()->kirbytext() ?></em></big>

<p class="meta u-mt40"><i class="ion ion-android-calendar u-mr10"></i> <?php echo $page->year()->html() ?></p>
<p class="meta">
  <i class="ion ion-pricetags u-mr10"></i>
  <?php snippet('project_tags', array('page' => $page) ); ?>
</p>
<?php 
if(strlen($page->projecturl()->kirbytext()) > 0) :
  // removes http and trailing slashes
  $needle = '://';
  $cleanurl = rtrim(substr(strstr($page->projecturl()->html(), $needle), strlen($needle)), '/');
?>
  <p class="meta">
    <i class="ion ion-forward u-mr10"></i>
    <a href="<?php echo $page->projecturl()->html() ?>" target="_blank"><?php echo $cleanurl ?></a>
  </p>
<?php endif; ?>

<?php if (count(yaml($page->sections())) > 1): ?>
  <div class="u-aligncenter u-mt40">
    <a href="<?php echo '#part' . ($key+2) ?>" class="btn btn-outline btn-circle"><i class="ion ion-chevron-down"></i></a>
  </div>
<?php endif; ?>