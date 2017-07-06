
<?php include "mysql_connection.php" ?>
<?php
if(isset($_GET['del'])){
  $del=$_GET['del'];

$delete = "DELETE  FROM notifications WHERE id= $del";

if ($conn->query($delete) === TRUE) {


} else {
    echo "Error deleting record: " . $conn->error;
}



}
?>
<?php
if(isset($_GET['delall'])){

  $deleteall = "DELETE  FROM notifications";

  if ($conn->query($deleteall) === TRUE) {


  } else {
      echo "Error deleting record: " . $conn->error;
  }


}

 ?>
<?php
$notify = "";
$sql = "SELECT notifications.id,notifications.vehicleno,notifications.status, vehicles.source,vehicles.destination
FROM notifications
INNER JOIN vehicles ON notifications.vehicleno = vehicles.vehicleno;
";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $vehicle_no = $row["vehicleno"];
      $status = $row["status"];
      $source = $row["source"];
      $destination = $row["destination"];
      $id=$row['id'];
      $notify .= "

      <div class='demo-card-wide mdl-card card mdl-shadow--2dp'>

        <div class='mdl-card__supporting-text'>
         <i class='material-icons' style='color:green;'>check_circle</i>
          <b>$vehicle_no</b> is $status
          FROM <b> $source  </b>  TO <b> $destination </b>
        </div>
        <div class='mdl-card__actions mdl-card--border'>
          <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
           <i class='material-icons'>phone</i> Call
          </a>
          <a href='notifications.php?del=$id' class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
         clear
          </a>

        </div>
        <div class='mdl-card__menu'>
          <a href='specific.php?v=$vehicle_no' class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'>
            <i class='material-icons'>info</i>
          </a>
        </div>
      </div>

      ";
    }
} else {

}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>notifications</title>
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

  .demo-card-wide.mdl-card {
  width: 100%;
  }
  .card{
      min-height: 10px;
      margin-bottom: 20px;
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
           <span class="mdl-layout-title" style="margin-left:40px;">Notifications</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->

         </div>
       </header>

       <main class="mdl-layout__content">
         <div class="page-content"><!-- Your content goes here -->

           <div class="mdl-grid">
 <div class="mdl-cell mdl-cell--3-col"></div>

         <div class="mdl-cell mdl-cell--6-col">


        <?php echo "$notify";?>

       </div>
        <div class="mdl-cell mdl-cell--3-col"></div>
</div>
       <button  id="show-dialog" type="button"
       class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">
       <i class="material-icons">clear</i></button>
       <dialog class="mdl-dialog">

         <div class="mdl-dialog__content">
           Are you sure to clear all notifications?
         </div>
         <div class="mdl-dialog__actions">
           <a href='notifications.php?delall=yes' type="button" class="mdl-button">YES</a>
           <button type="button" class="mdl-button close">NO</button>
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

       </main>

      </div>

   </body>
 </html>
