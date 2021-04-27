<?php
include "../db/dbConnect.php";
include "../db/functionLibrarySkeleton.php";

echo "<h1>Welcome to my page </h1>";
$db = getConnection();
$txtBook = SelectAllTextbook($db);
$courses = SelectAllCourse($db);

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
                echo "<option  value=" . $x['coursePrefix'] .",".  $x['courseNumber'] . "," . $x['courseSection'] . "," . $x['courseTerm'] .">" . $x['coursePrefix'] .  $x['courseNumber'] . ", Section:" . $x['courseSection'] . ", Term:" . $x['courseTerm'] . "</option>";
            }
        ?>
    </select>

    <button type="submit">Enter</button>

</form>
<?php
    if(isset($_GET["Status"])){
        if($_GET["Status"] == "success"){
            echo "<h1> You successfully submitted! </h1>";
        }
        if($_GET["Status"] == "exists"){
            echo "<h1> This association already exists </h1>";
        }
    }
?>
