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
 ?>
