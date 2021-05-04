<?php 
    session_start();
    require '../db/dbConnect.php';
    $conn = getConnection();

    function unfancy($fancy) {
        $fixes = false;
    
        if($fixes === false) {
            $fixes = array (
                json_decode('"\u201C"') => '"',     // left  double quotation mark
                json_decode('"\u201D"') => '"',     // right double quotation mark
                json_decode('"\u2018"') => "'",     // left  single quotation mark
                json_decode('"\u2019"') => "'",     // right single quotation mark
                json_decode('"\u2032"') => "'",     // prime (minutes, feet)
                json_decode('"\u2033"') => '"',     // double prime (seconds, inches)
                json_decode('"\u2013"') => '-',     // en dash
                json_decode('"\u2014"') => '--',    // em dash
            );
        }
        $normal = strtr($fancy, $fixes);
        return $normal;
    }

    $textAuthor = $_POST['authorField'];
    $textEdition = $_POST['editionField'];
    $textFormat = $_POST['formatField'];
    $textISBN = $_POST['isbnField2'];
    $textPublisher = $_POST['publisherField'];
    $textTitle = unfancy($_POST['titleField']);
    $insertQuery = 'INSERT INTO TEXTBOOK 
                    VALUES ("'.$textISBN.'","'.$textTitle.'","'.$textAuthor.'","'.$textEdition.'","'.$textPublisher.'","'.$textFormat.'");';
    $insertResult = $conn->query($insertQuery);
    if($insertResult) {
        $_SESSION['textSubmitSuccess'] = true;
        $_SESSION['prevISBN'] = $textISBN;
        echo "<script type='text/javascript'> document.location = '../pages/textbook.php'; </script>";
    }
