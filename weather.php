<?php
require_once 'actions/db_connect.php';
require_once "restful.php";
if ($_GET) { 
    $location = "$_GET['latitude'],$_GET['longitude'];
    $connection= 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $location . '?exclude=minutely,hourly,daily,alerts,flags';
    $input = curl_get($connection);
    $weather = json_decode($input);
    $fahrenheit= $weather->currently->temperature;
    $celsius = round(($fahrenheit - 32) * (5 / 9), 2);
    echo "
    <p>Location: {$weather->timezone} </p>
    <p>{$weather->currently->summary} </p>
    <p>{$celsius} &deg;C</p>
        </div>";
    }
 ?>  


       
