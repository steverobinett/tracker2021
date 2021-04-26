<?php
    session_start();
    if(isset($_POST['email']) && isset($_POST['password'])) {

        $userEmail = $_POST['email'];
        $userPass = $_POST['password'];

        require('../db/functionLibrarySkeleton.php');
        $status = VerifyUser($userEmail, $userPass);

        switch ($status) {
            case 0:
                $_SESSION['userFirst'] = $userFirst;
                header('Location: http://dev.stevenrobinett.com/index.php');
            break;
            case 1:
                echo "Password incorrect";
            break;
            case 2:
                echo "User not found";
            break;
            default:
                echo "VerifyUser ran into an issue: $status";
        break;
        }
    }
    else {
        echo "Error";
    }
    echo "<br>Done";
?>