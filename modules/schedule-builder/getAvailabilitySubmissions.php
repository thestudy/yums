<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

if (!isset($_GET['userId'])) {
    $mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
    $SQLGet = $mysqli->prepare("SELECT user_id FROM AvailabilitySubmissions WHERE request_id = ? GROUP BY user_id ORDER BY user_id DESC");
    $SQLGet->bind_param('i', $_GET['requestId']);
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
    $SQLGet = $mysqli->prepare("SELECT S.calendar, S.timestamp, EXTRACT(HOUR FROM R.start_time) AS start_hour, EXTRACT(MINUTE FROM R.start_time) AS start_minute, R.block_interval, R.available_colors FROM AvailabilitySubmissions S, AvailabilityRequests R WHERE R.id = S.request_id AND user_id = ? AND request_id = ? ORDER BY timestamp DESC");
    $SQLGet->bind_param('ii', $_GET['userId'], $_GET['requestId']);
    $SQLGet->execute();
    $results = [];
    
    $result = $SQLGet->get_result();
    foreach ($result as $r) {
        array_push($results, $r);
    }
    print json_encode($results);
    
    $SQLGet->close();
    $mysqli->close();
}
?>