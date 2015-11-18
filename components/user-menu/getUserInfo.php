<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'melhuishj';
$password = '';
$db_name = 'c9';

$userId = $_GET['userId'];
$UserFirstNameColumnName = "";
$UserLastNameColumnName = "";

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check

$SQLFetchUserInfo = 'SELECT U.userFirstName, U.userLastName FROM Users U WHERE U.userId = '.$userId;
error_log($SQLFetchUserInfo);

if ($userInfo = $mysqli->query($SQLFetchUserInfo)) {
    error_log("SQL Executed");
    echo json_encode($userInfo->fetch_assoc());
}

?>