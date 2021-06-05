<?php

function confirmUpdate($msg)
{

    echo "<script>alert('$msg');</script>";
}

$link = mysqli_connect("localhost", "root", "", "techplus");
$computer_id = $_POST['identifiant'];
$computer_image = $_POST['computer_img'];
if (!$computer_image) {
    $computer_image = "SELECT `image_o` FROM `ordinateur` WHERE id = '$computer_id'";
    $computer_image = mysqli_query($link, $computer_image) or die('Erreur SQL !' . mysqli_error($link));
    $computer_image = mysqli_fetch_assoc($computer_image);
    $computer_image = $computer_image['image_o'];
}
$computer_name = $_POST['computer_name'];

$brand = $_POST['computer_brand'];

$computer_price = $_POST['computer_price'];
$computer_quantity = $_POST['computer_quantity'];
$computer_description = $_POST['description'];
$computer_keywords = $_POST['keywords'];


$sql = "UPDATE `ordinateur` SET 
            nom_o='$computer_name',
            marque='$brand',
            prix_o='$computer_price',
            quantite_o='$computer_quantity',
            image_o = '$computer_image',
            keywords = '$computer_keywords',
            description = '$computer_description'
            WHERE `ordinateur`.`id` = $computer_id";
//mysqli_query($link, $sql) or die((confirmUpdate('An Error Occured While Updating This computer')));
mysqli_query($link, $sql) or die('Erreur SQL !' . mysqli_error($link));

header('location:../../computers.php');
