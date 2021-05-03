<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker2000 || Insert Textbook</title>
</head>
<body>

<?php
    require '../db/dbConnect.php';

    $conn = getConnection();

    $ISBNquery = "SELECT textISBN FROM TEXTBOOK";
    $ISBNresult = $conn->query($ISBNquery);
    while($row = $ISBNresult->fetch_array()) {
        $ISBNs[] = $row;
    }
    $ISBNString = '';
    foreach($ISBNs as $row) {
        $ISBNString = $ISBNString.$row[0].' ';
        $ISBNString = str_replace("-", "", $ISBNString);
    }
    echo '<input type="hidden" id="ISBNArray" value="'.$ISBNString.'">';
    echo '<input type="hidden" id="textSubmitSuccess" value="'.$_SESSION['textSubmitSuccess'].'">';
    echo '<input type="hidden" id="prevISBN" value="'.$_SESSION['prevISBN'].'">';

?>
    <a href="../index.php">Home</a>
    <form action="#" method="#">
        <label for="isbnField">ISBN:</label>
        <input type="text" name="isbnField" id="isbnField"><br>
        <div class="errorDiv" id="isbnError"></div>
        <div id="prevDiv"></div>
        <input type="button" id="findButton" value="Find Text"><br>
    </form>

    <form id="textDetailForm" action="../php/submitTextSuccess.php" method="POST">
        <input type="hidden" name="isbnField2" id="isbnField2"><br>
        <label for="titleField">Title:</label><br>
        <input type="text" name="titleField" id="titleField"><br>
        <div class="errorDiv" id="titleError"></div>
        <label for="authorField">Author(s):</label><br>
        <input type="text" name="authorField" id="authorField"><br>
        <div class="errorDiv" id="authorError"></div>
        <label for="editionField">Edition:</label><br>
        <input type="text" name="editionField" id="editionField"><br>
        <div class="errorDiv" id="editionError"></div>
        <label for="publisherField">Publisher:</label><br>
        <input type="text" name="publisherField" id="publisherField"><br>
        <div class="errorDiv" id="pubError"></div>
        <label for="formatField">Format:</label><br>
        <select name="formatField" id="formatField">
            <option value=""> -- select an option -- </option>
            <option value="Hardcover">Hardcover</option>
            <option value="Paperback">Paperback</option>
            <option value="Loose-leaf">Loose-leaf</option>
            <option value="eBook">E-Book</option>
        </select><br><br>
        <input type="submit" id="addButton" value="Add to DB">
    </form>

    <!-- <div id="subSuccessDiv">
        <h2>Submission Succesful!</h2>

    </div> -->

    <script src="../js/ajaxCall.js"></script>
    <script src="../js/addTextValidate.js"></script>
</body>
</html>