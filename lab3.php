

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <h1> Silverjack </h1>
        <?php
        $deck = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $start = microtime(true);
        $suits = array("clubs","spades","hearts","diamonds");
        //get random number 0 to 51
        //get card until it goes past 35
        $pointTotal = 0;
        $names = array("Bob","Gillian","William","Dylan","Ted","Mike","Norman");
        shuffle($names);
        $winner = array(-1,-1,-1,-1);
        $j = 0;
        $winnerAmount = 0;
        for($i = 0; $i < 4;$i+=1)
        {
            echo "<div class='player'>";
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
                $winner = array(-1,-1,-1,-1);
                $winner[0] = $i;
                $winnerAmount = $total;
                $j = 1;
            }
            
            
            else if($total == $winnerAmount)
            {
                $winner[$j] = $i;
                $j++;
            }
            echo "<div class='people'>";
            echo "<img src='img/$names[$i].jpg' style='width:150px;height:150px;' />";
            echo "<h4>$names[$i]</h4>";
            echo "</div>";
            echo "<div class='cards'>";
            for($ii = 0; $ii < count($cardArr);$ii+=1)
            {
                echo"<img src='cards/".$suits[floor($cardArr[$ii] / 13)]."/".(($cardArr[$ii] % 13) + 1).".png' alt = '".$suits[floor($cardArr[$ii] / 13)].(($cardArr[$ii] % 13) + 1)."'>";
            }
            echo "</div>";
            echo "<p>$total</p>";
            $pointTotal = $pointTotal + $total;
            echo "</div>";
        }
        
        echo "<p>$names[$winner] wins ".($pointTotal-$winnerAmount)." points!!</p>";
        $winnerNames = $names[$winner[0]];
        for($i = 1 ; $i < $j; $i++)
        {
            $winnerNames .=  " And " . $names[$winner[$i]]; 
        }
        
        echo "<p>$winnerNames wins ".($pointTotal-($winnerAmount*$j))." points!!</p>";
        
        
       
        
        
        
        $elapsedSecs = microtime(true) - $start;
        echo $elapsedSecs . " secs";

        ?>
    </body>
</html>