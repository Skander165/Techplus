<?php
    session_start();
    $link=mysqli_connect("localhost","root","","techplus");
    $id=$_GET['identifiant'];
    $sql1="DELETE FROM `commande_produit` WHERE `id_c`='$id'";
    $result=mysqli_query($link,$sql1);

    $sql="DELETE FROM `commande` WHERE `id`='$id'";
    $result=mysqli_query($link,$sql);
    header("location:../../all_commands.php");
?>