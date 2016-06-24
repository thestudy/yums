<?php
// Creates an entry in the AvailabilitySubmissions
header('Content-Type: application/json');
include '../../DBConfig/config.php';
session_start();

// Required fields
$availabilityId = $_GET['availabilityId'];
$userId = $_SESSION['userId'];
$hoursLow = $_GET['hoursLow'];
$hoursHigh = $_GET['hoursHigh'];
$calendar = $_GET['calendar'];

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
$SQLCreate = $mysqli->prepare("INSERT INTO AvailabilitySubmissions (request_id, user_id, hours_low, hours_high, calendar) VALUES (?, ?, ?, ?, ?)");
$SQLCreate->bind_param("iiiis", $availabilityId, $userId, $hoursLow, $hoursHigh, $calendar);
$SQLCreate->execute();

$SQLCreate->close();
$mysqli->close();

print "Completed";
?>