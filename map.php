

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

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>kft logistics</title>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-pink.min.css" />
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
         var mapProp= {
             center:new google.maps.LatLng(18.704762,79.416678),
             zoom:17,
         };
         var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
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
