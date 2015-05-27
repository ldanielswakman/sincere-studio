<nav class="u-alignright">

  <ul class="menu clearfix">
    <?php foreach($pages->visible() as $p): ?>
    <li>
      <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo strtolower($p->title()->html()) ?></a>
    </li>
    <?php endforeach ?>
  </ul>

</nav>
