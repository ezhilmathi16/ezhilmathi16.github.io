<?php
//Use file_get_contents to GET the URL in question.


/*$url1 = 'https://api.spacexdata.com/v2/launches';
$contents_all = file_get_contents($url1);
$contents_all = utf8_encode($contents_all);
preg_match('/^.+[\n](.+)[\n]./', $contents_all,$matches);
//print_r($contents_all);


$url3 = 'https://api.spacexdata.com/v2/launches';

$contents_past = file_get_contents($url3);
$contents_past = utf8_encode($contents_past);
preg_match('/^.+[\n](.+)[\n]./', $contents_past, $matches);
//print_r($contents_past);

$url4 = 'https://api.spacexdata.com/v3/launches/upcoming';


$contents_up = file_get_contents($url4);
$contents_up = utf8_encode($contents_up);
preg_match('/^.+[\n](.+)[\n]./', $contents_up, $matches);
//print_r($contents_up);


 $url5 = 'https://api.spacexdata.com/v3/launches/latest';

$contents_lat = file_get_contents($url5);
$contents_lat = utf8_encode($contents_lat);
preg_match('/^.+[\n](.+)[\n]./', $contents_lat, $matches);*/
//print_r($contents_lat);

$url6 = 'https://api.spacexdata.com/v3/launches/next';

$contents_nxt = file_get_contents($url6);
$contents_nxt = utf8_encode($contents_nxt);
preg_match('/^.+[\n](.+)[\n]./', $contents_nxt, $matches);
//print_r($contents_nxt);
//echo("hello");

if($contents_nxt!== false){
    
     
   $contents_nxt = json_decode($contents_nxt);
  
   echo json_encode($contents_nxt);
}
?>