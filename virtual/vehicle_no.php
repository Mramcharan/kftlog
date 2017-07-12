<?php include "mysql_connection.php" ?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
$(function() {
  $( ".skills" ).autocomplete({
    source: '../search.php'
  });
});
</script>

<form method='post' action="device.php">
  <label for="vehicle">Vehicle Number</label>
  <input class="skills" type="text" name="veh" id='vehicle' value="">
  <input type="submit" value='submit' />


</form>
