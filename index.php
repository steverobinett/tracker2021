<?php
    session_start();
    if(!isset($_SESSION["userFirst"])) {
        //if user is not logged in
        header('Location: http://dev.stevenrobinett.com/pages/login.html');
    } else {
        //Load Page
        echo "Welcome ". $_SESSION['userFirst']. ", you are logged in.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Tracker2021</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="box has-background-grey-light p-3 mb-0 $radius-large">
        <h2 class="title is-2">Textbook Tracker 2021</h2>
    </div>
    <div>
        <h6 class="subtitle is-6">Daysen.Doyon.Jewett.Robinett.Stoltzfus</h6>
    </div>
    <br>
    <div class="buttons">
        <a class="button is-link" id="loginButton" href="pages/login.html">Login</a>
        <a class="button is-link" id="registerButton" href="pages/register.php">Register</a>
    </div>

    <?php
    // Allows SESSION varaibles to be called in JS, may be a better way but it works ftm
        echo '<input type="hidden" id="userFirst" value="'.$_SESSION['userFirst'].'">';
        echo '<input type="hidden" id="sessionCreate" value="'.$_SESSION['createSuccess'].'">';
        echo '<input type="hidden" id="sessionReturn" value="'.$_SESSION['returnSuccess'].'">';
    ?>

    <?php
        if($_SESSION["role"] == "1"){
            echo "<a class='button is-link' id='loginButton' href='#'>Add User</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/textbook.php'>Add a textbook</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/termReport.php'>Term Report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/courseReport.php'>Course Report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/textbookReport.php'>Text book report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/textbookToCourse.php'>Add a textbook to a course</a>";
        }
        elseif($_SESSION["role"] == "2"){
            echo "<a class='button is-link' id='loginButton' href='pages/textbook.php'>Add a textbook</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/termReport.php'>Term Report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/courseReport.php'>Course Report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/textbookReport.php'>Text book report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/textbookToCourse.php'>Add a textbook to a course</a>";
        }
        elseif($_SESSION["role"] == "3"){
            echo "<a class='button is-link' id='loginButton' href='pages/textbookReport.php'>Text book report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/termReport.php'>Term Report</a>";
            echo "<a class='button is-link' id='loginButton' href='pages/courseReport.php'>Course Report</a>";
        }
    ?>
    
    
    
    
    


    <script src="js/index.js"></script>

</body>
</html>