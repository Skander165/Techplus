_<?php
    $name=$_POST['name'];
    $marque=$_POST['marque'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $qtite=$_POST['quantite'];
    $keywords=$_POST['keywords'];
    $img=$_POST['image'];

    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql="INSERT INTO tablette (nom_t, marque, image_t, prix_t, quantite_t, keywords, `description`)
    values('$name', '$marque', '$img', '$price', '$qtite' , '$keywords', '$description')";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('Location:../../tablets.php');

?>