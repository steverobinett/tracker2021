<?php
    session_start();
    if(isset($_POST['email']) && isset($_POST['password'])) {

        $userEmail = $_POST['email'];
        $userPass = $_POST['password'];

        require('../db/functionLibrarySkeleton.php');
        $result = VerifyUser($userEmail, $userPass);

        switch ($result[0]) {
            case 0:
                $_SESSION['userFirst'] = $result[1];
                $_SESSION['role'] = $result[2];
                header('Location: http://dev.stevenrobinett.com/index.php');
            break;
            case 1:
                echo "Password incorrect";
            break;
            case 2:
                echo "User not found";
            break;
            default:
                echo "VerifyUser ran into an issue: $result";
        break;
        }
    }
    else {
        echo "Error";
    }
    exit();
?>