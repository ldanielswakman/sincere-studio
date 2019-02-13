<?
Kirby::plugin('section/tags', [
	'tags' => [
		'since' => [
			'html' => function($tag) {

				$since = $tag->attr('since');
				$html = date("Y") - $since;

				return $html;
			}
		],
		'side-image' => [
		  'attr' => array(
		    'class',
		    'row-class'
		  ),
		  'html' => function($tag) {

		    $image = $tag->attr('side-image');
		    $image_url = $tag->file($image)->url();
		    $class = $tag->attr('class', '');
		    $row_class = $tag->attr('row-class', '');

		    $col_side = snippet('article/col-side', [], true);
		    $col_main = snippet('article/col-main', [], true);

		    $close_section = '</div></div>';
		    $side_img_section = '<div class="row ' . $row_class . '">' . $col_side;
		    $text_section = '</div>' . $col_main;

		    $img_html = '<figure class="' . $class . '"><img src="' . $image_url . '" alt="" /></figure>';

		    $html = $close_section . $side_img_section . $img_html .  $text_section;

		    return $html;
		  }
		],
		'new-section' => [
		  'html' => function($tag) {

		    $class = $tag->attr('new-section');

		    $col_side = snippet('article/col-side', [], true);
		    $col_main = snippet('article/col-main', [], true);

		    $close_section = '</div></div></section>';

		    $new_section = '<section class="u-pv5vh ' . $class . '"><div class="row">' . $col_side . '</div>' . $col_main;

		    $html = $close_section . $new_section;

		    return $html;
		  }
		],
		'full-image' => [
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
		]
	]
]);
