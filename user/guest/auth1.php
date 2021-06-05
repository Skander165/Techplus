<?php
    if(isset($_POST['email1']) && isset($_POST['password1'])){
        session_start();
    $mail=$_POST['email1'];
    $pass=$_POST['password1'];

    $conn=mysqli_connect("localhost", "root", "" , "techplus");

    $query="SELECT * FROM `user` WHERE `email`='$mail' AND `password`='$pass'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"]=$row['id_u'];
        $_SESSION["autorisation"]="oui";
       header('Location:../techplus.php');
    }
    else{
        header('location:user_Auth.php');
    }
}
?>