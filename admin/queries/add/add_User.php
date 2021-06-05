<?php
        $nom= $_POST['lastname'];
        $prenom= $_POST['firstname'];
        $mail= $_POST['email'];
        $password= $_POST['password'];
        $address= $_POST['address1'];
        $city= $_POST['city'];
        $state= $_POST['state'];
        $zip= $_POST['zip'];

        $conn=new PDO('mysql:host=localhost;dbname=techplus' , 'root' , '');

        $req = $conn -> prepare('INSERT INTO user set prenom_u=?, nom_u=? , email=? , password=? , city=? , state=? , zip=?');
        $req -> execute([$prenom, $nom, $mail, $password, $city, $state, $zip]);

        header('Location:../../techplus.html');
?> 
