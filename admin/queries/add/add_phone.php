<?php
    $name=$_POST['name'];
    $marque=$_POST['marque'];
    $price=$_POST['price'];
    $qtite=$_POST['quantite'];
    $img=$_POST['image'];
    $description=$_POST['description'];
    $keywords=$_POST['keywords'];

    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql="INSERT INTO smartphone (nom_s ,marque ,quantite, prix_s, image_s, keywords, description) values( '$name', '$marque' ,'$qtite' , '$price', '$img', '$description' , '$keywords')";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('Location:../../phones.php');

?>