<?php   
    session_start();
    session_destroy();
    header('Location:./guest/user_Auth.php');
?>
