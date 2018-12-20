<?php

include "../db/database.php";

$dbConn = getDatabaseConnection();

//Set up our select statement to draw on our database
//Select statement contains logic to only show current races
//also only selects active races (not canceled)
$sql = "SELECT races.id, date, start_time, password, location, name FROM `races` 
        LEFT JOIN status ON races.status_id = status.id  
        WHERE date >= CURDATE() AND name = 'Active'";

//Prepare and execute our SQL
$statement = $dbConn->prepare($sql); 
$result = $statement->execute(); 
//Fetch the results and store them in records
$records = $statement->fetchAll();

//Return the records as a JSON object
header('Content-Type: application/json');
echo json_encode($records);

?>