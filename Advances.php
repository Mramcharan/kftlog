<?php include "mysql_connection.php" ?>
<?php
$list = "";
$sql = "SELECT * FROM advance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $destination = $row["destination"];
      $ten = $row["ten_tyres"];
       $twelve= $row["twelve_tyres"];
      $three = $row["three"];
      $four = $row["four"];
      $four_two = $row["four_two"];

      $list .= "<tr>
        <td class='mdl-data-table__cell--non-numeric'>$destination</td>
        <td>$ten</td>
        <td>$twelve</td>
        <td>$three</td>
        <td>$four</td>
        <td>$four_two</td>
        <td><i class='material-icons' style='color:orange;'>mode_edit</i></td>
        <td><i class='material-icons' style='color:red;'>clear</i></td>
      </tr>
";
    }
} else {
    echo "0 results";
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
    <style>

    .demo-list-item {
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
              <span class="mdl-layout-title" style="margin-left:40px;">Advance</span>
              <!-- Add spacer, to align navigation to the right -->
              <div class="mdl-layout-spacer"></div>
              <!-- Navigation. We hide it in small screens. -->
            </div>

          </header>

          <main class="mdl-layout__content">
            <div class="page-content"><!-- Your content goes here -->


              <h4>KESORAM CEMENTS (BULKERS)  ADVANCE</h4>
              <div class="mdl-grid">

    <div class="mdl-cell mdl-cell--12-col">
      <table style="widht:100%" class="mdl-data-table mdl-js-data-table">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Destination</th>
            <th>10 tyres</th>
            <th>12 tyres</th>
            <th>3516/3718</th>
            <th>4018</th>
            <th>4921/4923</th>
            <th>Edit</th>
            <th>Remove</th>
          </tr>
        </thead>


      <?php echo $list; ?>
        <table>
    </div>
  </div>
  <button  id="show-dialog" type="button"
  class="mdl-button mdl-js-button mdl-button--fab mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">
  <i class="material-icons">add</i></button>
  <div class="mdl-tooltip mdl-tooltip--large" data-mdl-for="show-dialog">
  Book vehicle
  </div>
  <dialog class="mdl-dialog" id="dialog1">
    <form action="book_vehicle.php" method="post">
      <p>Add Advance :</p>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text"  id="destination" name="destination">
        <label class="mdl-textfield__label" for="destination" >destination</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text"  id="one" name="one">
        <label class="mdl-textfield__label" for="one" >10 tyres</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text"  id="two" name="two">
        <label class="mdl-textfield__label" for="two" >12 tyres</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text"  id="three" name="three">
        <label class="mdl-textfield__label" for="three" >3516/3718</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text"  id="four" name="four">
        <label class="mdl-textfield__label" for="four" >4018</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text"  id="five" name="five">
        <label class="mdl-textfield__label" for="five" >4921/4923</label>
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


          </div>
          </main>

         </div>

      </body>
    </html>
