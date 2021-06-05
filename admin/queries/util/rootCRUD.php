<?php 
function editroot($link,$id,$lastname,$firstname,$email,$pwd)
{
    $sql = "UPDATE `root` SET `nom_r`='$lastname', `prenom_r`='$firstname', `mail_r`='$email', `password_r`='$pwd' WHERE `id`='$id'";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
}

?>