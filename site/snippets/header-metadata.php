<?

// Set title
$title = r($page->isHomePage(), $site->title()->html(), $page->title()->html() . ' — ' . $site->title()->html());
$site_title = $site->title()->html();

// Set description
$descr = $site->description()->html();
if($page->description()->isNotEmpty()) {
	$descr = excerpt($page->description(), 30, 'words');
} else if($page->text()->isNotEmpty()) {
	$descr = excerpt($page->text(), 30, 'words');
} else if($page->intro()->isNotEmpty()) {
	$descr = excerpt($page->intro(), 30, 'words');
}

// Set image
$image_url = r($site->meta_image()->isNotEmpty(), $site->image($site->meta_image())->url());
if($page->featuredimage()->isNotEmpty()) {
	$image_url = $page->image($page->featuredimage())->url();
} else if($page->cover_image()->isNotEmpty()) {
	$image_url = $page->image($page->cover_image())->url();
}
?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<meta name="description" content="<?= $descr ?>">
<meta name="keywords" content="<?= $site->keywords()->html() ?>">
<meta name="author" content="<?php echo $site->author()->html() ?>" />

<!-- Social share parameters -->
<meta property="og:image" content="<?= $image_url ?>" />
<meta property="og:title" content="<?= $title ?>" />
<meta property="og:site_name" content="<?= $site->title() ?>" />
<meta property="og:description" content="<?= $descr ?>" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@ldanielswakman">
<meta name="twitter:title" content="L Daniel Swakman">
<meta name="twitter:description" content="<?= $descr ?>">
<meta name="twitter:image" content="<?= $image_url ?>">

<!-- Pinterest Verify Meta Tag -->
<meta name="p:domain_verify" content="95b773d9940de5e8c8768dbbfaf2ac7f"/>
