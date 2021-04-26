<?php
require ("../db/functionLibrarySkeleton.php");
require ("../db/dbConnect.php");

$conn = getConnection();

$text = $_POST['textbook'];
$course = $_POST['course'];

$test = explode(",",$course);
//(ctISBN, ctPrefix,ctNumber,ctSection,ctTerm,ctRequired,ctUseNew)
$query = "SELECT * FROM COURSETEXTBOOK WHERE `ctISBN` = '$text' AND `ctPrefix` = '$test[0]' AND `ctNumber` = '$test[1]' AND `ctSection` = '$test[2]' AND `ctTerm` = '$test[3]'" ;

$result = $conn->query($query);
$result = $result->fetch_array();

if($result == NULL){
    InsertIntoCourseTextbook($conn, $text,$test[0],$test[1],$test[2],$test[3]);
    header("Location: http://dev.stevenrobinett.com/pages/textbookToCourse.php?Status=success");
}
else{
    header("Location: http://dev.stevenrobinett.com/pages/textbookToCourse.php?Status=exists");
}



