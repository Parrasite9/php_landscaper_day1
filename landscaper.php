<?php 

    $balance = 0;


    echo "Start Mowing! \n";
    echo "Press 1 to start chewing the grass!";

    $response = trim(fgets(STDIN));

    if ($response == 1) {
        $balance++;
        echo "You now have $" . $balance;
    }


?>