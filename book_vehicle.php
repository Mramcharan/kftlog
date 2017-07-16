<?php include "mysql_connection.php" ?>
<?php
if(isset($_POST['vehicle'])){
  $vehicle = $_POST['vehicle'];
  $from = $_POST['from'];
  $to = $_POST['to'];
$sqll = "UPDATE  vehicles SET source='$from',destination='$to',status='booked' WHERE vehicleno = '$vehicle'";


if ($conn->query($sqll) === TRUE) {
  echo "booked successfully";
  $note = "INSERT INTO notifications (vehicleno,status) VALUES ('$vehicle','booked')";
  if ($conn->query($note) === TRUE) {
  }else{

  }
  header('location:index.php');

} else {
echo "Error: " . $sqll . "<br>" . $conn->error;}

$conn->close();

}else{

}

?>
<?php
$lat = 18.691659;
$lng = 79.297317;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Booking</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-deep_orange.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {

  $( ".skills" ).autocomplete({
    source: 'search.php'
  });

});
</script>

<style>

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
          <span class="mdl-layout-title" style="margin-left:40px;">Book Vehicle</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation. We hide it in small screens. -->

        </div>
      </header>

      <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->

          <div class="mdl-grid">


        <div class="mdl-cell mdl-cell--12-col">
          <form action="book_vehicle.php" method="post">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input skills" type="text"  id="vehicle" name="vehicle">
              <label class="mdl-textfield__label" for="vehicle" >Vehicle NO.</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="from" name="from">
              <label class="mdl-textfield__label" for="from" >FROM</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="to" name="to">
              <label class="mdl-textfield__label" for="to" >TO</label>
            </div>
              <button type="submit"
                style="margin-left:20px;"
              class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">SUBMIT</button>

            </form>
            <div id="googleMap" style="width:100%;height:500px;border:1px solid black;"></div>
            <script>

            function myMap() {
              latt =  <?php echo $lat; ?>;
              lngg = <?php echo $lng; ?>;

              var myLatLng = {lat:latt, lng:lngg};


              var map = new google.maps.Map(document.getElementById('googleMap'), {
                zoom: 11,
                center: myLatLng
              });


            }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD33CutqDu6hBBIMpE2dVZgA6S-bupnI30&callback=myMap"></script>


      </div>


      </main>

     </div>

  </body>
</html>
