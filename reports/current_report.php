
<?php include "../mysql_connection.php" ?>
<?php
$vehicles = "";
$sql = "SELECT * FROM vehicles  ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $vehicle_no = $row["vehicleno"];
      $current_location = $row["currentlocation"];
      $speed = $row["speed"];
      $status = $row["status"];
      $source = $row["source"];
      $destination = $row["destination"];
      $ownername = $row["ownername"];
      $vehicles .= "<tr>
      <td>$vehicle_no</td>

      <td>$current_location</td>
      <td>$status</td>
      <td>$source</td>
      <td>$destination</td>
      </tr>";
    }
} else {
    echo "0 results";
}

 ?>
 <?php
 if (function_exists('date_default_timezone_set'))
 {
   date_default_timezone_set('Asia/Kolkata');
   $date = date("d/m/Y");
   $time = date("h:i a");
   $show = "<h5 style='position:fixed;'>$date $time</h5>";
 }
  ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>reports</title>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-deep_orange.min.css" />
 <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
 <style>

 #printbtn {
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
   table {
    border-collapse: collapse;
    text-align: center;
}

table, td, th {
    border: 1px solid black;
}

 </style>
   </head>
   <body>

     <!-- Always shows a header, even in smaller screens. -->
     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <header class="mdl-layout__header">

         <div class="mdl-layout__header-row">
           <i onclick="goBack()" style="cursor:default" class="material-icons">arrow_back</i>
           <script>
function goBack() {
    window.history.back();
}
</script>
           <!-- Title -->
           <span class="mdl-layout-title" style="margin-left:40px;">Current Report</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
<?php echo "$show";?>
         </div>
       </header>

       <main class="mdl-layout__content">
         <div class="page-content"><!-- Your content goes here -->

           <div class="mdl-grid">
             <div class="mdl-cell mdl-cell--2-col"></div>
         <div class="mdl-cell mdl-cell--8-col">
           <table style="width:100%">
             <tr>
               <th>vehicle no</th>
                <th>current location</th>
               <th>status</th>
               <th>source</th>
               <th>destination</th>
             </tr>
          <?php echo "$vehicles"; ?>
           </table>
       </div>
<div class="mdl-cell mdl-cell--2-col"></div>

     </div>
       <button  id="printbtn" type="button" onclick="myFunction()"
       class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">
       <i class="material-icons">print</i></button>

       <script>
       function myFunction() {
           window.print();
       }
       </script>
       </div>
       </main>

      </div>

   </body>
 </html>
