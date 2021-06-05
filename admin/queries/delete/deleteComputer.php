<?php
    $identifiant=$_GET['identifiant'];
    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql = "DELETE from `ordinateur` WHERE id=$identifiant";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('location:../../computers.php');
?>