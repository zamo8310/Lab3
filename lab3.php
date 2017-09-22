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
        session_start(); // start session
     
        $deck = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $start = microtime(true);
        $suits = array("clubs","spades","hearts","diamonds");
        //get random number 0 to 51
        //get card until it goes past 35
        $pointTotal = 0;
        $names = array("Bob","Gillian","William","Dylan");
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
        
        $winningPoints = ($pointTotal-($winnerAmount*$j));
        
        $winnerNames = $names[$winner[0]];
        if(!isset($_SESSION[$names[$winner[$i]] ]))
        {
                $_SESSION[$names[$winner[$i]] ] = $winningPoints;
        }
        else
        {
                 $_SESSION[$names[$winner[$i]] ] = $winningPoints +  $_SESSION[$names[$winner[$i]] ];
        }
        for($i = 1 ; $i < $j; $i++)
        {
            if(!isset($_SESSION[$names[$winner[$i]] ]))
            {
                $_SESSION[$names[$winner[$i]] ] = $winningPoints;
            }
            else
            {
                 $_SESSION[$names[$winner[$i]] ] = $winningPoints +  $_SESSION[$names[$winner[$i]] ];
            }
            $winnerNames .=  " And " . $names[$winner[$i]]; 
        }
        
        
        
        echo "<p>$winnerNames wins " . $winningPoints ." points!!</p>";
        
         for($i = 0 ; $i < 4; $i++)
        {
            if(isset($_SESSION[$names[$winner[$i]] ]))
            {
                if( $_SESSION[$names[$winner[$i]]]  >= 500)
                {
                    echo "<p>".$names[$winner[$i]] .  "Is the Real Winner.</p>";
                }
               echo "<p>".$names[$winner[$i]] . $_SESSION[$names[$winner[$i]] ]."</p>";
                
               
            }
            else
            {
              echo "<p>".$names[$winner[$i]] . 0 ."</p>";
            }
           
        }
        
       
        
        
        
        $elapsedSecs = microtime(true) - $start;
        echo $elapsedSecs . " secs";

        ?>
    </body>
</html>