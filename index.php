
<?php include "mysql_connection.php" ?>
<?php
// should run for each vehicle in the list
// and update each vehicles currentlocation
$deal_lat=18.704762;
$deal_long=79.416678;
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$deal_lat.','.$deal_long.'&sensor=false');

       $output= json_decode($geocode);

   for($j=0;$j<count($output->results[0]->address_components);$j++){
              $cn=array($output->results[0]->address_components[$j]->types[0]);
          if(in_array("administrative_area_level_2", $cn))
          {
           $cloc= $output->results[0]->address_components[$j]->long_name;
          }
           }
           $sqll = "UPDATE  vehicles SET currentlocation='$cloc' ";

           if ($conn->query($sqll) === TRUE) {
           }else{

           }

?>
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
      <td class='mdl-data-table__cell--non-numeric'>
      <a href='specific.php?v=$vehicle_no'
      title='owner name :$ownername &#13; truck speed:$speed km/hr'>$vehicle_no</a></td>
      <td class='mdl-data-table__cell--non-numeric'><b>$current_location</b></td>
      <td class='mdl-data-table__cell--non-numeric'>$status</td>
      <td class='mdl-data-table__cell--non-numeric'>$source</td>
      <td class='mdl-data-table__cell--non-numeric'>$destination</td>
      </tr>";
    }
} else {
    echo "0 results";
}

 ?>


<?php
//notifications Count


$countsql = "SELECT id FROM notifications";
$result2 = $conn->query($countsql);

