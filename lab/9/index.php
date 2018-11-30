<!--TODO: Styling-->

<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign up
        </title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <!--import jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    </head>
    
    <body>
        <header>
            <h1>Please enter your information below:</h1> <br>
        </header>
        
        <form method="post" action="index.php">
            <!--Username-->
            <div class="input">
                Enter Username: <br>
                <input type="text" name="username" id="username"> <br>
                <span style="color:red" id="usernameValidation"></span>  <br>
            </div>

            
            <!--password-->
            <div class="input">
                Enter Password: <br>
                <input type="password" name="password1" id="password1"> <br>
                Confirm password: <br>
                <input type="password" name="password2" id="password2"> <br>
                <span style="color:red" id="matchPasswords"></span>  <br>
            </div>
            <!--zip-->
            <div class="input">
                Enter ZIP: <br>
                <input type="text" name="zip" id="zip"> <br>
                <div id="zipbased"></div>
            </div>
            <!--state-->
            <div class="input">
                Enter State: <br>
                <input type="text" name="state" id="state"> <br>
                <div id="stateValid"></div>
            </div>
            
            <!--county dropdown-->
            <div class="input">
                <div id="county">
                    Select County: <br>
                    <select id="countySelect">
                        <option value="invalidState">Select a state...</option>
                    </select>
                </div>
            </div>
            
            <!--Submit-->
            <div class="input">
                <br>
                <input type="button" value="Sign Up!" id="submit">
            </div>
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
            //update county dropdown on entering a state
            $("#state").change( function() {
                $.ajax({
                    type: "get",
                    url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                    dataType: 'json',
                    data: { "state": $(this).val()},
                    success: function(data,status) {
                        if(data == false) {
                            $('#stateValid').html("Invalid state code (be sure to enter a two letter code)<br>");
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
            //Submit button - check passwords match and submit if they do
            $("#submit").click(function () {
                if ($("#password1").val() == $("#password2").val()) {
                    var data = {
                        "username": $("#username").val(),
                        "password": $("#password1").val(),
                        "state": $("#state").val(),
                        "zip": $("#zip").val(),
                        "county": $("#countySelect option:selected").val()
                    }   
            
                    console.log(JSON.stringify(data))
                    
                    $.ajax({
                            // The URL for the request
                            url: "success.php",
        
                            // Whether this is a POST or GET request
                            type: "POST",
        
                            // The type of data we expect back
                            // dataType: "json",
        
                            // contentType: "application/json",
        
                            data: JSON.stringify(data)
        
                        })
                        // Code to run if the request succeeds (is done);
                        // The response is passed to the function
                        .done(function(data) {
                            console.log(data);
        
                            // Do not do anything if there is no data
                            if (!data || data.length == 0) return;
                            
                            window.location.href = "success.php"
                        })
                        // Code to run if the request fails; the raw request and
                        // status codes are passed to the function
                        .fail(function(xhr, status, errorThrown) {
                            console.log("Sorry, there was a problem!");
                            // console.log("Error: " + errorThrown);
                            // console.log("Status: " + status);
                            console.log(xhr.responseText);
                            //console.dir(xhr);
                        })
                        // Code to run regardless of success or failure;
                        .always(function(xhr, status) {
                            console.log("The request is complete!");
                        });
                } 
                else {
                    //focus password1 and show red text warning passwords do not match
                    $("#matchPasswords").html("Passwords do not match");
                    $("#password1").focus();
                }
            });
        </script>
    </body>
</html>