<!DOCTYPE html>
<html>
    <body>
        <?php 
            // for ($i = 0; $i < 9; $i++) {
            //     $randNumbers[$i] = rand(0,100);
            // }
            // for ($i = 0; $i < 9; $i++) {
            //     if ($randNumbers[$i]%2 == 0) {
            //         $evenOdd[$i] = "Even";    
            //     } else {
            //         $evenOdd[$i] = "Odd";
            //     }
            // }
            // for ($i = 0; $i < 9; $i++) {
            //     $sum = $sum + $randNumbers[$i];
            // }
            // $avg = $sum/9;
            $num = 3;
            $finalNum = 2 + $num++;
            print $finalNum;
            $finalNum = 2 + ++$num;
            print $finalNum;
            
            
        ?>
        <table>
            <tr>
                <td><var>randNumbers[0]</var></td>
                <td><var>evenOdd[0]</var></td>
            </tr>
                
        </table>
            
    </body>
</html>