if ($result2->num_rows > 0) {
    // output data of each row
    $i=0;
    while($row = $result2->fetch_assoc()) {

      $id=$row['id'];
    $i++;
    }

} else {
$i=0;
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>kft logistics</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-pink.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.css">
<script defer src="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.js"></script>


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
<script type="text/javascript">

$('.search_it').keypress(function (e) {
  if (e.which == 13) {
    $('form.search').submit();
    return false;    //<---- Add this line
  }
});
</script>

<style>
.demo-list-icon {
  width: 300px;
}
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

form{
  padding: 20px;
}
.ic{
  color:teal;
}
::-webkit-scrollbar {
    display: none;
}

</style>




  </head>
  <body>


    <!-- Simple header with scrollable tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">KFT LOGISTICS</span>
          <div class="mdl-layout-spacer"></div>
          <form class="search" action="specific.php" method="get">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                      mdl-textfield--floating-label mdl-textfield--align-right">
            <label class="mdl-button mdl-js-button mdl-button--icon"
                   for="fixed-header-drawer-exp" title="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">

  <input   class="mdl-textfield__input search_it skills" type="text" name="v"
         id="fixed-header-drawer-exp" />
            </div>

          </div>
          </form>
          <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="notifications.php" id="tt1"><i class="material-icons mdl-badge mdl-badge--overlap" data-badge="<?php echo $i; ?> ">notifications</i></a>
        <div class="mdl-tooltip" data-mdl-for="tt1">
        Notifications
        </div>
      </nav>
      <!-- Right aligned menu below button -->
<button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item" id='addnewveh'>Add Vehicle</li>
  <li onclick="javascript:location.reload(true)" class="mdl-menu__item">Refresh</li>
  <li class="mdl-menu__item">Logout</li>
</ul>
<div class="mdl-tooltip mdl-tooltip--large" data-mdl-for="show-dialog">
Book vehicle
</div>
<dialog class="mdl-dialog" id='newvehicle'>

  <p>ADD NEW VEHICLE</p>
  <form method="post" action="add_new_vehicle.php">
  <div class="mdl-dialog__content">

    <label for="veh">Vehicle Number :</label>
    <input  id="veh" name="vehicle_no" /><br />
    <label for="imei">IMEI Number :</label>
    <input  id="imei" name="imei_no" /><br />
    <label for="owner">Owner Name :</label>
    <input  id="owner" name="owner_name" /><br />
    <label for="phone">phone :</label>
    <input  id="phone" name="phone" /><br />
  </div>
  <div class="mdl-dialog__actions">
    <button type="submit" class="mdl-button">SUBMIT</button>
    <button type="button" class="mdl-button close">CLOSE</button>
  </div>
</form>

</dialog>
<script>
  var dialog2 = document.querySelector('#newvehicle');
  var showDialogButton2 = document.querySelector('#addnewveh');
  if (! dialog2.showModal) {
    dialogPolyfill.registerDialog(dialog2);
  }
  showDialogButton2.addEventListener('click', function() {
    dialog2.showModal();
  });
  dialog2.querySelector('.close').addEventListener('click', function() {
    dialog2.close();
  });
</script>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
          <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Vehicles</a>
          <a href="#scroll-tab-2" class="mdl-layout__tab">Reports</a>
        </div>
      </header>
      <div class="mdl-layout__drawer">
   <span class="mdl-layout-title"> </span>
        <!-- Icon List -->


        <ul class="demo-list-icon mdl-list">
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            <i class="material-icons mdl-list__item-icon">people</i>
          <a href="drivers.php">Drivers</a>
        </span>
          </li>
        <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
            <i class="material-icons mdl-list__item-icon">border_color</i>
          <a href="bookings.php"> bookings</a>
          </span>
          </li>

        </ul>

      </div>
      <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
          <div class="page-content"><!-- Your content goes here -->
            <!-- Select with arrow-->
                    <div  style="float:right;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                        <input class="mdl-textfield__input" type="text" id="sample2" value="All" readonly tabIndex="-1">
                        <label for="sample2">
                            <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                        </label>
                        <label for="sample2" class="mdl-textfield__label">status</label>
                        <ul for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          <li class="mdl-menu__item">All</li>
                            <li class="mdl-menu__item">Booked</li>
                            <li class="mdl-menu__item">Loaded</li>
                            <li class="mdl-menu__item">Reported</li>
                            <li class="mdl-menu__item">Unloaded</li>
                            <li class="mdl-menu__item">Empty</li>

                        </ul>
                    </div>


            <div class="mdl-grid">

  <div class="mdl-cell mdl-cell--12-col">
    <table class="mdl-data-table mdl-js-data-table" style="width:100%;">
<thead>
<tr>
<th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons ic">directions_bus</i>Truck Number</b></th>
<th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons ic">place</i>Current Location</b></th>

<th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons ic">import_export</i>Status</b></th>
<th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons ic">flight_takeoff</i>Source</b></th>
<th class="mdl-data-table__cell--non-numeric"><b><i class="material-icons ic">flight_land</i>Destination</b></th>
</tr>
</thead>
<tbody>
  <?php echo "$vehicles" ?>
</tbody>
</table>
</div>
</div>
          </div>
        </section>

        <section class="mdl-layout__tab-panel" id="scroll-tab-2">
          <div class="page-content"><!-- Your content goes here -->

            <ul class="demo-list-item mdl-list">
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
              <a href="reports/current_report.php">Current Report</a>
                </span>
              </li>
              <!--  <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
              <a href="reports/unloaded_vehicles.php">Loaded Vehicles</a>
                </span>
              </li>
               <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  <a href="reports/unloaded_vehicles.php">Reported Vehicles</a>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                <a href="reports/unloaded_vehicles.php">Unloaded Vehicles</a>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
            <a href="reports/unloaded_vehicles.php">EMPTY Vehicles</a>
                </span>
              </li>-->
            </ul>



        </section>
<button  id="show-dialog" type="button"
class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">
<i class="material-icons">border_color</i></button>
<div class="mdl-tooltip mdl-tooltip--large" data-mdl-for="show-dialog">
Book vehicle
</div>
<dialog class="mdl-dialog" id="dialog1">
  <form action="book_vehicle.php" method="post">
    <p> Book Vehicle :</p>
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

    <div class="mdl-dialog__actions">
      <button type="submit" class="mdl-button">SUBMIT</button>
      <button type="button" class="mdl-button close">CLOSE</button>
    </div>
    </form>
</dialog>
<script>
  var dialog = document.querySelector('#dialog1');
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
<footer style="margin-top:200px;" class="mdl-mini-footer">
<div class="mdl-mini-footer__left-section">
<div class="mdl-logo">KFT LOGISTICS</div>
<ul class="mdl-mini-footer__link-list">
  <li><a href="virtual/vehicle_no.php">Virtual Device</a></li>
<!--  <li><a href="#"></a></li>-->
</ul>
</div>
</footer>
      </main>
    </div>

  </body>

</html>
