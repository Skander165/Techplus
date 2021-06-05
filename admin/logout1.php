<?php   
    session_start();
    session_destroy();
    header('Location:../user/guest/adminAuthForm.php');
?>
