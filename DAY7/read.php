<?php
include "dbConnection.php";
# Clean Function to sanitize the data
function Clean($input)
{
    $string=stripslashes(strip_tags(trim($input)));
    return  preg_replace('/[^A-Za-z0-9\-]/', ' ', $string);

}

$url="https://wikimedia.org/api/rest_v1/metrics/pageviews/per-article/en.wikipedia/all-access/all-agents/Tiger_King/daily/20210901/20210930";
  $string = file_get_contents($url);
  $json = json_decode($string);
  $pageviews_data =$json->items;
  //print_r($pageviews_data);
  
  foreach($pageviews_data as $page)
  {
    $project=clean($page->project);
    $article=clean($page->article);
    $granularity=clean($page->granularity);
    $timestamp=clean($page->timestamp);
    $access=clean($page->access);
    $agent=clean($page->agent);
    $views=clean($page->views);

    $sql ="INSERT INTO pageviews (`project`, `article`,`granularity`,`timestamp`,`access`,`agent`,`views`)
              VALUES ('$project','$article','$granularity',$timestamp,'$access','$agent','$views')";

      if ($con->query($sql) === TRUE) 
      {
          echo "New record created successfully"."<br>";
      } 
      else {
          echo "Error: " . $sql . "<br>" . $con->error."<br>";
      }
    }

?>