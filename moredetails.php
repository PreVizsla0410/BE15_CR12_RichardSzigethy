<?php
require_once 'actions/db_connect.php';
require_once 'restful.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM locations WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $image = $data['image'];
        $holidayname = $data['holidayname'];
        $price = $data['price'];
        $description = $data['description'];
        $length = $data['length-of-holiday'];
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
        <title>Mount Everest Travel Agency</title>
        <link rel="stylesheet" href="style/index.css">
        <?php require_once 'components/boot.php'?>   

        <style>
            .list-group-item {
                border: none;
                background: transparent;
            }      
        </style>
    </head>
    <body>
        <header>
            <?php include_once 'components/navigation.php';   ?>
        </header>
        <div class="container text-center w-30">
        <div class="btn btn-primary fw-bold" id="show">Show Weather</div>
    <div class='shadow-3 bg-light' id="weather"></div>
           <div class="card h-100 my-4" >
           <img src="pictures/<?php echo $image ?>" class="card-img-top " >
                <div class="card-body mt-3">
                    <h5 class="card-title text-center fs-2"><?php echo $holidayname ?></h5>  
                <ul class="list-group">
                    <li class="list-group-item"><p class="card-text">Price: <?php echo $price ?> €</p></li>
                    <li class="list-group-item"> <p class="card-text">Description: <br> <?php echo $description ?></p>  </li>
                    <li class="list-group-item"><p class="card-text">Duration: <?php echo $length ?></p></li>                  
                </ul> 
                </div>
                </div>        
            <div id="map" style="height: 400px;"></div>
                    <div class="d-flex justify-content-center my-3">
                        <a href="index.php" class='btn btn-danger'>Back to Home</a>
                    </div>
       </div>
       <footer>
        <?php include_once 'components/footer.php';?>
    </footer> 

   

    <script>
        document.getElementById("show").addEventListener("click", loadData);
        function loadData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.status == 200) {
                     document.getElementById("weather").innerHTML = this.responseText;
                }
            }
            let url = "weather.php?lat=" + <?php echo $latitude ?> + "&long=" + <?php echo $longitude ?>;
            xhttp.open("GET", url, true);
            xhttp.send();
        }  
    </script> 








<script>

    function initMap() {
        var location = {
            lat: <?php echo $latitude ?>,
            lng: <?php echo $longitude ?>
            
        };
        map = new google.maps.Map(document.getElementById('map'), {
            center: location,
            zoom: 10
        });
        var pinpoint = new google.maps.Marker({
            position: location,
            map: map
        });
    }
    </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
    </body>
</html>
