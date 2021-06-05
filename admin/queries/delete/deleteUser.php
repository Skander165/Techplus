<?php
    $identifiant=$_GET['identifiant'];
    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql = "DELETE from `user` WHERE id_u=$identifiant";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('location:../../All_users.php');
?>