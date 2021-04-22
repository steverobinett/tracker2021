<?php
session_start();
include ("../php/functionLibrarySkeleton.php");
include ("../db/dbConnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Term Report</title>
</head>
<body>
    <h1>Have a report by term!</h1>
    <label for="term">Term: </label>
    <form method="post" action="termReport.php" id="selectTerm">
    <select type="dropdown" id = "term" name="term">
<?php
    $dropdownData = SelectAllTerm($conn);
    $dropdownData->bind_result($termID, $termName);
    while($dropdownData->fetch()) {
    echo '<option value="'.$termID.'">'.$termName.'"</option>';
    }

    echo '</select>';
    echo '</form>';
    echo '<button type="submit" form="selectTerm" value="submit">Go</button>';

    $reportData = ReportByTerm($conn, $_POST['selectTerm']);
    $reportData->bind_result($isbn, $prefix, $num, $sec, $term, $req, $usenew, $fac);

    echo 'div class="tablewrap">';
        echo '<table id="termreport" class="report">';
            echo '<tr><th>ISBN</th><th>Course Prefix</th><th>Number</th><th>Section</th><th>Required?</th><th>Use Newer?</th><th>Faculty</th>';
            while($reportData->fetch()) {
                echo '<tr>';
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