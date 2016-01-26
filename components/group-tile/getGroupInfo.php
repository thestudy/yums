<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$groupId = $_GET['groupId'];
$SQLFetchGroupInfo = 'SELECT G.tileImg, G.groupName, G.groupDesc, G.bgColor FROM Groups G WHERE G.groupId = '.$groupId;

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($groupInfo = $mysqli->query($SQLFetchGroupInfo)) {
    echo json_encode($groupInfo->fetch_assoc());
}

?>