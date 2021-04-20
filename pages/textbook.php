<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Textbook</title>
</head>
<body>
    <form action="#" method="#">
        <label for="isbnField">ISBN:</label>
        <input type="text" name="isbnField" id="isbnField"><br>
        <div class="errorDiv" id="isbnError"></div><br>
        <input type="button" id="findButton" value="Find Text"><br>
    </form>

    <form id="textDetailForm" action="../php/submitTextSuccess.php" method="POST" onsubmit="return textValidate()">
        <input type="hidden" name="isbnField2" id="isbnField2"><br>
        <label for="titleField">Title:</label><br>
        <input type="text" name="titleField" id="titleField" placeholder="Required"><br>
        <div class="errorDiv" id="titleError"></div>
        <label for="authorField">Author(s):</label><br>
        <input type="text" name="authorField" id="authorField" placeholder="Required"><br>
        <div class="errorDiv" id="authorError"></div>
        <label for="editionField">Edition:</label><br>
        <input type="text" name="editionField" id="editionField"><br>
        <div class="errorDiv" id="editionError"></div>
        <label for="publisherField">Publisher:</label><br>
        <input type="text" name="publisherField" id="publisherField"><br>
        <div class="errorDiv" id="pubError"></div>
        <label for="formatField">Format:</label><br>
        <select name="formatField" id="formatField">
            <option value="Hardcover">Hardcover</option>
            <option value="Paperback">Paperback</option>
            <option value="Loose-leaf">Loose-leaf</option>
            <option value="E-book">E-Book</option>
        </select><br><br>
        <input type="submit" id="addButton" value="Add to DB">
    </form>

    <script src="../js/ajaxCall.js"></script>
    <script src="../js/addTextValidate.js"></script>
</body>
</html>