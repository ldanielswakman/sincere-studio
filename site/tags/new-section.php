<?php

kirbytext::$tags['new-section'] = array(
  'html' => function($tag) {

    $class = $tag->attr('new-section');

    $col_side = snippet('article/col-side', [], true);
    $col_main = snippet('article/col-main', [], true);

    $close_section = '</div></div></section>';

    $new_section = '<section class="u-pv5vh ' . $class . '"><div class="row">' . $col_side . '</div>' . $col_main;

    $html = $close_section . $new_section;

    return $html;
  }
);