
<?php
//Our custom function.
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
 
 ?>
