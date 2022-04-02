<?php
require_once 'db_connect.php';


if ($_POST) {    
    $id = $_POST['id'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $longitude = $_POST["longitude"];
    $latitude = $_POST["latitude"];
 
 
        $sql = "UPDATE locations SET image = '$image', name = '$name', price = '$price' , description ='$description', duration = '$duration', longitude = '$longitude', latitude = '$latitude' 
        WHERE id = {$id}";
    if (mysqli_query($connect, $sql) === true) {
        $class = "Success";
        $message = "This  Product was successfully updated";
    } else {
        $class = "danger";
        $message = "Error while updating : <br>" .mysqli_connect_error();
    }
    mysqli_close($connect);    
} else {
    header("location: ../error.php");
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?> 
    </head>
    <body>
    <header>
        <?php
            include_once '../components/navigation.php';
        ?>
    </header>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response:</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
       
    </body>
</html>