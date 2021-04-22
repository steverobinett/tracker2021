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

