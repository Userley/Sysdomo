<?php
$longitud = $_GET["longitud"];
$latitud = $_GET["latitud"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="lib/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="lib/materialize/js/materialize.min.js"></script>
    <title>Document</title>
</head>

<body>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuBEidKGDuQo7Bzf1uRg47MPaRRlEesw0">
    </script>

    <div id="map" style="width:60%;height:400px;"></div>
    <?php
    echo "<script>
        navigator.geolocation.getCurrentPosition(function(location) {
            var map;
            var center = {
                lat: " . $latitud . ",
                lng: " . $longitud . "
            };

              function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  center: center,
                  zoom: 6
                });
                var marker = new google.maps.Marker({
                  position: {
                    lat: " . $latitud . ",
                    lng: " . $longitud . "
                  },
                  map: map,
                  title: 'Ubication'
                });
              }
              initMap();
        });
    </script>";

    ?>
</body>

</html>