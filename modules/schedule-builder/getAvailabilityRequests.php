<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

if (!isset($_GET['selectedRequestId'])) {
    $mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
    $SQLGet = $mysqli->prepare("SELECT  id, request_name, due_date FROM AvailabilityRequests");
    $SQLGet->execute();
    $results = [];
    
    $result = $SQLGet->get_result();
    foreach ($result as $r) {
        array_push($results, $r);
    }
    print json_encode($results);
    
    $SQLGet->close();
    $mysqli->close();
} else {
    $mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
    $SQLGet = $mysqli->prepare("SELECT id, request_name, minimum_hours, maximum_hours, EXTRACT(HOUR FROM start_time) AS start_hour, EXTRACT(MINUTE FROM start_time) AS start_minute, block_interval, available_colors, calendar, percent_over FROM AvailabilityRequests WHERE id = ?");
    $SQLGet->bind_param('i', $_GET['selectedRequestId']);
    $SQLGet->execute();
    $result = $SQLGet->get_result();
    
    print json_encode($result->fetch_assoc());
    
    $SQLGet->close();
    $mysqli->close();
}
?>