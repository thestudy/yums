<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'melhuishj';
$password = '';
$db_name = 'c9';

$userName = $_GET['userName'];
$userPassword = $_GET['userPassword'];

$SQLGetuserIdIfMatch = "SELECT U.userId From Users U WHERE U.userName = '".$userName."' AND U.userPassword = '".$userPassword."'";
error_log($SQLGetuserIdIfMatch);

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($userInfo = $mysqli->query($SQLGetuserIdIfMatch)) {
    echo json_encode($userInfo->fetch_assoc());
}

?>