
<?php include "../mysql_connection.php" ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>vehicles booked</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.4.0/balloon.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-pink.min.css" />
 <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
 <style>

 #show-dialog {
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
           <i onclick="goBack()" style="cursor:default" class="material-icons">arrow_back</i>
           <script>
function goBack() {
    window.history.back();
}
</script>
           <!-- Title -->
           <span class="mdl-layout-title" style="margin-left:40px;">Booked Vehicles</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->

         </div>
       </header>

       <main class="mdl-layout__content">
         <div class="page-content"><!-- Your content goes here -->

           <?php
           //showing booked vehicles list
           $booked_list = "";
           $sqll = "SELECT * FROM vehicles WHERE status = 'booked' ORDER BY id DESC ";
           $result = $conn->query($sqll);

           if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                 $vehicle_no = $row["vehicleno"];
                 $current_location = $row["currentlocation"];
                 $status = $row["status"];
                 $source = $row["source"];
                 $destination = $row["destination"];
                 $booked_list .= "<tr>
                 <td class='mdl-data-table__cell--non-numeric'>
                 <a
                 data-balloon='status:$status
                  Date&time:12/7/16 12:23
                  by:ramcharan'
                 data-balloon-length='large'  data-balloon-pos='right' href='../specific.php?v=$vehicle_no'>$vehicle_no</a>
           </td>
                 <td class='mdl-data-table__cell--non-numeric'>$current_location</td>
                 <td class='mdl-data-table__cell--non-numeric'>$source</td>
                 <td class='mdl-data-table__cell--non-numeric'>$destination</td>
                 </tr>";

               }
           } else {
               echo "0 results";
           }

            ?>



                      <div class="mdl-grid">

            <div class="mdl-cell mdl-cell--8-col">
              <table class="mdl-data-table mdl-js-data-table" style="width:100%;">
            <thead>
            <tr>
            <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">directions_bus</i>Truck Number</b></th>
            <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">place</i>Current location</b></th>
            <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">flight_takeoff</i>Source</b></th>
            <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">flight_land</i>Destination</b></th>
            </tr>
            </thead>
            <tbody>
            <?php echo "$booked_list" ?>

            </tbody>
            </table>
            </div>

            </div>
       <button  id="show-dialog" type="button"
       class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">
       <i class="material-icons">search</i></button>
       <dialog class="mdl-dialog">

         <div class="mdl-dialog__content">

         </div>
         <div class="mdl-dialog__actions">
           <button type="button" class="mdl-button">submit</button>
           <button type="button" class="mdl-button close">CLOSE</button>
         </div>
       </dialog>
       <script>
         var dialog = document.querySelector('dialog');
         var showDialogButton = document.querySelector('#show-dialog');
         if (! dialog.showModal) {
           dialogPolyfill.registerDialog(dialog);
         }
         showDialogButton.addEventListener('click', function() {
           dialog.showModal();
         });
         dialog.querySelector('.close').addEventListener('click', function() {
           dialog.close();
         });
       </script>
       </div>
       </main>

      </div>

   </body>
 </html>
