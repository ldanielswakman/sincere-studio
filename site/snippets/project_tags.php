<?php
$tags = explode(',', $page->tags()->html());
foreach ($tags as $key => $tag) :
  echo '<a href="' . $page->parent()->url() . '/tag:' . $tag . '#projects">' . $tag . '</a>';
  echo (($key+1) < count($tags)) ? ', ' : '';
endforeach;
?>