<?php 
    session_start();
?>

<?php
    require '../db/dbConnect.php';
    $conn = getConnection();

    $textAuthor = $_POST['authorField'];
    $textEdition = $_POST['editionField'];
    $textFormat = $_POST['formatField'];
    $textISBN = $_POST['isbnField2'];
    $textPublisher = $_POST['publisherField'];
    $textTitle = $_POST['titleField'];
    $insertQuery = 'INSERT INTO TEXTBOOK 
                    VALUES ("'.$textISBN.'","'.$textTitle.'","'.$textAuthor.'","'.$textEdition.'","'.$textPublisher.'","'.$textFormat.'");';
    $insertResult = $conn->query($insertQuery);
    if($insertResult) {
        $_SESSION['textSubmitSuccess'] = true;
        $_SESSION['prevISBN'] = $textISBN;
        // $link = "http://dev.stevenrobinett.com/pages/textbook.php";
        // echo "<a href='".$link."'>Textbook</a>";
        // header('Location:http://dev.stevenrobinett.com/pages/textbook.php');
        echo "<script type='text/javascript'> document.location = '../pages/textbook.php'; </script>";
    }
