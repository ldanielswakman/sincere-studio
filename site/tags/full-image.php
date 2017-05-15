<?php

kirbytext::$tags['full-image'] = array(
  'attr' => array(
    'class'
  ),
  'html' => function($tag) {

    $image = $tag->attr('full-image');
    $image_url = $tag->file($image)->url();
    $class = $tag->attr('class', '');

    $col_side = snippet('article/col-side', [], true);
    $col_main = snippet('article/col-main', [], true);

    $close_section = '</div></div>';
    $full_img_section = '<div class="row section-undo-p"><div class="col-xs-12">';
    $text_section = '<div class="row">' . $col_side . '</div>' . $col_main;

    $img_html = '<figure><img src="' . $image_url . '" class="' . $class . '" alt="" /></figure>';

    $html = $close_section . $full_img_section . $img_html . $close_section . $text_section;

    return $html;
  }
);