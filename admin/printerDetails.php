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
$sql = "SELECT * FROM imprimante WHERE id='$identifiant'";

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <title>Printer Data</title>
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
        <h1>Printer Data</h1>
        <div style="text-align: right;">
            <a href="./printers.php"><button class="btn btn-default btn-danger">Return</button></a>
        </div>
        <br>

        <form role="form" method="post" action="./queries/update/updatePrinter.php">
            <ul class="list-group">
                <div class="row">

                    <div class="col-8">

                        <li class="list-group-item"><b>Printer ID: </b><input type="text" class="form-control" name="identifiant" id="ident" value="<?php echo $identifiant; ?>" readonly></li>
                        <li class="list-group-item"><b>Printer Name: </b><input type="text" class="form-control" id="name" name="printer_name" value="<?php echo $row['nom_i']; ?>"></li>
                        <li class="list-group-item"><b>Printer Price: </b><input type="text" class="form-control" id="price" name="printer_price" value="<?php echo $row['prix_i']; ?>"></li>
                    </div>
                    <li><label for="image">
                            <input type="file" name="printer_img" id="image" style="display:none" oninput="changeImage()" />
                            <img id="img" style="border: 2px solid red; cursor: pointer;" class="col-2.8" src="../ressources/<?php echo $row['image_i']; ?> " height=230px>
                        </label>
                    </li>
                </div>
                <li class="list-group-item"><b>Printer Quantity: </b><input type="text" class="form-control" id="quantity" name="printer_quantity" value="<?php echo $row['quantite']; ?>"></li>
                <li class="list-group-item"><b>Printer Description: </b><input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>"></li>
                <li class="list-group-item"><b>Printer Keywords: </b><input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $row['keywords']; ?>"></li>
                <li class="list-group-item"><b>Printer Brand: </b><input class="form-control" id="brand" name="printer_brand" value="<?php echo $row['marque']; ?>"></li>

            </ul>
            <br />
            <div class="form-group" style="text-align: center;">
                <button type="submit" class="btn btn-default btn-danger" id="save" onclick="confirmUpdate();">Save</button>
            </div>
        </form>
    </div>

    <?php include "./templates/admin_footer.php" ?>
</body>

<script>
    function confirmUpdate() {
        return confirm('Are You Sure You Want To Update This printer?');
    }

    function changeImage() {
        newImageName = $('#image')[0].files[0].name;
        imagePath = $('#img')[0].src
        $('#img')[0].src = "../ressources/" + newImageName;
    }
</script>

</html>