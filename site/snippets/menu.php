<nav>

  <?
  // check if one of menu pages is active
  $hasActive = false;
  foreach($pages->visible() as $p) { if($p->isOpen()) { $hasActive = true; break; } }
  ?>

  <ul<?= ecco($hasActive, ' class="hasActive"') ?>>
    <? foreach($pages->visible() as $p): ?>
    <li>
      <a <? e($p->isOpen(), ' class="isActive"') ?> href="<?= $p->url() ?>"><?= strtolower($p->title()->html()) ?></a>
    </li>
    <? endforeach ?>
  </ul>

  <ul class="menu-gray">
    <li><a href="#">Say hi</a></li>
    <li><a href="//twitter.com/ldanielswakman" target="_blank"><? snippet('twitter-icon-svg') ?></a></li>
  </ul>

</nav>
