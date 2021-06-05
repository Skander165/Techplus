<?php
session_start();
if ($_SESSION["autorisation"] != "oui") {
    session_destroy();
    header('Location:./guest/user_Auth.php');
}
?>
<!DOCTYPE html>
<?php
$link = mysqli_connect("localhost", "root", "", "techplus");
$sum = 0;
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$id = $_SESSION['id'];
$sql = "SELECT * FROM cart where user_id =$id LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($link, $sql) or die("Bad query");


$sql = "SELECT COUNT(*) FROM cart where user_id=$id";
$result = mysqli_query($link, $sql);

$total_rows = mysqli_fetch_array($result)[0];
$_SESSION['total_rows'] = $total_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>

<head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .im {
            width: 30%;
            height: 90%;
        }

        .num {
            margin-left: 20%;
            width: 90%;
            border-color: red;
        }

        .col12 {
            margin-left: 20%;
            margin-right: 20%;
        }

        .btn2 {
            margin-left: 85%;
        }

        #exampleModalLabel {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include "./templates/header.php" ?>
    <br>


    <a href="./all_commands.php" class="btn btn1 btn2 btn-danger">All Commands ></a>
    <?php
    if ($total_rows == 0) {
        include "./empty_cart.php";
    } else {
        include "./populated_cart.php";
    }
    ?>


    <br><br>
    <?php include "./templates/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>