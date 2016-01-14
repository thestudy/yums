<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$userName = $_GET['userName'];
$userPassword = $_GET['userPassword'];

$SQLGetuserIdIfMatch = "SELECT U.userId From Users U WHERE U.userName = '".$userName."' AND U.userPassword = '".$userPassword."'";

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($userInfo = $mysqli->query($SQLGetuserIdIfMatch)) {
    session_start();
    $row = $userInfo->fetch_assoc();
    $_SESSION['userId'] = $row['userId'];
    echo json_encode($row);
}

?>