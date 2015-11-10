<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'melhuishj';
$password = '';
$db_name = 'c9';

$userId = $_GET['userId'];
$SQLFetchUserInfo = 'SELECT U.firstName, U.lastName FROM Users U WHERE U.userId = '.$userId;

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($userInfo = $mysqli->query($SQLFetchUserInfo)) {
    echo json_encode($userInfo->fetch_assoc());
}

?>