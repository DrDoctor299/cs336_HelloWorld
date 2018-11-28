<?php
$noMatch = false;
if(isset($_POST)) {
    if($_POST['password1'] != "" && $_POST['password2'] != ""){
        if($_POST['password1'] != $_POST['password2']) {
            global $noMatch;
            $noMatch = true;
        }
        else {
            header('Location: success.php');
        }
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign up
        </title>
        
        <!--import jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    </head>
    
    <body>
        <header>
            Please enter your information below:
        </header>
        
        <form method="post" action="index.php">
            <!--Username-->
            Enter Username: <br>
            <input type="text" name="username" id="username"> <br>
            <span style="color:red" id="usernameValidation"></span>  <br>

            
            <!--password-->
            Enter Password: <br>
            <input type="password" name="password1"> <br>
            Confirm password: <br>
            <input type="password" name="password2"> <br>
            <?php
            global $noMatch;
            if ($noMatch) {
                echo "Please retype password <br>";
            }
            ?>
            
            <!--zip-->
            Enter ZIP: <br>
            <input type="text" name="zip" id="zip"> <br>
            <div id="zipbased"></div>
            
            <!--state-->
            Enter State: <br>
            <input type="text" name="state" id="state"> <br>
            <div id="stateValid"></div>
            
            <!--county dropdown-->
            <div id="county">
                Select County: <br>
                <select id="countySelect">
                    <option value="invalidState">Select a state...</option>
                </select>
            </div>
            
            <!--Submit-->
            <br>
            <input type="submit" value="Sign Up!">
        </form>
        <script>
            //update username with validation message
            $("#username").change( function(){
                //alert($(this).val()); //showing the username entered, for testing purposes
                $.ajax({
                    type: "get",
                    url: "usernameLookup.php",
                    data: { "username": $(this).val()},
                    success: function(data,status) {
                        console.log(data);
                        if (data == "Available") {
                            $("#usernameValidation").html("Available!"); 
                            $("#usernameValidation").css("color","green");
                        }
                        else {
                            $("#usernameValidation").html("Username already taken!");         
                            $("#usernameValidation").css("color","red");
                        }
                    }    
                });
            });
            //update zipcode section with zipcode api
            $("#zip").change( function() {
                $.ajax({
                    type: "get",
                    url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                    //this refers to the #zip id (I think)
                    dataType: 'json',
                    data: { "zip": $(this).val()},
                    success: function(data,status) {
                        if(data == false) {
                            $('#zipbased').html("ZIP code not found<br>");
                        }
                        else {
                            console.log(data);
                            $('#zipbased').html("City: " + data.city + "<br>Longitude: " + data.longitude + "<br>Latitude: " + data.latitude + "<br>");
                        }
                        
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                        console.log(data);
                        //alert(status);
                    }
                });
            });
            //update
            $("#state").change( function() {
                $.ajax({
                    type: "get",
                    url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                    dataType: 'json',
                    data: { "state": $(this).val()},
                    success: function(data,status) {
                        if(data == false) {
                            $('#stateValid').html("Invalid state code (be sure to enter the two letter code)<br>");
                        } 
                        else {
                            $('#stateValid').html("");
                            $('#countySelect').html("<option value="+">Select a county...</option>");
                            for($i = 0; $i < data.length; $i++) {
                                $('#countySelect').append("<option value=" + data[$i].county + ">" + data[$i].county + "</option>");
                            }
                            console.log(data);
                        }
                    },
                    complete: function(data,status) {
                        console.log(data);
                    }
                });
            });

        </script>
    </body>
</html>