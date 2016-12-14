<meta name="description" content="<?= $site->description()->html() ?>">
<meta name="keywords" content="<?= $site->keywords()->html() ?>">
<meta name="author" content="<?php echo $site->author()->html() ?>" />

<!-- Social share parameters -->
<meta property="og:image" content="<?= $site->image($site->meta_image())->url() ?>" />
<meta property="og:title" content="<?= $page->title() ?>" />
<meta property="og:site_name" content="<?= $site->title() ?>" />
<meta property="og:description" content="<?= $site->description()->html() ?>" />
