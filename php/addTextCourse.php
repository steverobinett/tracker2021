<?php
require ("../db/functionLibrarySkeleton.php");
require ("../db/dbConnect.php");

$conn = getConnection();

$text = $_POST['textbook'];
$course = $_POST['course'];

$test = explode(",",$course);

InsertIntoCourseTextbook($conn, $text,$test[0],$test[1],$test[2],$test[3]);

header("Location: http://dev.stevenrobinett.com/pages/textbookToCourse.php");