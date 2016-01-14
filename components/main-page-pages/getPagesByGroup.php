<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$groupId = $_GET['groupId'];
$SQLFetchPageInfo = 'SELECT P.pageId FROM Pages P, ContainsPages C WHERE C.groupId = '.$groupId.' AND C.pageId = P.pageId';

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($pageInfo = $mysqli->query($SQLFetchPageInfo)) {
    $jsonReturn = array();
    while ($row = $pageInfo->fetch_assoc()) {
        $jsonReturn[] = $row;
    }
    echo json_encode($jsonReturn);
}

?>