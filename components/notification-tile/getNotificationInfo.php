<?php
header('Content-Type: application/json');
include '../../DBConfig/config.php';

$noteId = $_GET['noteId'];
$SQLFetchNoteInfo = 'SELECT N.noteShort, N.noteLong FROM Notification N WHERE N.noteId = '.$noteId;

$mysqli = new mysqli($host, $username, $password, $db_name); //Add connection failure check
if ($noteInfo = $mysqli->query($SQLFetchNoteInfo)) {
    echo json_encode($noteInfo->fetch_assoc());
}

?>