<?php
    include('../util/rootCRUD.php');
        $id = $_POST['id'];
        echo $id;
        $lastname=$_POST['nom'];
        $firstname=$_POST['prenom'];
        $email=$_POST['email'];
        $password=$_POST['pwd'];
        $link = mysqli_connect("localhost" , "root" , "" , "techplus");

        editroot($link,$id,$lastname,$firstname,$email,$password);
        header("Location:../../modif_root.php?identifiant=".$id);

    ?>