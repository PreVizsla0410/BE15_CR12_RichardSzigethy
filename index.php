<?php 
require_once 'actions/db_connect.php';

$sql = "SELECT * FROM locations";
$result = mysqli_query($connect ,$sql);
$tbody=''; 
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .=   ' 
        <div class="col">
        <div class="card-group h-200  ">
          <img src="pictures/'.$row['image'].'" class="card-img-top" alt="'.$row['name'].'">
          <div class="card-body bg-transparent text-dark">
            <h5 class="card-title">'.$row['name'].'</h5>
            <p class="card-text">'.$row['description'].'</p>
            <p class="card-text">Duration: '.$row['duration'].'</p>
            <p class="card-text">Price: '.$row['price'].'€</p>
            <div class="col text-center">
            <a href="update.php?id=' .$row['id'].'"><button class="btn btn-primary" type="button" title="Edit the Product">Edit</button></a>
            <a href="delete.php?id=' .$row['id'].'"><button class="btn btn-danger" type="button" title="Delete the Product">Delete</button></a>
            <a href="moredetails.php?id=' .$row['id'].'"><button class="btn btn-success" type="button" title="Show more info">Interested!</button></a>
                </div>
            </div>
        </div>
      </div>
            ';
        
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Locations Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mount Everest Travel Agency</title>
        <link rel="stylesheet" href="style/index.css">
        <?php require_once 'components/boot.php'?>
    </head>
    <body>
    <header>
        <?php include_once 'components/navigation.php';   ?>
        <?php include_once 'components/hero.php';   ?>

    </header>
       <main class="container container w-75 mt-3 mb-3" id="offers">
           <div class="text-center m-5">
           <h2> <i>Make an alternative journey this time!</i> </h2>
           <hr>
           </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
            <tbody>
                    <?= $tbody;?>
                </tbody>
                </div>
                </div>
                <hr>
        </main>
      <div class="col text-center m-5">

<button type="button" class="btn btn-warning"><a class="nav-link active" aria-current="page" href="API/displayAll.php">Build an API with our Data! Click here for Access</a></button>
<hr>
          <div>
        
        <footer>
            <?php require_once 'components/footer.php' ?>
        </footer>
    </body>
</html>