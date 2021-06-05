<?php
session_start();
    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $id_u=$_SESSION['id'];
    $sum=$_GET['sum'];
    $Q=$_SESSION['total_rows'];
    $sql="SELECT * FROM cart where user_id=$id_u";
    $result=mysqli_query($link,$sql);
    
    
    //Insertion d une nouvelle commande
    $sql2="INSERT INTO `commande`(`user_id` , `total`, `quantity`) values('$id_u','$sum', '$Q')";
    $result2=mysqli_query($link,$sql2) or die('Erreur SQL !'.mysqli_error($link));
    
    $sql2="SELECT id FROM commande where user_id=$id_u ORDER BY id DESC";
    $result2=mysqli_query($link,$sql2);
    $row=mysqli_fetch_assoc($result2);
    $id_c=$row['id'];
    
    //Ajout de la commande dans la table commande_produit
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['prod_id'];
        $id_table=$row['table'];
        $quantity= 1;
        $sql1="INSERT INTO `commande_produit` values('$id_c','$id_u', '$id','$id_table', '$quantity')";
        $result1=mysqli_query($link,$sql1) or die('Erreur SQL !'.mysqli_error($link));
        $Q ++;
    }


    //Vider le panier 
    $sql="DELETE FROM cart where user_id=$id_u";
    $result=mysqli_query($link,$sql);

    //Modification des quantites 

    header('Location:cart.php');


    ?>
