<?php

function confirmUpdate($msg)
{

    echo "<script>alert('$msg');</script>";
}
$link = mysqli_connect("localhost", "root", "", "techplus");
$phone_id = $_POST['identifiant'];
$phone_image = $_POST['phone_img'];
if (!$phone_image) {
    $phone_image = "SELECT `image_s` FROM `smartphone` WHERE id = '$phone_id'";
    $phone_image = mysqli_query($link, $phone_image) or die('Erreur SQL !' . mysqli_error($link));
    $phone_image = mysqli_fetch_assoc($phone_image);
    $phone_image = $phone_image['image_s'];
}
$phone_name = $_POST['phone_name'];

$phone_brand = $_POST['phone_brand'];
$phone_price = $_POST['phone_price'];
$phone_quantity = $_POST['phone_quantity'];
$phone_description = $_POST['phone_description'];
$phone_keywords = $_POST['phone_keywords'];


$sql = "UPDATE `smartphone` SET 
            nom_s='$phone_name',
            marque='$phone_brand',
            prix_s='$phone_price',
            quantite='$phone_quantity',
            image_s = '$phone_image'
            WHERE `id` = $phone_id";
// mysqli_query($link, $sql) or die((confirmUpdate('An Error Occured While Deleting This phone')));
mysqli_query($link, $sql) or die('Erreur SQL !' . mysqli_error($link));

header('location:../../phones.php');
