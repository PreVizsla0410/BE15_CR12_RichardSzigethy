<?php

header("Content-Type:application/json");
require_once("db_check.php");

function response($status, $status_message, $data)
{
    $response = $data;

    $json_response = json_encode($response);

    echo $json_response;
}

response(200, "working", $rows);  

?>


