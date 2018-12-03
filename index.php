<!--http://embed.plnkr.co/8qVoW5/-->
<?php
// Start the session
//session_start();
include 'db.php';
//include 'javascript.php';
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
         // $_SESSION["name"] = $row['name'];

        
          echo "<script>  var f = document.createElement(\"form\");
          f.setAttribute('method',\"post\");
          f.setAttribute('action',\"submit.php\");

          var label_name=createLabelForm(\"Name\");
          var textbox_name= createTextboxForm(\"".$row['name']."\");

          var label_address=createLabelForm(\"Address\");
          var textbox_address= createTextboxForm(\"".$row['address']."\");

          var label_operator=createLabelForm(\"Operator\");
          var textbox_operator= createTextboxForm(\"".$row['operator']."\");
          
          var label_commissionDate=createLabelForm(\"Commission Date\");
          var textbox_commissionDate= createTextboxForm(\"".$row['commission date']."\");
          
          var label_description=createLabelForm(\"Description\");
          var textbox_description= createTextboxForm(\"".$row['description']."\");
          
          var label_power=createLabelForm(\"System Power\");
          var textbox_power= createTextboxForm(\"".$row['system power']."\");
          
          var label_annualProduction=createLabelForm(\"Annual Production\");
          var textbox_annualProduction= createTextboxForm(\"".$row['annual production']."\");
          
          var label_C02avoided=createLabelForm(\"CO2 Avoided\");
          var textbox_C02avoided= createTextboxForm(\"".$row['CO2 avoided']."\");
          
          var label_reimbursement=createLabelForm(\"Reimbursement\");
          var textbox_reimbursement= createTextboxForm(\"".$row['reimbursement']."\");
          
          var label_solarPanelModules=createLabelForm(\"Solar Panel Modules\");
          var textbox_solarPanelModules= createTextboxForm(\"".$row['solar panel modules']."\");
          
          var label_azimuthAngle=createLabelForm(\"Azimuth Angle\");
          var textbox_azimuthAngle= createTextboxForm(\"".$row['azimuth angle']."\");
          
          var label_inclinationAngle=createLabelForm(\"Inclination Angle\");
          var textbox_inclinationAngle= createTextboxForm(\"".$row['inclination angle']."\");
          
          var label_communication=createLabelForm(\"Communication\");
          var textbox_communication= createTextboxForm(\"".$row['communication']."\");
          
          var label_inverter=createLabelForm(\"Inverter\");
          var textbox_inverter= createTextboxForm(\"".$row['inverter']."\");
          
          var label_sensors=createLabelForm(\"Sensors\");
          var textbox_sensors= createTextboxForm(\"".$row['sensors']."\");
          
          var s = document.createElement(\"button\"); //input element, Submit button
          s.setAttribute('type',\"submit\");
          s.innerHTML = \"Save Changes\";
          
          
          f.appendChild(label_name);
          f.appendChild(textbox_name);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_address);
          f.appendChild(textbox_address);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_operator);
          f.appendChild(textbox_operator);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_commissionDate);
          f.appendChild(textbox_commissionDate);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_description);
          f.appendChild(textbox_description);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_power);
          f.appendChild(textbox_power);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_annualProduction);
          f.appendChild(textbox_annualProduction);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_C02avoided);
          f.appendChild(textbox_C02avoided);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_reimbursement);
          f.appendChild(textbox_reimbursement);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_solarPanelModules);
          f.appendChild(textbox_solarPanelModules);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_azimuthAngle);
          f.appendChild(textbox_azimuthAngle);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_inclinationAngle);
          f.appendChild(textbox_inclinationAngle);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_communication);
          f.appendChild(textbox_communication);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_inverter);
          f.appendChild(textbox_inverter);
          f.appendChild(document.createElement(\"br\"));
          f.appendChild(label_sensors);
          f.appendChild(textbox_sensors);
         
          f.appendChild(s); 
          
          L.marker([".$row['latitude'].",". $row['longitude']."]).addTo(mymap)
               .bindPopup(f).openPopup();</script>";
        }
        ?>

  </body>
</html>