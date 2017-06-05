<?php

kirbytext::$tags['since'] = array(
  'html' => function($tag) {

    $since = $tag->attr('since');
    $html = date("Y") - $since;

    return $html;
  }
);