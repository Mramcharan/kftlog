
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
           <span class="mdl-layout-title" style="margin-left:40px;">Tracking Progress</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
         </div>

       </header>

       <main class="mdl-layout__content">
         <div class="page-content"><!-- Your content goes here -->
           <div class="mdl-grid">

           <div class="mdl-cell mdl-cell--12-col">
           <link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>

           <h1><?php echo "$vehicle";?></h1>
           <!-- To test add 'active' class and 'visited' class to different li elements -->

           <div class="checkout-wrap">
           <ul class="checkout-bar">

           <li class="active">
           <a href="#">idle/empty</a>
           </li>

           <li >booked</li>

           <li class="">Loaded/Dispatched</li>

           <li class="">Reported</li>

           <li class="">Unloaded</li>

           </ul>
           </div>
           </div>

           </div>

           <div class="mdl-grid" style="margin-top:100px;">

           <div class="mdl-cell mdl-cell--6-col">

           <ul class="demo-list-item mdl-list">
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            Current location   -  <b> <?php// echo $country; ?></b>
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              Speed
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            status
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            owner
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            driver
            </span>
           </li>
           </ul>

           </div>
           <div class="mdl-cell mdl-cell--6-col">
           <ul class="demo-list-item mdl-list">
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
           source
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              destination
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            booked at
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            party name
            </span>
           </li>
           <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            issues
            </span>
           </li>
           </ul>

           </div>
           </div>



       </div>

              <button onclick="location.href='map.php?v=<?php echo $vehicle; ?>'" id="mapfab" type="button"
              class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white map">
              <i class="material-icons">place</i></button>
       </main>

      </div>

   </body>
 </html>
