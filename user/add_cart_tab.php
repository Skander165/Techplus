<?php
    session_start();
    $link=mysqli_connect("localhost", "root", "" , "techplus");

    $id=$_GET['identifiant'];
    $sql="SELECT * from tablette where id=$id";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);

    $user_id=$_SESSION['id'];

    $sql="INSERT INTO `cart` (`prod_id`,`user_id` ,`quantity`,`table`) values( '$id', '$user_id' ,1,3 )";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('Location:cart.php');

?>

