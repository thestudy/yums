<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$pageId = $_GET['pageId'];
$SQLFetchPageInfo = 'SELECT P.tileImg, P.pageName, P.pageDesc, P.pageURL FROM Pages P WHERE P.pageId = '.$pageId;

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($pageInfo = $mysqli->query($SQLFetchPageInfo)) {
    echo json_encode($pageInfo->fetch_assoc());
}

?>