<?php 

$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "be15_cr12_mount_everest_richard_szigethy";

// create connection
$connect = mysqli_connect($hostname, $username, $password, $dbname);

// check connection
if(mysqli_connect_error()) {
    die("Connection failed");
}