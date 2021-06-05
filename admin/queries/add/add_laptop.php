<?php
    $name=$_POST['name'];
    $marque=$_POST['marque'];
    $price=$_POST['price'];
    $qtite=$_POST['quantite'];
    $img=$_POST['image'];
    $description=$_POST['description'];
    $keywords=$_POST['keywords'];

    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql="INSERT INTO ordinateur (nom_o ,marque ,quantite_o, prix_o,  image_o, keywords, description) values( '$name', '$marque' ,'$qtite' , '$price', '$img', '$keywords', '$description')";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('Location:../../computers.php');

?>