<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: http://dev.stevenrobinett.com/index.php');
?>