<?php
    $name=$_POST['name'];
    $marque=$_POST['marque'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $qtite=$_POST['quantite'];
    $keywords=$_POST['keywords'];
    $img=$_POST['image'];

    $link=mysqli_connect("localhost", "root", "" , "techplus");
    $sql="INSERT INTO imprimante (nom_i, image_i, marque, prix_i, quantite, keywords, `description`)
    values('$name', '$img', '$marque' ,'$price', '$qtite' , '$keywords', '$description')";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
    header('Location:../../printers.php');

?>