<nav>

  <?php
  // check if one of menu pages is active
  $hasActive = false;
  foreach($pages->listed() as $p) { if($p->isOpen()) { $hasActive = true; break; } }
  ?>

  <div class="row">
    <div class="col-xs-12 nav__inner">

      <ul<?= e($hasActive, ' class="hasActive"') ?>>
        <?php foreach($pages->listed() as $p): ?>
        <li><a <?php e($p->isOpen(), ' class="isActive"') ?> href="<?= $p->url() ?>"><?= strtolower($p->title()->html()) ?></a></li>
        <?php endforeach ?>
        <li><a href="javascript:openContactForm()" class="button button--outline button--subtle">get in touch</a></li>
      </ul>

      <ul class="menu-grey">
        <li><a href="//twitter.com/intent/follow?screen_name=ldanielswakman" target="_blank" class="a--twitter"><?php snippet('svg/twitter-icon') ?></a></li>
      </ul>

    </div>

</nav>
