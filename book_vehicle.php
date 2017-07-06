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
