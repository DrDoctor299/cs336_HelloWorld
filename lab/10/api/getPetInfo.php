<?php 

include '../database.php';

$dbConn = getDatabaseConnection();

if($_POST['all']) {
    $sql = "SELECT * FROM `pets`";
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($records);
} 
else {
    $sql = "SELECT * FROM `pets` WHERE id = ".$_POST['id'];
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($records);
}


?>