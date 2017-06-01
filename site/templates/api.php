<?php

// if(!r::is_ajax()) notFound();

header('Content-type: application/json; charset=utf-8');

$data = $pages->find('projects')->children()->visible();

// build array basics
$json = array();
$json['projects'] = array();

// build array result data
foreach($data as $project) {

  $featuredimage = '';
  if($image = $project->featuredimage()) {
    $featuredimage = $project->image($image)->url();
  }

  $json['projects'][] = array(
    'url'   => (string)$project->url(),
    'slug' => (string)$project->slug(),
    'description'  => (string)excerpt($project->description(), 1000),
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
  $url = 'https://spreadsheet.glitch.me/?key=171Ur45EUbxpG3f6sujgo_UgElyFSF2RKcXFohvGIG_M';
  $json_data = file_get_contents($url);
  $data = json_decode($json_data, true);

  foreach($data as $item) {
    $json['location'][] = $item;
  }
}



// get Dribbble shots
$dribbble = (isset($_GET['dribbble'])) ? $_GET['dribbble'] : null;
if($dribbble !== null) {
  $token = c::get('dribbble_token');
  $url = 'https://api.dribbble.com/v1/users/ldanielswakman/shots?per_page=3&access_token=' . $token;

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $token,
  ]);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'get');
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
  ]);
  $data = json_decode(curl_exec($ch));
  $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  $json['dribbble'] = $data;
  // foreach($data as $item) {
  //   $json['dribbble'][] = $item;
  // }
}



echo json_encode($json);
