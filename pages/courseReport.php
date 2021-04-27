<?php
session_start();
include ("../db/functionLibrarySkeleton.php");
include ("../db/dbConnect.php");
include ("../db/reportLibrary.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Course Report</title>
</head>
<body>

<h1 class="title is-3">Report: Search by Course</h1>
    
    <form method="post" action="courseReport.php" id="selectCourse">
    <label for="prefix">Course Prefix: </label>
    <select type="dropdown" id = "prefix" name="prefix">
<?php
//TODO: Remove duplicate values returned for dropdown query
//TODO: Align processes for handling php/sql queries -- SelectAllCourse returns an array, while SelectAllTerm returns a statement object. Both work, but have to be handled differently.

    $conn = getConnection();
    $dropdownData = SelectAllCourse($conn);
    echo '<option></option>';
    foreach ($dropdownData as $i) {
    echo '<option value="'.$i['coursePrefix'].'">'.$i['coursePrefix'].'</option>';
    }
    echo '</select><br>';
    echo '<label for="num">Course Number:'.' '.'</label>';
    echo '<select type="dropdown" id="num" name = "num">';
    echo '<option></option>';
    foreach ($dropdownData as $i) {
        echo '<option value="'.$i['courseNumber'].'">'.$i['courseNumber'].'</option>';
        }
    echo '</select><br>';
    echo '<button type="submit" class="submit" form="selectCourse" id="button" value="submit">Go</button>';
    echo '</form>';

    $prefix = $_POST['prefix'];
    $num = $_POST['num'];

    $reportData = ReportByCourse($conn, $prefix, $num);
    $reportData->bind_result($isbn, $prefix, $num, $sec, $term, $req, $usenew, $fac);

//TODO: Include textbook title/author
//TODO: Make table hidden until user clicks submit button
    
    echo '<div class="tablewrap">';
        echo '<table id="coursereport" class="table is-striped is-narrow">';
            echo '<tr class="thead"><th>ISBN</th><th>Course Prefix</th><th>Number</th><th>Section</th><th>Term</th><th>Required?</th><th>Use Newer?</th><th>Faculty</th>';
            while($reportData->fetch()) {
                echo '<tr class="tbody">';
                    echo '<td>'.$isbn.'</td>';
                    echo '<td>'.$prefix.'</td>';
                    echo '<td>'.$num.'</td>';
                    echo '<td>'.$sec.'</td>';
                    echo '<td>'.$term.'</td>';
                    echo '<td>'.$req.'</td>';
                    echo '<td>'.$usenew.'</td>';
                    echo '<td>'.$fac.'</td>';
                echo '</tr>';
            }
        echo '</table>';
    echo '</div>';

?>
</body>