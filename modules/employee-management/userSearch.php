<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$userFirstName = $_GET['userFirstName'];
$userLastName = $_GET['userLastName'];
$userId = $_GET['userId'];

$SQLGetSearchResults = "SELECT U.userId, U.userFirstName, U.userLastName FROM Users U WHERE U.userFirstName LIKE '".$userFirstName."%' AND U.userLastName LIKE '".$userLastName."%' AND U.userId LIKE '".$userId."%'";

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($userInfo = $mysqli->query($SQLGetSearchResults)) {
    $jsonReturn = array();
    while ($row = $userInfo->fetch_assoc()) {
        $jsonReturn[] = $row;
    }
    echo json_encode($jsonReturn);
}

?>