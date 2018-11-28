<?php

include "database.php";
$dbConn = getDatabaseConnection();

$sql = "SELECT username FROM `users` WHERE 1;";
$statement = $dbConn->prepare($sql); 
$statement->execute(); 
$records = $statement->fetchAll();

foreach ($records as $record) {
    if ($record["username"] == $_GET['username']) {
        echo "Unavailable";
        return;
    }
}
echo "Available";
return;


?>