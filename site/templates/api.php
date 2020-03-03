<?php

// if(!r::is_ajax()) notFound();

header('Content-type: application/json; charset=utf-8');

$data = $pages->find('projects')->children()->listed();

// build array basics
$json = array();
$json['projects'] = array();

// build array result data
foreach($data as $project) {

  $featuredimage = ($image = $project->featuredimage()->toFile()) ? $image->url() : '';

  $json['projects'][] = array(
    'url'   => (string)$project->url(),
    'slug' => (string)$project->slug(),
    'description'  => (string)$project->description()->excerpt(1000),
    'year' => (string)$project->year(),
    'project_url' => (string)$project->projecturl(),
    'tags'  => (string)$project->tags(),
    'featuredimage' => (string)$featuredimage,
    'featuredcolour' => (string)$project->featuredcolour(),
    // 'image' => $image_data,
  );
}



// retrieve Location data from Spreadsheet API
$loc = (isset($_GET['loc'])) ? $_GET['loc'] : null;
if($loc !== null) {
  $key = c::get('google_sheet_key');
  $url = 'https://spreadsheet.glitch.me/?key=' . $key;
  $json_data = file_get_contents($url);
  $data = json_decode($json_data, true);

  foreach($data as $item) {
    $json['location'][] = $item;
  }
}



echo json_encode($json);
