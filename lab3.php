<?php
$start = microtime(true);
$deck = range(0,51);  //creates array with values 1 to 52

//get random number 0 to 51
//get card until it goes past 35

$suits = array("clubs","spades","hearts","diamonds");

//(($card % 13) + 1)
//$suits[floor($card / 13)] 



$elapsedSecs = microtime(true) - $start;
echo $elapsedSecs . " secs";

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1> Silverjack </h1>
    </body>
</html>