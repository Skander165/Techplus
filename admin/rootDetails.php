<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
    session_destroy();
    header("location:../user/guest/adminAuthForm.php");
}
?>
<!DOCTYPE html>
<html>
<?php
$link = mysqli_connect("localhost", "root", "", "techplus");
$identifiant = $_GET['identifiant'];
$sql = "SELECT * FROM `root` WHERE id='$identifiant'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <title>User Data</title>
    <meta charset="utf-8">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "./templates/admin_header.php" ?>

    <div class="container">
        <br>
        <br>
        <h1>Admin Data</h1>
        <div style="text-align: right;">
            <a href="./all_roots.php"><button class="btn btn-default btn-danger">Return</button></a>
        </div>
        <br>

        <ul class="list-group">
            <li class="list-group-item"><b>ID: </b><input type="text" class="form-control" name="id" id="ident" value="<?php echo $identifiant; ?>" disabled></li>
            <li class="list-group-item"><b>Name : </b><input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom_r']; ?>" disabled></li>
            <li class="list-group-item"><b>Lastname: </b><input type="text" class="form-control" id="prénom" name="prenom" value="<?php echo $row['prenom_r']; ?>" disabled></li>
            <li class="list-group-item"><b>Email address : </b><input type="text" class="form-control" id="mail" name="email" value="<?php echo $row['mail_r']; ?>" disabled></li>
        </ul>
        <br>
    </div>
    <br><br><br><br><br>
    <?php include "./templates/admin_footer.php" ?>

</body>

</html>