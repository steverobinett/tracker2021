<?php
    session_start();
?>

<?php
        $server = 'stevenrobinett.com';
        $user = 'srobinet_TrackerDev';
        $password = 'imRL10-20bye';
        $database = 'srobinet_Tracker2000';

        $conn = new mysqli($server, $user, $password, $database);
        if(!$conn){
             die('Connect failed'.mysqli_connect_error());
        }

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
            echo '<a href="../index.php">Home</a>';
            echo '<script>alert("Registration Successful!")</script>';
        }
?>