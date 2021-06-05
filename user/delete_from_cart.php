<?php
    session_start();
    $link=mysqli_connect("localhost","root","","techplus");
    $id=$_GET['id'];
    $user=$_SESSION['id'];
    $sql="DELETE FROM `cart` WHERE `prod_id`='$id' and `user_id`='$user'";
    $result=mysqli_query($link,$sql);
    header('location:cart.php');
?>