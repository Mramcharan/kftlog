<?php include "mysql_connection.php" ?>
<?php
function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}

//If I want a 4-digit PIN code.
$pin = generatePIN();
echo $pin, '<br>';


if(isset($_POST['driver'])){
  //Our custom function.

  $driver = $_POST['driver'];
  $mob = $_POST['mob'];



  $sql = "INSERT INTO drivers (driver_name,pin,now_driving,mobile_no)
  VALUES ('$driver','$pin','','$mob')";

  if ($conn->query($sql) === TRUE) {
     echo "New driver entered  successfully";
     header('location:drivers.php');
  } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
     $conn->close();
  }

}else{

}

?>
