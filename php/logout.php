<?php
    session_start();
?>
<?php
    $_SESSION = array();
    session_destroy();
    echo '<a href="../index.php">Home</a>';
?>