<?php

function SelectSingleTextbook($isbn) {
    return null;
}

function SelectManyTextbook($author = NULL, $publisher = NULL) {
    return null;
}

function SelectAllTextbook($db) {
    $Courses = [];

    $query = "SELECT * FROM `TEXTBOOK`";

    $result = $db->query($query);

    while($row = $result->fetch_array()) {
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
    
    $result = $db->query($query);

    while($row = $result->fetch_array()) {
        $Courses[] = $row;
    }

    return $Courses;

}

function SelectSingleTerm($year, $semester) {

}

function SelectManyTerm($year = NULL, $semester = NULL) {

}

function SelectAllTerm() {

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

function InsertIntoCourseTextbook($prefix,$courseNum,$courseSec,$courseTerm,$isbn,$dest = NULL){
    echo $prefix;
    echo $courseNum;
    echo $courseSec;
    echo $courseTerm;
    echo $isbn;
}

?>