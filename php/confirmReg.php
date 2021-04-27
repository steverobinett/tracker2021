<?php
    session_start();
?>

<?php
    require '../db/dbConnect.php';
    $conn = getConnection();

    $userEmail = $_POST['userEmail'];
    $userPass = sha1($_POST['password1'], false);
    $userFirst = $_POST['userFirst'];
    $userLast = $_POST['userLast'];
    $userRole = $_POST['userRole'];
    $insertQuery = 'INSERT INTO USER 
                    VALUES ("'.$userEmail.'","'.$userPass.'","'.$userFirst.'","'.$userLast.'","'.$userRole.'");';
    $insertResult = $conn->query($insertQuery);
    if($insertResult) {
        $_SESSION['userFirst'] = $userFirst;
        $_SESSION['createSuccess'] = true;
        echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
    }
?>