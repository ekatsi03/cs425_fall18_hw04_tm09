<?php
include 'db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>PV Annotation System</title>

  </head>
  <body>

    <div id="mapid"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            
    <script src="javascript.js"></script> 
 
    <?php
      $sql = "SELECT * FROM general INNER JOIN efficiency ON general.pvID = efficiency.pvID INNER JOIN hardware ON efficiency.pvID = hardware.pvID;";
      mysqli_select_db($conn, 'testdb');
      $retval = mysqli_query($conn, $sql);
      define('MYSQL_ASSOC',MYSQLI_ASSOC);

      if(!$retval)
        die('Could not get data:'.mysqli_error());

      while($row = mysqli_fetch_array($retval,MYSQL_ASSOC)){
        echo "<script> L.marker([".$row['latitude'].",". $row['longitude']."]).addTo(mymap)
            .bindPopup(\"<b> Name: </b>".$row['name']."<br /> <b> Address: </b>".$row['address']."<br /> <b> Latitude: </b>".$row['latitude']."<br /> <b> Longitude	: </b>".$row['longitude']."<br /> <b> Operator: </b>".$row['operator']."<br /> <b> Commission Date: </b>".$row['commission date']."\").openPopup();</script>";
      }
    ?>

  </body>
</html>