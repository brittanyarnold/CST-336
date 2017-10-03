<?php
        $ballCount = 5;
        $megaBallVal = rand(1, 27);
        $greet = "";
    
        $lottoPicks = array();
        
        for ($i = 0; $i < $ballCount; $i++) { 
            $regBallVal = rand(1, 47); 
            while(in_array($regBallVal,$lottoPicks)) { 
                $regBallVal = rand(1, 47);
            } 
            array_push($lottoPicks, $regBallVal); 
        }
        
        sort($lottoPicks); //sorts lotto #s in ascensing order
        
        $lottoPicks[5] = $megaBallVal;
        
        echo "<div id='pick1'>".$lottoPicks[0]."</div>"; 
        echo "<div id='pick2'>".$lottoPicks[1]."</div>"; 
        echo "<div id='pick3'>".$lottoPicks[2]."</div>"; 
        echo "<div id='pick4'>".$lottoPicks[3]."</div>";  
        echo "<div id='pick5'>".$lottoPicks[4]."</div>"; 
        
        echo "<table id='mega'>";
        echo "<th id='theader'>MEGA NUMBER: </th>";
        echo "<tr><td id='number'>".$lottoPicks[5]."</td>";
        echo "</table>";
        
        $randGreet = rand(1, 4);
        
        function displayGreet($randGreet) {
            switch($randGreet) {
                case 1: $greet = "Good Luck!";
                    break;
                case 2: $greet = "Hope You Win!";
                    break;
                case 3: $greet = "Could Today Be Your Lucky Day?";
                    break;
                case 4: $greet = "You Could Be A Millionaire!";
                    break;
            }
            echo "<div id='greet'>".$greet."</div>";
        }
        
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<title> Brittany's Lotto Picker </title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        displayGreet($randGreet);
        ?>
        <form>
            <input type="submit" value="Get New Numbers!" />
        </form>
        
        <footer>
			<hr>
			DISCLAIMER: MEANT FOR ACADEMIC PURPOSES ONLY! CST 336 Internet Programming. 2017&copy; Arnold<br />
			<figure>
				<img src="img/logo.png" alt="Picture of CSUMB logo" />
			</figure>
		</footer>
    </body>
</html>