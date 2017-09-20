

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1> Silverjack </h1>
        <?php
        $deck = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $start = microtime(true);
        $suits = array("clubs","spades","hearts","diamonds");
        //get random number 0 to 51
        //get card until it goes past 35
        $pointTotal = 0;
        $names = array("Bob","Gillian","William","Dylan");
        $winner = -1;
        $winnerAmount = 0;
        for($i = 0; $i < 4;$i+=1)
        {
            $total = 0;
            $cardArr = array();
            while($total<35)
            {
                do{
                    $bool = false;
                    $temp = rand(0,51);
                    if($deck[$temp] == 1)
                    {
                        $bool = true;
                    } else {
                        $deck[$temp] = 1;
                    }
                }while($bool);
                
                $cardArr[] = $temp;
                $total = $total + ($temp%13) + 1; 
            }
            if($total > $winnerAmount && $total <= 42)
            {
                $winner = $i;
                $winnerAmount = $total;
            }
            echo "<h4>$names[$i]</h4>";
            for($ii = 0; $ii < count($cardArr);$ii+=1)
            {
                echo"<img src='cards/".$suits[floor($cardArr[$ii] / 13)]."/".(($cardArr[$ii] % 13) + 1).".png' alt = '".$suits[floor($cardArr[$ii] / 13)].(($cardArr[$ii] % 13) + 1)."'>";
            }
            echo "<p>$total</p>";
            $pointTotal = $pointTotal + $total;
            
        }
        echo "<p>$names[$winner] wins ".($pointTotal-$winnerAmount)." points!!</p>";
        
        
        
        //(($card % 13) + 1)
        //$suits[floor($card / 13)] 
        
        
        
        $elapsedSecs = microtime(true) - $start;
        echo $elapsedSecs . " secs";

        ?>
    </body>
</html>