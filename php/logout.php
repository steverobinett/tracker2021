<?php
    session_start();
?>
<?php
    $_SESSION = array();
    session_destroy();
    header('Location: http://dev.stevenrobinett.com/index.php');
?>