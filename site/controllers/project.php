<?php

return function ($site, $pages, $page) {

  $other_projects = $site->find('projects')->children()->not($page)->not($page->nextListed());
  $project_tags = $page->tags()->split(',');

  // Rank pages by amount of matching tags
  $ranks = [];
  foreach ($other_projects as $pr) :
    $tags = $pr->tags()->split(',');
    $rank = count($project_tags) - count(array_diff($project_tags, $tags));
    $ranks[] = $rank;
  endforeach;

  // Sort page array via rank
  $projects_arr = $other_projects->toArray();
  array_multisort($ranks, SORT_DESC, $projects_arr, SORT_DESC);

  // Use only first 3
  $projects_arr = array_slice($projects_arr, 0, 3);

  // Create selection slug array from sorted array
  $selection = [];
  foreach ($projects_arr as $key => $item) :
    $selection[] = str_replace('projects/','', $key);
  endforeach;

  return [
    'related_pages' => $other_projects->filterBy('slug', 'in', $selection)
  ];
};
