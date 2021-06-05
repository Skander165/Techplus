<?php
        $nom= $_POST['lastname'];
        $prenom= $_POST['firstname'];
        $mail= $_POST['email'];
        $password= $_POST['password'];
        $tel= $_POST['tel'];
        $address= $_POST['address1'];
        $city= $_POST['city'];
        $state= $_POST['state'];
        $zip= $_POST['zip'];
        session_start();

        $conn=mysqli_connect("localhost", "root", "" , "techplus");

        $query="INSERT INTO user set prenom_u='$prenom', nom_u='$nom' , email='$mail' , password='$password' , city='$city' , state='$state' , zip='$zip'";
        $result=mysqli_query($conn,$query) or die('Erreur SQL !'.mysqli_error($conn));
        echo $result;
        // $row = mysqli_fetch_assoc($result);
        $_SESSION["id"]=$row['id_u'];
        $_SESSION["autorisation"]="oui";
        header('Location:../techplus.php');
?> 
