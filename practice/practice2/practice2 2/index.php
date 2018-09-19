<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        
        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<script>
function refreshPage(){
    window.location.reload();
} 
</script>

<body>


    


    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <button type="submit"  onClick="refreshPage()">Play Again!</button>
    
    <?php
    
    
    $randomValue;
    $randomValue1;
    $p1Score = 0;
    
    
   
    
    
    for($t = 0;$t < 3;$t++) {
        if(randChoice() == 1) {
            $p1Score++;
        }
        
    }
    
    if($p1Score >= 2) {
        echo "<h1>Player 1 is a winner!</h1>";
    }
    else {
        echo "<h1>Player 2 is a winner!</h1>";
    }
    
    
    
    function randChoice() {
        
        $randomValue = rand(0,2);
        $randomValue1 = rand(0,2);
        
        while($randomValue == $randomValue1) {
            $randomValue = rand(0, 2);
        }
        
        switch($randomValue) {
            case 0: $symbol = "paper";
                    break;
            case 1: $symbol = "rock";
                    break;
            case 2: $symbol = "scissors";
                    break;
        }
        
        switch($randomValue1) {
            case 0: $symbol2 = "paper";
                    break;
            case 1: $symbol2 = "rock";
                    break;
            case 2: $symbol2 = "scissors";
                    break;
        }
        
        echo "<div class='row'>
        <div class='col";
        if(winFind($randomValue, $randomValue1) == 1) {
            echo ", matchWinner";
            
            
            
            
        }
        
        echo "'><img src='./rps/$symbol.png' alt='$symbol' width='150'></div>";
        
        echo "<div class='col";
        
        if(winFind($randomValue, $randomValue1) == 2) {
            echo ", matchWinner";
        }
        echo "'><img src='./rps/$symbol2.png' alt='$symbol2' width='150'></div>
    </div>
    <hr>";
        
        return winFind($randomValue, $randomValue1);
        
    }
    // paper rock scissors
    // 0 > 1 > 2 > 0
    function winFind($p1, $p2) {
        
        
        
        if(($p1 == 0 && $p2 == 2) || ($p1 == 2 && $p2 == 0)) {
            if($p1 == 0)
            {
                
                return 2;
            }
            else {
                
                return 1;
            }
        }
        else {
            if($p1 < $p2) {
                
                return 1;
            }
            else {
                return 2;
            }
        
        }
        
    }
    
    
    
    ?>
    
    
    
    

    
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
