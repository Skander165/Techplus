<?php

function confirmUpdate($msg)
{

    echo "<script>alert('$msg');</script>";
}

$link = mysqli_connect("localhost", "root", "", "techplus");
$printer_id = $_POST['identifiant'];
$printer_image = $_POST['printer_img'];
if (!$printer_image) {
    $printer_image = "SELECT `image_i` FROM `imprimante` WHERE id = '$printer_id'";
    $printer_image = mysqli_query($link, $printer_image) or die('Erreur SQL !' . mysqli_error($link));
    $printer_image = mysqli_fetch_assoc($printer_image);
    $printer_image = $printer_image['image_i'];
}
$printer_name = $_POST['printer_name'];

$brand = $_POST['printer_brand'];

$printer_price = $_POST['printer_price'];
$printer_quantity = $_POST['printer_quantity'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];


$sql = "UPDATE `imprimante` SET 
            nom_i='$printer_name',
            marque='$brand',
            prix_i='$printer_price',
            quantite='$printer_quantity',
            image_i = '$printer_image',
            keywords = '$keywords',
            description = '$description'
            WHERE `imprimante`.`id` = $printer_id";
//mysqli_query($link, $sql) or die((confirmUpdate('An Error Occured While Updating This printer')));
mysqli_query($link, $sql) or die('Erreur SQL !' . mysqli_error($link));

header('location:../../printers.php');
