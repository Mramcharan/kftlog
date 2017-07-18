<?php include "mysql_connection.php" ?>


<?php
if(isset($_GET['v'])){
  $vehicle = $_GET['v'];
  $from = $_GET['source'];
  $to = $_GET['destination'];
$sqll = "UPDATE  vehicles SET source='$from',destination='$to',status='booked' WHERE vehicleno = '$vehicle'";


if ($conn->query($sqll) === TRUE) {
  echo "booked successfully<br/>";

  echo  "from - $from <br/>";
  echo "to - $destination <br/>";
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
