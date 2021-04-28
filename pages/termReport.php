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
    <title>Term Report</title>
</head>
<body>
<!--TODO: Make pretty-->
    <h1>Have a report by term!</h1>
    
    <form method="post" action="termReport.php" id="selectTerm">
    <label for="term">Term: </label>
    <select type="dropdown" id = "term" name="term">
<?php
    $conn = getConnection();
    $dropdownData = SelectAllTerm($conn);
    $dropdownData->bind_result($termID, $termName);
    echo '<option value="none" selected disabled hidden>Select Term</option>';
    while($dropdownData->fetch()) {
    echo '<option value="'.$termID.'">'.$termName.'</option>';
    }

    echo '</select>';
    echo '</form>';
    echo '<button type="submit" form="selectTerm" id="button" value="submit">Go</button>';

    $reportData = ReportByTerm($conn, $_POST['term']);
    $reportData->bind_result($isbn, $prefix, $num, $sec, $term, $req, $usenew, $fac);

//TODO: Include textbook title/author
//TODO: Make table hidden until user clicks submit button
    echo '<div class="tablewrap">';
        echo '<table id="termreport" class="table is-striped is-narrow">';
            echo '<tr class="thead"><th>ISBN</th><th>Course Prefix</th><th>Number</th><th>Section</th><th>Required?</th><th>Use Newer?</th><th>Faculty</th>';
            while($reportData->fetch()) {
                echo '<tr class="tbody">';
                    echo '<td>'.$isbn.'</td>';
                    echo '<td>'.$prefix.'</td>';
                    echo '<td>'.$num.'</td>';
                    echo '<td>'.$sec.'</td>';
                    echo '<td>'.$req.'</td>';
                    echo '<td>'.$usenew.'</td>';
                    echo '<td>'.$fac.'</td>';
                echo '</tr>';
            }
        echo '</table>';
    echo '</div>';

?>
</body>