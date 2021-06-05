<?php
session_start();
if ($_SESSION["autorisation"] != "oui") {
    session_destroy();
    header("location:../user/guest/user_Auth.php");
}
?>
<!DOCTYPE html>
<html>
<?php
$link = mysqli_connect("localhost", "root", "", "techplus");
$identifiant = $_GET['identifiant'];
$sql = "SELECT * FROM tablette WHERE id='$identifiant'";

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <title>Tablet Data</title>
    <meta charset="utf-8">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../admin/style.css">
</head>

<body>
    <?php include "./templates/header.php" ?>
    <br />
    <div class="container">
        <br>
        <br>
        <h1>Tablet Data</h1>
        <div style="text-align: right;">
            <a href="tabletList.php"><button class="btn btn-default btn-danger">Return</button></a>
        </div>
        <br>

        <form role="form">
            <ul class="list-group">
                <div class="row">

                    <div class="col-8">

                        <!-- <li class="list-group-item"><b>ID: </b><input type="text" class="form-control" name="identifiant" id="ident" value="<?php echo $identifiant; ?>" readonly></li> -->
                        <li class="list-group-item"><b>Name: </b><input type="text" class="form-control" id="name" value="<?php echo $row['nom_t']; ?>" disabled></li>
                        <li class="list-group-item"><b>Price: </b><input type="text" class="form-control" id="price" value="<?php echo $row['prix_t']; ?>" disabled></li>
                        <li class="list-group-item"><b>Quantity: </b><input type="text" class="form-control" id="quantity" value="<?php echo $row['quantite_t']; ?>" disabled></li>
                    </div>
                    <li><label for="image">
                            <input type="file" name="phone_img" id="image" style="display:none" disabled />
                            <img id="img" style="border: 2px solid red; cursor: pointer;" class="col-2.8" src="../ressources/<?php echo $row['image_t']; ?> " height=250px>
                        </label>
                    </li>
                </div>
                <li class="list-group-item"><b>Description: </b><input type="text" class="form-control" id="quantity" value="<?php echo $row['description']; ?>" disabled></li>
                <li class="list-group-item"><b>Keywords: </b><input type="text" class="form-control" id="quantity" value="<?php echo $row['keywords']; ?>" disabled></li>
                <li class="list-group-item"><b>Brand: </b><input class="form-control" id="brand" name="phone_brand" value="<?php echo $row['marque']; ?>" disabled></li>

            </ul>
            <br />
        </form>
    </div>
    <br>
</body>

</html>