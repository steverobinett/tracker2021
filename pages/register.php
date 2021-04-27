<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Register for new account</h1>
    <form action="../php/confirmReg.php" method="POST" onsubmit="return validators();">
        <label for="userFirst">First Name:</label><br>
        <input type="text" name="userFirst" id="userFirst" placeholder="Required"><br>
        <div class="errorDiv" id="userFirstError"></div>
        <label for="userLast">Last Name:</label><br>
        <input type="text" name="userLast" id="userLast" placeholder="Required"><br>
        <div class="errorDiv" id="userLastError"></div>
        <label for="userEmail">Email:</label><br>
        <input type="text" name="userEmail" id="userEmail" placeholder="Required"><br>
        <div class="errorDiv" id="emailError"></div>
        <label for="userRole">Select a Role:</label><br>
        <select name="userRole" id="userRole"><br>
            <option value="2">Faculty</option>
            <option value="3">Viewer</option>
        </select><br>
        <label for="password1">Password:</label><br>
        <input type="password" name="password1" id="password1" placeholder="Required"><br>
        <div class="errorDiv" id="pass1Error"></div>
        <label for="password2">Re-Enter Password:</label><br>
        <input type="password" name="password2" id="password2"><br>
        <div class="errorDiv" id="pass2Error"></div>
        <input type="submit" value="Register">
    </form>

    <?php
        $server = 'stevenrobinett.com';
        $user = 'srobinet_TrackerDev';
        $password = 'imRL10-20bye';
        $database = 'srobinet_Tracker2000';
        $conn = new mysqli($server, $user, $password, $database);
        if(!$conn){
            die('Connect failed'.mysqli_connect_error());
        }
        $emailQuery = 'SELECT userEmail
                        FROM USER;';
        $emailResult = $conn->query($emailQuery);
        while($row = $emailResult->fetch_array()) {
            $emails[] = $row;
        }
        $emailString = '';
        foreach($emails as $row) {
            $emailString = $emailString.$row[0].' ';
        }
        echo '<input type="hidden" id="emailArray" value="'.$emailString.'">';

    ?>

    <script src="../js/regValidate.js"></script>
</body>
</html>