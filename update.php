<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM locations WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $image = $data['image'];
        $name = $data['name'];
        $price = $data['price'];
        $description = $data['description'];
        $duration = $data['duration'];
        $longitude = $data["longitude"];
        $latitude = $data["latitude"];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Travel Agency</title>
        <link rel="stylesheet" href="style/details.css">
        <?php require_once 'components/boot.php'?>
        
    </head>
    <header>
    <?php require_once 'components/navigation.php'?>
    </header>
    <body>

   <div class="container w-50">
          <div class=" d-flex justify-content-center shadow" >
          <img class="card-img-top"  src='pictures/<?php echo $image ?>' alt="<?php echo $name ?>">
          </div>
          <h2 >Insert your changes here:</h2>
            <form action="actions/a_update.php"  method="post">
            <table class='table  table-striped '>   
                    <tr>
                        <th>Image:</th>
                        <td><input class='form-control' type="file" name="image" placeholder ="Image URl"  value="<?php echo $image ?>"/></td>
                    </tr>    
                    <tr>
                        <th>Name:</th>
                        <td><input class='form-control' type="text" name= "name" placeholder ="Location Name:" value="<?php echo $name ?>"/></td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td><input class='form-control' type="text" name="price" placeholder ="Price:" value="<?php echo $price ?>"/></td>
                    </tr>
                    <tr>
                        <th>Short Description:</th>
                        <td><input class='form-control' type="text" name="description" placeholder ="Description :" value="<?php echo $description ?>"/></td>
                    </tr>                  
                    <tr>
                        <th>Duration</th>
                        <td><input class='form-control' type="text" name="duration" placeholder ="Duration:" value="<?php echo $duration ?>"/></td>
                    </tr>
                    <tr>
                       <th>Find out the Latitude and Langitude here:</th>
                       <td><a href="https://www.latlong.net/">latlong.net</a></td>
</tr>
                    <tr>
                        <th>Latitude</th>
                        <td><input class='form-control' type="text" name="latitude"  placeholder="latitude" value="<?php echo $latitude ?>"/></td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td><input class='form-control' type="text" name="longitude"  placeholder="longitude" value="<?php echo $longitude ?>" /></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                        <input type= "hidden" name= "image" value= "<?php echo $data['image'] ?>" />
                        <td><button class="btn btn-primary" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-success" type="button"><i class="fas fa-reply"></i>  Back to Home</button></a></td>
                    </tr>
                </table>
            </form>
            </div>
        <footer>
            <?php require_once 'components/footer.php' ?>
        </footer>
    </body>
</html>