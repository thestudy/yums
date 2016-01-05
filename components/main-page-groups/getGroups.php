<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'melhuishj';
$password = '';
$db_name = 'c9';

$SQLGetGroups = "SELECT G.groupId FROM Groups G";

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($groupInfo = $mysqli->query($SQLGetGroups)) {
    $jsonReturn = array();
    while ($row = $groupInfo->fetch_assoc()) {
        $jsonReturn[] = $row;
    }
    echo json_encode($jsonReturn);
}

?>