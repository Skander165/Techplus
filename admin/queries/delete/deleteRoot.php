<?php
    $identifiant=$_GET['identifiant'];
    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql = "DELETE from `root` WHERE id=$identifiant";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('location:../../logout1.php');
?>