

<?php include "../mysql_connection.php" ?>
<?php
  $prevstatus='';
$pin = $_POST['pin'];
$status = $_POST['status'];
$veh = $_POST['veh'];
switch($status){
  case 'A':
    $status = 'loaded';
    break;
    case 'B':
    $status = 'Reported';
      break;
      case 'C':
      $status = 'Unloaded';
        break;
}

if ($status == 'D'){

  $checksql = "SELECT status from vehicles WHERE vehicleno = '$veh'";

  $result = $conn->query($checksql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

    $status = $row['status'];
    $emergency = "E";
  }
  } else {
  echo "Error: " . $checksql. "<br>" . $conn->error;
  }
}

echo $pin;
echo $status;
echo $veh;
$sql = "UPDATE drivers SET now_driving='$veh' WHERE pin='$pin'";

if ($conn->query($sql) === TRUE) {
  echo "vehicle updated";

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$sqll = "UPDATE  vehicles SET status='$status',emergency='$emergency' WHERE vehicleno = '$veh'";

if ($conn->query($sqll) === TRUE) {
  echo "status updated";

  header('location:../index.php');

} else {
echo "Error: " . $sqll . "<br>" . $conn->error;
}


 ?>
