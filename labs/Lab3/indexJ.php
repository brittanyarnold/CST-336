<?php 
            global $deck;
            global $person1;
            global $person2;
            global $person3;
            global $person4;
        
            function mapNumberToCard($num) {
                $cardValue = ($num % 13) + 1; 
                $cardSuit = floor($num / 13); 
                $suitStr = ""; 
                switch($cardSuit) {
                    case 0: 
                        $suitStr = "clubs"; 
                        break; 
                    case 1: 
                        $suitStr = "diamonds"; 
                        break; 
                    case 2: 
                        $suitStr = "hearts"; 
                        break; 
                    case 3: 
                        $suitStr = "spades"; 
                        break; 
                }
                $card = array(
                    'num' => $cardValue, 
                    'suit' => $cardSuit, 
                    'imgURL' => "./cards/".$suitStr."/".$cardValue.".png"
                    ); 
                return $card; 
            }
        
            function generateDeck() {
                $cards = array(); 
                for ($i = 0; $i < 52; $i++) {
                    array_push($cards, $i); 
                }
                shuffle($cards); 
                return $cards; 
            }
        
            function calculateHandValue($cards) {
                $sum = 0; 
                foreach ($cards as $card) { 
                    $sum += $card["num"]; 
                }
                return $sum; 
            }
        
            // function that generates a "hand" of cards for one person (no duplicates)
            function generateHand() {
                $hand = array(); 
                global $deck;
                do {
                    $cardNum = array_pop($deck);
                    $card = mapNumberToCard($cardNum); 
                    array_push($hand, $card); 
                } while (calculateHandValue($hand)<42);
                return $hand; 
            }
        

            function players() {
                $playerPic = rand(1, 13); 
                $playerName = ""; 
                global $deck;
            
                switch($playerPic) {
                    case 1: 
                        $playerName = "Butters"; 
                        break; 
                    case 2: 
                        $playerName = "Professor Chaos"; 
                        break; 
                    case 3: 
                        $playerName = "Ike"; 
                        break; 
                    case 4: 
                        $playerName = "Jesus"; 
                        break; 
                    case 5: 
                        $playerName = "Bebe"; 
                        break; 
                    case 6: 
                        $playerName = "Pete"; 
                        break; 
                    case 7:
                        $playerName = "Cartman"; 
                        break; 
                    case 8:
                        $playerName = "Jimmy"; 
                        break; 
                    case 9:
                        $playerName = "Kenny"; 
                        break; 
                    case 10:
                        $playerName = "Kyle"; 
                        break; 
                    case 11:
                        $playerName = "Stan"; 
                        break; 
                    case 12:
                        $playerName = "Randy"; 
                        break; 
                    case 13:
                        $playerName = "Santa"; 
                        break; 
                }
                $profile = array(
                    'name' => $playerName, 
                    'imgURL' => "./profile_pics/".$playerPic.".png",
                    'cards' => generateHand($deck)
                ); 
                return $profile; 

            }
            function displayPerson($person) {
                echo "<table id='person'>";
                echo "<tr>";
                echo "<td id='pic'>";
                echo "<img src='".$person["imgURL"]."'>"; // show profile pic
                echo $person["name"];
                echo "</td>";
                for($i = 0; $i < count($person["cards"]); $i++) { // iterate through $person's "cards"
                    echo "<td id='hand'>";
                    $card = $person["cards"][$i];
                    echo "<img src='".$card["imgURL"]."'>"; // construct the imgURL for each card and translate this to HTML 
                    echo "</td>";
                }
                echo "<td id='score'>";
                echo calculateHandValue($person["cards"]).'<br>';
                echo "</td>";
                echo "</tr>";
                echo "</table>";
            }
            
            function displayWinner() {
                        global $person1;
                        global $person2;
                        global $person3;
                        global $person4;
                        
                        $score1 = calculateHandValue($person1["cards"]);
                        $score2 = calculateHandValue($person2["cards"]);
                        $score3 = calculateHandValue($person3["cards"]);
                        $score4 = calculateHandValue($person4["cards"]);
                        $totalScore = $score1 + $score2 + $score3 + $score4;
                        
                if ($score1 <= 42 && ($score1 > $score2 || $score2 > 42)  && ($score1 > $score3 || $score3 > 42) && ($score1 > $score4 || $score4 > 42)) 
                    {
                    echo "<div id='winner'>".$person1["name"]. " wins ".$totalScore." points!</div>";
                    }
                 else if ($score2 <= 42 && ($score2 > $score1 || $score1 > 42) && ($score2 > $score3 || $score3 > 42)  && ($score2 > $score4 || $score4 > 42)) 
                    {
                        echo "<div id='winner'>".$person2["name"]. " wins ".$totalScore." points!</div>";
                    }
                 else if ($score3 <= 42 && ($score3 > $score1 || $score1 > 42) && ($score3 > $score2 || $score2 > 42) && ($score3 > $score4 || $score4 > 42)) 
                    {
                        echo "<div id='winner'>".$person3["name"]. " wins ".$totalScore." points!</div>";
                    }
                 else if ($score4 <= 42 && ($score4 > $score1 || $score1 > 42) && ($score4 > $score2 || $score2 > 42) && ($score4 > $score3 || $score3 > 42))
                    {
                        echo "<div id='winner'>".$person4["name"]. " wins ".$totalScore." points!</div>";
                    }
                 else if($score1 > 42 && $score2 > 42 && $score3 > 42 && $score4 > 42)
                    {
                        echo "<div id='winner'>"."No Winners This Round!"."</div>";
                }
                
            }    
                
            
        ?>

<!DOCTYPE html>
<html>
      <head>
		<meta charset="utf-8" />
		<title> SilverJack </title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
	</head>
    <body>
        <h1>SILVERJACK</h1>
        <?php
        $deck = generateDeck(); 
            
            for($i = 1; $i < 5; $i++) {
                ${"person" . $i} =players();
                displayPerson(${"person" . $i}); 
                }
            
       
            displayWinner();
            ?>
        <form id='playAgain'>
            <input type="submit" value="Play Again!" />
        </form>
         <footer>
			<hr>
			For Academic Purposes Only! CST 336 Internet Programming. 2017&copy; Arnold, Diesh, Ortiz Medina, Welch<br />
		</footer>
    </body>
</html>