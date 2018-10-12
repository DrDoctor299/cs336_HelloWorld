<?php 
session_start();
$num = $_POST['num'];
$op = $_POST['operator'];
$hist = $_POST['history'];
?>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <div>
            <form action="index.php" method="POST">
                <div>
                    <?php
                    echo 'First Number<input type="text" name = "num[]" value="'.$num[0].'"> Second Number <input type="text" name = "num[]" value="'.$num[1].'">';
                    ?>
                </div>
                <div>
                    
                    <input type="radio" name="operator" id="addition" value="+"/>
                    <label for="addition">Addition</label>
                    
                    <input type="radio" name="operator" id="subtraction" value="-"/>
                    <label for="subtraction">Subtraction</label>
                    
                    <input type="radio" name="operator" id="multiplication" value="*"/>
                    <label for="multiplication">Multiplication</label>
                    
                    <input type="radio" name="operator" id="division" value="/"/>
                    <label for="division">Division</label>
                    
                </div>
                <div>
                    <input type="checkbox" name="history" id="rec" value="record"/>
                    <label for="rec">Record this equation in the annals of math history?</label>
                    <br>
                    <input type="submit" value="CALCULATE"/>
                </div>
            
            
        </form>    
        </div>
        <div>
            <h1>RESULTS</h1>
            <div>
                <?php
                    if(($num[0] == NULL) && ($num[1] == NULL)){
                        echo "Please enter in two whole numbers<br>";
                    }
                    else if($num[0] == NULL) {
                        echo "Please enter in a value for the first number<br>";
                    }
                    else if($num[1] == NULL) {
                        echo "Please enter in a value for the second number<br>";
                    }
                    else {
                        if($op == "+") {
                            $result = $num[0] + $num[1];
                        }
                        else if ($op == "-") {
                            $result = $num[0] - $num[1];
                        }
                        else if ($op == "*") {
                            $result = $num[0] * $num[1];
                        }
                        else if ($op == "/") {
                            $result = $num[0] / $num[1];
                        }
                        else {
                            echo "Please select an operation to perform<br>";
                        }    
                    }
                    
                    // if(!isset($_POST['operator'])) {
                    //     echo "Please select an operation to perform<br>";
                    // }
                    
                    
                    if ($result == NULL) {
                        $result = "ERROR";
                    }
                    echo "RESULT: ".$result."<br>";
                    
                    ?>
            </div>
        </div>
        
    </body>
</html>

<?php

if ($hist == 'rec') {
    $currenteq = $num[0]." ".$op." ".$num[1]." = ".$result;
    array_push($_SESSION['eqHistory[]'], $currenteq);
}

echo "<ul>";
foreach ($_SESSION['eqHistory'] as $s) {
    echo "<li>".$s."</li>";
}
echo "</ul>";
?>