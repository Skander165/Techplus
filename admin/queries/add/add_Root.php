<?php
        $nom= $_POST['lastname'];
        $prenom= $_POST['firstname'];
        $mail= $_POST['email'];
        $password= $_POST['password'];
        $id=$_GET['identifiant'];

        $link=mysqli_connect("localhost", "root", "" , "techplus");

        $sql="INSERT INTO `root` set  prenom_r='$prenom' , nom_r='$nom' , mail_r='$mail' , password_r='$password'";
        mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
        header("location:../../all_roots.php?identifiant=$id");

?> 