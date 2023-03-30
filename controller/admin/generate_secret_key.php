<?php
    $random_string = '';
    for($i = 0; $i < 8; $i++) {
        $number = random_int(0, 36);
        $character = base_convert($number, 10, 36);
        $random_string .= $character;
    }
    
    echo $random_string;
?>