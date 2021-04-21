<?php

function reportByTerm($conn, $termCode) {
    $query = "SELECT COURSETEXTBOOK.*, COURSE.courseFaculty from COURSETEXTBOOK INNER JOIN COURSE ON COURSE.coursePrefix = COURSETEXTBOOK.ctPrefix AND COURSE.courseNumber = COURSETEXTBOOK.ctNumber AND COURSE.courseSection = COURSETEXTBOOK.ctSection and COURSE.courseTerm = COURSETEXTBOOK.ctTerm WHERE COURSETEXTBOOK.ctTerm = ? ORDER BY ctPrefix, ctNumber, courseFaculty";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $termCode);
    $stmt->execute();
    $stmt->store_result();
    return $stmt;
}

function reportByCourse($conn, $prefix, $number)
    $query = "SELECT COURSETEXTBOOK.*, COURSE.courseFaculty from COURSETEXTBOOK INNER JOIN COURSE ON COURSE.coursePrefix = COURSETEXTBOOK.ctPrefix AND COURSE.courseNumber = COURSETEXTBOOK.ctNumber AND COURSE.courseSection = COURSETEXTBOOK.ctSection and COURSE.courseTerm = COURSETEXTBOOK.ctTerm WHERE COURSETEXTBOOK.ctPrefix = ? AND COURSETEXTBOOK.ctNumber = ? ORDER BY ctTerm, courseFaculty";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $termCode);
    $stmt->execute();
    $stmt->store_result();
    return $stmt;
?>