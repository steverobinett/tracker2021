<?php
    session_start();
    include "../db/dbConnect.php";
?>

<?php
        $conn = getConnection();

        $userEmail = $_POST['userEmail'];
        // $userPass = password_hash($_POST['password1'], PASSWORD_DEFAULT);
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
            $_SESSION['role'] = $_POST['userRole'];
            echo '<a href="../index.php">Home</a>';
            echo '<script>alert("Registration Successful!")</script>';
        }
?>