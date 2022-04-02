
<?php
require_once("../actions/db_connect.php");
if(isset($_GET["id"])){
    $id= ($_GET["id"] == "all") ? "" : " WHERE id=".$_GET["id"];
}else {
    $id= "";
}
$sql= "SELECT * FROM locations $id";

$result = mysqli_query($connect, $sql);
  if(mysqli_num_rows($result) == 1){
      $rows = mysqli_fetch_assoc($result);
  }else {
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
mysqli_close($connect);
