<?php
    if(isset($_POST['email1']) && isset($_POST['password1'])){
    session_start();
    $mail=$_POST['email1'];
    $pass=$_POST['password1'];

    $conn=mysqli_connect("localhost", "root", "" , "techplus");
    $query="SELECT * FROM root WHERE mail_r='$mail' AND password_r='$pass'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"]=$row['id'];
        $_SESSION["autoriser"]="oui";
        $id = $_SESSION['id'];

        header("location:../../admin/admin.php?identifiant=$id");
    }
    else{
        header('location:./adminAuthForm.php');
    }
}
else{
    echo'Vide';
}
?>