<?php

function confirmUpdate($msg)
{

    echo "<script>alert('$msg');</script>";
}

$link = mysqli_connect("localhost", "root", "", "techplus");
$tablet_id = $_POST['identifiant'];
$tablet_image = $_POST['tablet_img'];
if (!$tablet_image) {
    $tablet_image = "SELECT `image_t` FROM `tablette` WHERE id = '$tablet_id'";
    $tablet_image = mysqli_query($link, $tablet_image) or die('Erreur SQL !' . mysqli_error($link));
    $tablet_image = mysqli_fetch_assoc($tablet_image);
    $tablet_image = $tablet_image['image_t'];
}
$tablet_name = $_POST['tablet_name'];

$brand = $_POST['tablet_brand'];

$tablet_price = $_POST['tablet_price'];
$tablet_quantity = $_POST['tablet_quantity'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];


$sql = "UPDATE `tablette` SET 
            nom_t='$tablet_name',
            marque='$brand',
            prix_t='$tablet_price',
            quantite_t='$tablet_quantity',
            image_t = '$tablet_image',
            keywords = '$keywords',
            description = '$description'
            WHERE `tablette`.`id` = $tablet_id";
//mysqli_query($link, $sql) or die((confirmUpdate('An Error Occured While Updating This tablet')));
mysqli_query($link, $sql) or die('Erreur SQL !' . mysqli_error($link));

header('location:../../tablets.php');
