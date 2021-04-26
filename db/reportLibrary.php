<?php

function ReportByTerm($conn, $termCode) {
    $query = "SELECT COURSETEXTBOOK.ctISBN, COURSETEXTBOOK.ctPrefix, COURSETEXTBOOK.ctNumber, COURSETEXTBOOK.ctSection, CONCAT(TERM.termSEM, ' ', TERM.termYear), CASE WHEN COURSETEXTBOOK.ctRequired = 0 THEN 'No' WHEN COURSETEXTBOOK.ctRequired = 1 THEN 'Yes' END, CASE WHEN COURSETEXTBOOK.ctUseNew = 0 THEN 'No' WHEN COURSETEXTBOOK.ctUseNew = 1 THEN 'Yes' END, CONCAT(FACULTY.facultyFirst, ' ', FACULTY.facultyLast) from COURSETEXTBOOK INNER JOIN COURSE ON COURSE.coursePrefix = COURSETEXTBOOK.ctPrefix AND COURSE.courseNumber = COURSETEXTBOOK.ctNumber AND COURSE.courseSection = COURSETEXTBOOK.ctSection and COURSE.courseTerm = COURSETEXTBOOK.ctTerm INNER JOIN FACULTY on COURSE.courseFaculty = FACULTY.facultyID INNER JOIN TERM on COURSE.courseTerm = TERM.termID WHERE COURSETEXTBOOK.ctTerm = ? ORDER BY ctPrefix, ctNumber, courseFaculty";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $termCode);
    $stmt->execute();
    $stmt->store_result();
    return $stmt;
}

function ReportByCourse($conn, $prefix, $number) {
    $query = "SELECT COURSETEXTBOOK.ctISBN, COURSETEXTBOOK.ctPrefix, COURSETEXTBOOK.ctNumber, COURSETEXTBOOK.ctSection, CONCAT(TERM.termSEM, ' ', TERM.termYear), CASE WHEN COURSETEXTBOOK.ctRequired = 0 THEN 'No' WHEN COURSETEXTBOOK.ctRequired = 1 THEN 'Yes' END, CASE WHEN COURSETEXTBOOK.ctUseNew = 0 THEN 'No' WHEN COURSETEXTBOOK.ctUseNew = 1 THEN 'Yes' END, CONCAT(FACULTY.facultyFirst, ' ', FACULTY.facultyLast) from COURSETEXTBOOK INNER JOIN COURSE ON COURSE.coursePrefix = COURSETEXTBOOK.ctPrefix AND COURSE.courseNumber = COURSETEXTBOOK.ctNumber AND COURSE.courseSection = COURSETEXTBOOK.ctSection and COURSE.courseTerm = COURSETEXTBOOK.ctTerm INNER JOIN FACULTY on COURSE.courseFaculty = FACULTY.facultyID INNER JOIN TERM on COURSE.courseTerm = TERM.termID WHERE COURSETEXTBOOK.ctPrefix = ? AND COURSETEXTBOOK.ctNumber = ? ORDER BY ctTerm, courseFaculty";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ss', $prefix, $number);
    $stmt->execute();
    $stmt->store_result();
    return $stmt;
}

function ReportByTextbook($conn, $isbn) {
    $query = "SELECT COURSETEXTBOOK.ctISBN, COURSETEXTBOOK.ctPrefix, COURSETEXTBOOK.ctNumber, COURSETEXTBOOK.ctSection, CONCAT(TERM.termSEM, ' ', TERM.termYear), CASE WHEN COURSETEXTBOOK.ctRequired = 0 THEN 'No' WHEN COURSETEXTBOOK.ctRequired = 1 THEN 'Yes' END, CASE WHEN COURSETEXTBOOK.ctUseNew = 0 THEN 'No' WHEN COURSETEXTBOOK.ctUseNew = 1 THEN 'Yes' END, CONCAT(FACULTY.facultyFirst, ' ', FACULTY.facultyLast) from COURSETEXTBOOK INNER JOIN COURSE ON COURSE.coursePrefix = COURSETEXTBOOK.ctPrefix AND COURSE.courseNumber = COURSETEXTBOOK.ctNumber AND COURSE.courseSection = COURSETEXTBOOK.ctSection and COURSE.courseTerm = COURSETEXTBOOK.ctTerm INNER JOIN FACULTY on COURSE.courseFaculty = FACULTY.facultyID INNER JOIN TERM on COURSE.courseTerm = TERM.termID WHERE COURSETEXTBOOK.ctISBN = ? ORDER BY ctTerm, ctPrefix, ctNumber, courseFaculty";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $isbn);
    $stmt->execute();
    $stmt->store_result();
    return $stmt;
}

?>