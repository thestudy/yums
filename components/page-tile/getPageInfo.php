<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'melhuishj';
$password = '';
$db_name = 'c9';

$pageId = $_GET['pageId'];
$SQLFetchPageInfo = 'SELECT P.imgDir, P.imgName, P.pageName, P.pageDesc FROM Pages P WHERE P.pageId = '.$pageId;

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($pageInfo = $mysqli->query($SQLFetchPageInfo)) {
    echo json_encode($pageInfo->fetch_assoc());
}

?>