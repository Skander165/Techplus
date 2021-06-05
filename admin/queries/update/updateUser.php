<?php
    include('../util/userCRUD.php');
    $lastname=$_POST['nom'];
    $firstname=$_POST['prenom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $add=$_POST['add'];
    $identifiant = $_POST['identifiant'];

    $link = mysqli_connect("localhost" , "root" , "" , "techplus");
    edituser($link,$identifiant,$lastname,$firstname,$add,$tel,$email);
    header('Location:../../modif_utilisateur.php?identifiant='.$identifiant);

    ?>