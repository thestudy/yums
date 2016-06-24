<?php
// Creates an entry in the AvailabilityRequests table
header('Content-Type: application/json');
include '../../DBConfig/config.php';

// Required fields
$requestName = $_GET['requestName'];
$blockInterval = $_GET['blockInterval'];
$startTime = ((strlen($_GET['startHour']) == 1) ? '0'.$_GET['startHour'] : $_GET['startHour']).':'.((strlen($_GET['startMinute']) == 1) ? '0'.$_GET['startMinute'] : $_GET['startMinute']);
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$dueDate = $_GET['dueDate'];
$minimumHours = $_GET['minimumHours'];
$maximumHours = $_GET['maximumHours'];
$percentOver = $_GET['percentOver'];
$availableColors = $_GET['availableColors'];
$calendar = $_GET['calendar'];

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
$SQLCreate = $mysqli->prepare("INSERT INTO AvailabilityRequests (request_name, block_interval, start_time, start_date, end_Date, due_date, minimum_hours, maximum_hours, percent_over, available_colors, calendar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$SQLCreate->bind_param("sissssiiiss", $requestName, $blockInterval, $startTime, $startDate, $endDate, $dueDate, $minimumHours, $maximumHours, $percentOver, $availableColors, $calendar);
$SQLCreate->execute();

$SQLCreate->close();
$mysqli->close();

print "Success";
?>