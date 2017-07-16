

<?php include "mysql_connection.php" ?>


 <?php
if(isset($_GET['v'])){

$vehicle = $_GET['v'];
$sql = "SELECT vehicleno FROM vehicles where vehicleno='$vehicle'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $vehicle_no = $row['vehicleno'];
  $vehicle  .=  "$vehicle_no";

} else {
  $vehicle = "no vehicle found";
}

}
else{

}


 ?>
 <?php
$lat = 18.691659;
$lng = 79.297317;
$slat = 18.712819;
$slng= 79.405151;
$dlat =18.737841;
$dlng =79.190300;
 ?>
 <?php
$deal_lat=18.704762;
$deal_long=79.416678;
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$deal_lat.','.$deal_long.'&sensor=false');

        $output= json_decode($geocode);

    for($j=0;$j<count($output->results[0]->address_components);$j++){
               $cn=array($output->results[0]->address_components[$j]->types[0]);
           if(in_array("administrative_area_level_2", $cn))
           {
            $country= $output->results[0]->address_components[$j]->long_name;
           }
            }


?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>kft logistics</title>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-deep_orange.min.css" />
 <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <style>

 .demo-list-item {
   width: 300px;
 }

 #mapfab {
       position: fixed;
       display: block;
       right: 0;
       bottom: 0;
       margin-right: 40px;
       margin-bottom: 40px;
       z-index: 900;
     }
     a{
     text-decoration:none;
     outline: none;
   }
 </style>


   </head>
   <body>

     <!-- Always shows a header, even in smaller screens. -->
     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <header class="mdl-layout__header">

         <div class="mdl-layout__header-row">
           <i onclick="location.href='index.php'" style="cursor:default" class="material-icons">arrow_back</i>

           <!-- Title -->
           <span class="mdl-layout-title" style="margin-left:40px;">Tracking Map (<?php echo $vehicle;?>)</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
         </div>

       </header>

       <main class="mdl-layout__content">

         <div class="page-content"><!-- Your content goes here -->
           <div class="mdl-grid">

         <div class="mdl-cell mdl-cell--9-col">

         <div id="googleMap" style="width:100%;height:550px;border:1px solid black;"></div>
         <script>

         function myMap() {
           latt =  <?php echo $lat; ?>;
           lngg = <?php echo $lng; ?>;
           slatt = <?php echo $slat; ?>;
           slngg = <?php echo $slng; ?>;
           dlatt = <?php echo $dlat; ?>;
           dlngg = <?php echo $dlng; ?>;
           var myLatLng = {lat:latt, lng:lngg};
           var sourceLatLng ={lat:slatt,lng:slngg};
           var destinationLatLng = {lat:dlatt,lng:dlngg};

           var map = new google.maps.Map(document.getElementById('googleMap'), {
             zoom: 11,
             center: myLatLng
           });
           var image = {
                     url: 'css/vehicle.png',

                              size: new google.maps.Size(32,32),
                              // The origin for this image is (0, 0).
                              origin: new google.maps.Point(0, 0),
                              // The anchor for this image is the base of the flagpole at (0, 32).
                              anchor: new google.maps.Point(0, 32)

                   };

           var marker = new google.maps.Marker({
             position: myLatLng,
             map: map,
             title:"<?php echo $country; ?>",
             icon:image,
             animation: google.maps.Animation.DROP

           });

           var marker2 = new google.maps.Marker({
             position: sourceLatLng,
             map: map,
             title:"<?php echo $country; ?>",
             icon: "http://www.google.com/mapfiles/markerS.png",
             animation: google.maps.Animation.DROP

           });

           var marker3 = new google.maps.Marker({
             position: destinationLatLng,
             map: map,
             title:"<?php echo $country; ?>",
             icon: "http://www.google.com/mapfiles/markerD.png",
             animation: google.maps.Animation.DROP

           });
           var flightPlanCoordinates = [
                    {lat: 18.712819, lng: 79.405151},
                    {lat: 18.691659, lng: 79.297317}


                  ];
                  var flightPath = new google.maps.Polyline({
                    path: flightPlanCoordinates,
                    geodesic: true,
                    strokeColor: 'green',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                  });

                  flightPath.setMap(map);

         }




         </script>

         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD33CutqDu6hBBIMpE2dVZgA6S-bupnI30&callback=myMap"></script>


         </div>
         <div class="mdl-cell mdl-cell--3-col">

         </div>

         </div>
         </div>
              <button onclick="location.href='specific.php?v=<?php echo $vehicle; ?>'" id="mapfab" type="button"
              class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white map">
              <i class="material-icons">subdirectory_arrow_left</i></button>
       </main>

      </div>

   </body>
 </html>
