<nav>

  <ul>
    <? foreach($pages->visible() as $p): ?>
    <li>
      <a <? e($p->isOpen(), ' class="active"') ?> href="<?= $p->url() ?>"><?= strtolower($p->title()->html()) ?></a>
    </li>
    <? endforeach ?>
  </ul>

  <ul class="menu-gray">
    <li><a href="#">Say hi</a></li>
    <li><a href="//twitter.com/ldanielswakman" target="_blank"><? snippet('twitter-icon-svg') ?></a></li>
  </ul>

</nav>
