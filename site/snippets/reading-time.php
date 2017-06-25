<? 
// Return a span with reading time of a given $text parameter 
$text = (isset($text)) ? $text : '';
?>
<span>
  <?
  // reading time = word count / average reading speed (words per minute)
  $reading_time = round(str_word_count( $text ) / 200) + 1;
  // override if infographic
  // if (isset($template) && $template == 'blog-post-infographic') { $reading_time = 3; }
  echo $reading_time;
  ?>
  min read
</span>
