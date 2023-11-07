<?php 

    // STARTING BALANCE OF PROGRAM 
    $balance = 0;
    // ITEMS USED THROUGHOUT THE PROGRAM 
    $workItems = ["Teeth", "Scissors", "Push Mower", "Drive Mower"];
    // STARTING WORKITEM 
    $currentItem = $workItems[0];

    // COST TO UPGRADE 
    $purchaseUpgrade = [5, 25, 50, 75];
    // UPGRADE STARTING POINT 
    $upgradeCost = $purchaseUpgrade[0];

    // INCOME AMOUNTS 
    $earnIncome = [1, 4, 10, 25 ];
    // INCOME STARTING POINTS 
    $currentIncome = $earnIncome[0];


    function work() {
        // ACCESS BALANCE VARIABLE 
        global $balance;
        // ACCESS CURRENT INCOME AMOUNT VARIABLE 
        global $currentIncome;

        // UPDATES BALANCE BY ADDING THE CURRENT INCOME TO THE CURRENT BALANCE 
        $balance = $balance + $currentIncome;

        echo "You decided to cut some grass and you earned $" . $currentIncome . "! \n";

        echo "Do you want to go home for the day or cut more grass? \n";

        echo "Press S to stay or H for home \n";

        // USER INPUT ON IF THEY WANT TO STAY OR LEAVE 
        $stayOrLeave = trim(fgets(STDIN));

        // IF THE USER DECIDES TO STAY 
        if ($stayOrLeave == "S") {
            // RUN THE WORK() AGAIN 
            work();
        // IF USER DECIDES TO LEAVE 
        } else {
            echo "Your current balance is $" . $balance . "\n";
            echo "You go home, eat, sleep, and before you can enjoy yourself, it's time to go back to work. \n";
        }


        
    }

    function accessStore() {
        // ACCESS THE CURRENT ITEM VARIABLE 
        global $currentItem;
        // ACCESS THE CURRENT BALANCE 
        global $balance;


        echo "Welcome to the shop! \n";
        echo "Would You like to upgrade your tool? \n";
        // DO YOU WANT TO UPGRADE YOUR TOOL? 
        echo "Press 'Y' for yes and 'N' for no \n";
        // USER RESPONSE 
        $upgradeResponse = trim(fgets(STDIN));

        // IF ITEM NEEDS TO BE UPGRADED 
        if ($upgradeResponse == 'Y') {
            global $workItems;
            global $balance;
            global $upgradeCost;
            global $earnIncome;
            global $currentIncome;

            if ($balance < $upgradeCost) {
                echo "You do not have enough money! Your balance is $" . $balance . " and you need $" . $upgradeCost . " for this upgrade \n";
            } else {
                echo "Your previous item was $currentItem. \n";
                // Get the index of $currentItem in $workItems
                $currentItemIndex = array_search($currentItem, $workItems);

                // GET THE INDEX OF $CURRENTINCOME FROM $EARNINCOME 
                $currentIncomeIndex = array_search($currentIncome, $earnIncome); 

                // Check if $currentItem is not the last item in $workItems
                if ($currentItemIndex !== false && $currentItemIndex < count($workItems) - 1) {
                    // Move to the next item in $workItems
                    $currentItem = $workItems[$currentItemIndex + 1];

                    //Move to next item in $earnIncome
                    echo "Your current Item is now $currentItem. \n";
                    $currentIncome = $earnIncome[$currentIncomeIndex + 1];
                }
            }
        }
    }

    // STARTING FUNCTION 
    function workOrStore() {
        global $currentItem;
        global $balance;

        // WORK OR ACCESS THE STORE? 
        echo "Press W to work or S to shop \n";
        // USER RESPONSE 
        $openStore = trim(fgets(STDIN));
    
        // IF STORE IS ACCESSED 
        if ($openStore == "S" ) {
            accessStore();
        } else {
            work();
        }


        
        if ($balance < 1000) {
            workOrStore();
        } else {
            echo "Congratz on earning $" . $balance . "! You have won the game!";
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