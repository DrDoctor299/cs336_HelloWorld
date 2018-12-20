<?php

include "../db/database.php";

$dbConn = getDatabaseConnection();

//Set up our insert statement to put a new race record into the database
$sql = "INSERT INTO `races`(`id`, `date`, `start_time`, `password`, `location`, `status_id`)
        VALUES ('".$_POST['id']."','".$_POST['date']."','".$_POST['start']."',
        '".$_POST['password']."','".$_POST['location']."','1')";

// echo $sql;

//Prepare and execute our SQL
$statement = $dbConn->prepare($sql); 
$result = $statement->execute(); 
echo $result;
//Fetch the result of our insert (pass or fail)
// $records = $statement->fetchAll();

// //Return the records as a JSON object
// header('Content-Type: application/json');
// echo json_encode($records);

?>