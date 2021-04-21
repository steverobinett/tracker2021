<?php
include ("../php/functionLibrarySkeleton.php");
include ("../db/dbFunctionsphp.php");
echo "<h1>Welcome to my page </h1>";
$conn = getConnection();
$txtBook = SelectAllTextbook($conn);
$courses = SelectAllCourse($conn);
?>


<form action="">

    <label for="textbook">Choose a text book</label>

    <select name="textbook">
        <?php 
            foreach($txtBook as $x){
                echo "<option value=" . $x['textISBN'] . ">" . $x['textTitle'] . "</option>";
            }
        ?>
    </select>

    <label for="course">Choose a course </label>

    <select name="course">
        <?php 
            foreach($courses as $x){
                echo "<option value=" . $x['coursePrefix'] . ">" . $x['coursePrefix'] .  $x['courseNumber'] . ", Section:" . $x['courseSection'] . ", Term:" . $x['courseTerm'] . "</option>";
            }
        ?>
    </select>

</form>
