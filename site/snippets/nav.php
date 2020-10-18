<nav>

  <?php
  // check if one of menu pages is active
  $hasActive = false;
  foreach($pages->listed() as $p) { if($p->isOpen()) { $hasActive = true; break; } }
  ?>

  <ul<?= e($hasActive, ' class="hasActive"') ?>>
    <?php foreach($pages->listed() as $p): ?>
    <li><a <?php e($p->isOpen(), ' class="isActive"') ?> href="<?= $p->url() ?>"><?= strtolower($p->title()->html()) ?></a></li>
    <?php endforeach ?>
  </ul>

  <ul class="menu-grey">
    <li><a href="javascript:openContactForm()" class="button button--outline">get in touch</a></li>
    <li><a href="//twitter.com/ldanielswakman" target="_blank" class="a--twitter"><?php snippet('svg/twitter-icon') ?></a></li>
  </ul>

</nav>
