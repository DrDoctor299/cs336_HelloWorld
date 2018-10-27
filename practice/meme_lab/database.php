<?php

// connect to our mysql database server

function getDatabaseConnection() {
    //===============Local DB============================
    // $host = "localhost";
    // $username = "joshuawilliams19";
    // $password = "cst336"; // best practice: define this in a separte file
    // $dbname = "meme_lab"; 
    
    // // Create connection
    // $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //==============Online DB=========================
    
    $host = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b49c6487e7ead7";
    $password = "c2f32a4c"; // best practice: define this in a separte file
    $dbname = "heroku_7e06c43769fa45b"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

// temporary test code
//$dbConn = getDatabaseConnection(); 


?>
