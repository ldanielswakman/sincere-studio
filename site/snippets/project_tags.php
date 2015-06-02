<?php
$tags = explode(',', $page->tags()->html());
foreach ($tags as $key => $tag) :
  echo '<a href="' . u('/work/tag:' . $tag . '#projects') . '">' . $tag . '</a>';
  echo (($key+1) < count($tags)) ? ', ' : '';
endforeach;
?>