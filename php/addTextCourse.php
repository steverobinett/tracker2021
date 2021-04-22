<?php
// require ("../db/functionLibrarySkeleton.php");
require ("../db/dbConnect.php");

function InsertIntoCourseTextbook($prefix,$courseNum,$courseSec,$courseTerm,$isbn){
    
    $db = getConnection();
    
    echo $prefix;
    echo "<br>";
    echo $courseNum;
    echo "<br>";
    echo $courseSec;
    echo "<br>";
    echo $courseTerm;
    echo "<br>";
    echo $isbn;

    // $query = "INSERT INTO COURSETEXTBOOK (ctISBN,ctPrefix,ctNumber,ctSection,ctTerm) VALUES('$isbn','$prefix','$courseNum','$courseSec',$courseTerm,NULL,NULL) ";
    $qury = "INSERT INTO `COURSETEXTBOOK`(`ctISBN`, `ctPrefix`, `ctNumber`, `ctSection`, `ctTerm`, `ctRequired`, `ctUseNew`) VALUES ('$isbn','$prefix','$courseNum','$courseSec',$courseTerm,NULL,NULL)";



    
    $result = $db->query($query);

    echo $result;

}


$text = $_POST['textbook'];
$course = $_POST['course'];

$test = explode(",",$course);

InsertIntoCourseTextbook($test[0],$test[1],$test[2],$test[3],$text);

// echo $text;
// echo "<br>";
// foreach($test as $x){
//     echo $x;
//     echo "<br>";
// }
