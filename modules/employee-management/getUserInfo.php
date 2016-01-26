<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$userId = $_GET['userId'];
$SQLGetUserInfo = "Select U.userId, U.userName, U.userFirstName, U.userLastName FROM Users U WHERE U.userId = ".$userId;

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($userInfo = $mysqli->query($SQLGetUserInfo)) {
    echo json_encode($userInfo->fetch_assoc());
}

?>