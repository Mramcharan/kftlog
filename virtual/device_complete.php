<?php
$pin = $_POST['pin'];
$status = $_POST['status'];

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
 ?>
