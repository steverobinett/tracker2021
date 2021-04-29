<?php

function VerifyUser($userEmail, $password) {
    require('dbConnect.php');
    $conn = getConnection();

    $query = $conn->query("SELECT `userPassword`, `userFirst`, `userRole` FROM USER WHERE `userEmail` = \"$userEmail\""); //email = email that was submitted
    $data = $query->fetch_array();
    /* echo $data[0]."<br>";
    echo sha1($password, false)."<br>"; */
    if($data->num_rows === 0) {
        $status = 2; //User not found
    } else if(sha1($password) !== $data[0]) {
        $status = 1; //Password is incorrect
    } else {
        $status = 0; //Everything is good
    }
    $result = array($status, $data[1], $data[2]);
    return $result;
}

function SelectSingleTextbook($isbn) {
    return null;
}

function SelectManyTextbook($author = NULL, $publisher = NULL) {
    return null;
}

function SelectAllTextbook($db) {
    $Courses = [];

    $query = "SELECT * FROM `TEXTBOOK`";

    $data = $db->query($query);

    while($row = $data->fetch_array()) {
        $Courses[] = $row;
    }


    return $Courses;
}

function SelectSingleCoursetextbook($faculty = NULL, $prefix = NULL, $number = NULL) {

}

function SelectManyCoursetextbook($faculty = NULL, $prefix = NULL, $number = NULL) {

}

function SelectAllCoursetextbook() {

}

function SelectSingleCourse($prefix, $number, $section, $term) {

}

function SelectManyCourse($faculty = NULL, $prefix = NULL, $number = null) {

}

function SelectAllCourse($db) {

    $Courses = [];

    $query = "SELECT * FROM `COURSE`";
    
    $data = $db->query($query);

    while($row = $data->fetch_array()) {
        $Courses[] = $row;
    }

    return $Courses;

}

function SelectSingleTerm($year, $semester) {

}

function SelectManyTerm($year = NULL, $semester = NULL) {

}

function SelectAllTerm($conn) {
    $query = "SELECT TERM.termID, CONCAT(TERM.termSem, ' ',TERM.termYear) FROM TERM ORDER BY 1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    return $stmt;
}

function SelectSingleDepartment($dept) {

}

function SelectAllDepartment() {

}

function SelectSingleFaculty($first = NULL, $last = NULL) {

}

function SelectManyFaculty($prefix = NULL, $number = NULL) {

}

function SelectAllFaculty() {

}

function InsertIntoCourseTextbook($db, $isbn , $prefix , $courseNum , $courseSec , $courseTerm , $Req = NULL , $useNew = NULL){

    $query = "INSERT INTO COURSETEXTBOOK (ctISBN, ctPrefix,ctNumber,ctSection,ctTerm,ctRequired,ctUseNew) VALUES (?, ?, ?, ?, ?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssssiii', $isbn, $prefix, $courseNum,  $courseSec, $courseTerm,$Req,$useNew);

    $data = $stmt->execute();

}

function InsertTextbook($isbn, $title, $author, $edition, $publisher, $format) {
    $conn = getConnection();
    $query = "INSERT INTO TEXTBOOK VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssss', $isbn, $title, $author, $edition, $publisher, $format);
    $data = $stmt->execute() or trigger_error("Failed to add textbook to the database. Error: ".$conn->error);
}

