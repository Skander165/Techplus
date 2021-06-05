<?php 
function edituser($link,$identifiant,$lastname,$firstname,$add,$tel,$email)
{
    $sql = "UPDATE `user` SET nom_u='$lastname',`prenom_u`='$firstname',`email`='$email',`tel`='$tel',`address`='$add' WHERE id_u=$identifiant";
    mysqli_query($link,$sql) or die('Erreur SQL !'.mysqli_error($link));
}

?>