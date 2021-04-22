<?php
include ("../db/functionLibrarySkeleton.php");
include ("../db/dbConnect.php");
echo "<h1>Welcome to my page </h1>";
$conn = getConnection();
$txtBook = SelectAllTextbook($conn);
$courses = SelectAllCourse($conn);
?>


<form action="../php/addTextCourse.php" method="POST">

    <label for="textbook">Choose a text book</label>

    <select name="textbook">
        <?php 
            foreach($txtBook as $x){
                echo "<option  value=" . $x['textISBN'] . ">" . $x['textTitle'] . "</option>";
            }
        ?>
    </select>

    <label for="course">Choose a course </label>

    <select name="course">
        <?php 
            foreach($courses as $x){
                echo "<option  value=" . $x['coursePrefix'] .",".  $x['courseNumber'] . "," . $x['courseSection'] . "," . $x['courseTerm'] . "," . $x['courseEnrollment'] . "," . $x['courseDept'] . "," . $x['courseFaculty'] . ">" . $x['coursePrefix'] .  $x['courseNumber'] . ", Section:" . $x['courseSection'] . ", Term:" . $x['courseTerm'] . "</option>";
            }
        ?>
    </select>

    <button type="submit">Enter</button>

</form>
