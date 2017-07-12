
<?php include "mysql_connection.php" ?>
<?php
$drivers = "";
$sql = "SELECT * FROM drivers ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $driver_name  = $row["driver_name"];
      $pin = $row["pin"];
      $id = $row["id"];
      $mob = $row['mobile_no'];
      $drivers .= "<tr>
      <td class='mdl-data-table__cell--non-numeric'>$id</td>
      <td class='mdl-data-table__cell--non-numeric'><a href='#'>$driver_name</a></td>
      <td>$pin</td>
      <td class='mdl-data-table__cell--non-numeric'> - </td>
      <td>$mob</td>

      </tr>";
    }
} else {
    echo "0 results";
}

 ?>








 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>drivers list</title>
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
           <span class="mdl-layout-title" style="margin-left:40px;">Drivers List</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->

         </div>
       </header>

       <main class="mdl-layout__content">
         <div class="page-content"><!-- Your content goes here -->
           <div class="mdl-grid">
             <div class="mdl-cell mdl-cell--4-col"></div>
         <div class="mdl-cell mdl-cell--4-col">
           <table class="mdl-data-table mdl-js-data-table" style="width:100%;">
       <thead>
       <tr>
       <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">perm_identity</i>ID</b></th>
       <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">account_circle</i>Driver Name</b></th>
       <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">vpn_key</i>pin</b></th>
        <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">airline_seat_recline_normal</i>now driving</b></th>
        <th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons">phone</i>mobile no.</b></th>

       </tr>
       </thead>
       <tbody>
         <?php echo "$drivers" ?>

       </tbody>
       </table>
       </div>
<div class="mdl-cell mdl-cell--4-col"></div>

     </div>
       <button  id="show-dialog" type="button"
       class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">
       <i class="material-icons">person_add</i></button>
       <dialog class="mdl-dialog">
         <p>ADD NEW DRIVER</p>
           <form method="post" action="pin_generator.php">
         <div class="mdl-dialog__content">

           <label for="driver">Driver Name :</label>
           <input type="text" id="driver" name='driver' /><br />
           <label for="mob">Mobile No. :</label>
           <input  id="mob" name='mob' /><br />
         </div>
         <div class="mdl-dialog__actions">
           <button type="submit" class="mdl-button">submit</button>
           <button type="button" class="mdl-button close">CLOSE</button>
         </div>
       </form>
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
