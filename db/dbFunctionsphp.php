<?php

function getConnection() {
    @$conn = new mysqli('stevenrobinett.com', 'srobinet_TrackerDev', 'imRL10-20bye', 'srobinet_Tracker2000');
        if($conn->connect_errno){
             trigger_error("Connection failed: ".$conn->connect_error);
             exit();
        }
        return $conn;
        exit();
}

function insertTextbook($isbn, $title, $author, $edition, $publisher, $format) {
    $conn = getConnection();
    $query = "INSERT INTO TEXTBOOK VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssss', $isbn, $title, $author, $edition, $publisher, $format);
    $result = $stmt->execute() or trigger_error("Failed to add textbook to the database. Error: ".$conn->error);
}