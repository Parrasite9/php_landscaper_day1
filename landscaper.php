<?php 

    // STARTING BALANCE OF PROGRAM 
    $balance = 0;
    // ITEMS USED THROUGHOUT THE PROGRAM 
    $workItems = ["teeth", "scissors"];
    // STARTING WORKITEM 
    $currentItem = $workItems[0];

    // STARTING FUNCTION 
    function workOrStore() {
        global $currentItem;

        // WORK OR ACCESS THE STORE? 
        echo "Press W to work or S to shop \n";
        // USER RESPONSE 
        $openStore = trim(fgets(STDIN));
    
        // IF STORE IS ACCESSED 
        if ($openStore == "S" ) {
            echo "Welcome to the shop! \n";
            echo "Would You like to upgrade your tool? \n";
            // DO YOU WANT TO UPGRADE YOUR TOOL? 
            echo "Press 'Y' for yes and 'N' for no \n";
            // USER RESPONSE 
            $upgradeResponse = trim(fgets(STDIN));
    
            // IF ITEM NEEDS TO BE UPGRADED 
            if ($upgradeResponse == 'Y') {
                global $workItems;

                echo "Your current item was $currentItem. \n";
                // Get the index of $currentItem in $workItems
                $currentIndex = array_search($currentItem, $workItems);
            
                // Check if $currentItem is not the last item in $workItems
                if ($currentIndex !== false && $currentIndex < count($workItems) - 1) {
                    // Move to the next item in $workItems
                    $currentItem = $workItems[$currentIndex + 1];
                    echo "Your current Item is now $currentItem. \n";
                }
            }
            
        } 
    }

    workOrStore();


//     echo "Start Mowing! \n";
//     echo "Press 1 to start chewing the grass!";

//     $response = trim(fgets(STDIN));

//     if ($response == 1) {
//         $balance++;
//         echo "You now have $" . $balance;
//     }


// ?>