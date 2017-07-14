<?php include "mysql_connection.php" ?>
<?php

if(isset($_POST['vehicle_no'])){

  $vehicle_no = $_POST['vehicle_no'];
  $owner_name = $_POST['owner_name'];
  $imei_no =$_POST['imei_no'];
  $phone =$_POST['phone'];


  $sqllll = "INSERT INTO skills (skill)
  VALUES ('$vehicle_no')";

  if ($conn->query($sqllll) === TRUE) {
     echo "New record created successfully";
  } else {
     echo "Error: " . $sqllll . "<br>" . $conn->error;
     $conn->close();
  }


$sqlll = "INSERT INTO vehicles (vehicleno,imeino,ownername,currentlocation,speed,status,source,destination,phone)
VALUES ('$vehicle_no','$imei_no','$owner_name','-','','empty','-','-','$phone',)";


if ($conn->query($sqlll) === TRUE) {
   echo "New record created successfully";
   header('location:index.php');
} else {
   echo "Error: " . $sqlll . "<br>" . $conn->error;
   $conn->close();
}
}else{

}

?>
