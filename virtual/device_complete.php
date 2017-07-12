<?php include "../mysql_connection.php" ?>
<?php
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
        case 'D':
          $status = 'Emergency';
          break;
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
$sqll = "UPDATE  vehicles SET status='$status' WHERE vehicleno = '$veh'";

if ($conn->query($sqll) === TRUE) {
  echo "status updated";

  header('location:../drivers.php');

} else {
echo "Error: " . $sqll . "<br>" . $conn->error;
}


 ?>
