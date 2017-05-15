<?php

kirbytext::$tags['side-image'] = array(
  'attr' => array(
    'class'
  ),
  'html' => function($tag) {

    $image = $tag->attr('side-image');
    $image_url = $tag->file($image)->url();
    $class = $tag->attr('class', '');

    $col_side = snippet('article/col-side', [], true);
    $col_main = snippet('article/col-main', [], true);

    $close_section = '</div></div>';
    $side_img_section = '<div class="row">' . $col_side;
    $text_section = '</div>' . $col_main;

    $img_html = '<figure class="' . $class . '"><img src="' . $image_url . '" alt="" /></figure>';

    $html = $close_section . $side_img_section . $img_html .  $text_section;

    return $html;
  }
);