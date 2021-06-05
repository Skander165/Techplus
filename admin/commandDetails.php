<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
    session_destroy();
    header('Location:./guest/user_Auth.php');
}
?>
<!DOCTYPE html>
<?php
$link = mysqli_connect("localhost", "root", "", "techplus");
$sum = 0;

$id = $_SESSION['id'];
$sql = "SELECT * FROM commande_produit where id_c = $_GET[identifiant] ";
$res_data = mysqli_query($link, $sql) or die("Bad query");

$sql = "SELECT COUNT(*) FROM commande_produit where id_u=$id";
$result = mysqli_query($link, $sql);

$total_rows = mysqli_fetch_array($result)[0];
$_SESSION['total_rows'] = $total_rows;
?>

<head>
    <title>Command Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <link rel="stylesheet" href="../user/style.css">
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
    <?php include "./templates/admin_header.php" ?>
    <br><br>


    <a href="./all_commands.php" class="btn btn1 btn2 btn-danger">All Commands ></a>
    <h1>
        <center>Command Products :</center>
    </h1>
    <br>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <?php
                                while ($row1 = mysqli_fetch_assoc($res_data)) {
                                    if ($row1['id_table'] == 1) {
                                        $id = $row1['id_p'];
                                        $sql1 = "select * from `smartphone` where `id`='$id'";
                                        $result = mysqli_query($link, $sql1) or die('Erreur SQL !' . mysqli_error($link));
                                        if ($row = mysqli_fetch_assoc($result)) {
                                            $sum = $sum + $row['prix_s'];
                                ?>
                                            <div class="col-md-4">
                                                <a href="phoneDetails.php?identifiant=<?php echo $row['id']; ?>">
                                                    <div class="single-box">
                                                        <div class="img-area"><img src="../ressources/<?php echo $row['image_s'] ?>" /></div>
                                                        <div class="img-text">
                                                            <h2><?php echo $row['nom_s'] ?></h2>
                                                            <p><?php echo $row['prix_s'] ?>DT</p>
                                                            <p><?php echo $row1['quantity'] ?></p>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php }
                                    } else if ($row1['id_table'] == 2) {
                                        $id = $row1['id_p'];
                                        $sql1 = "select * from ordinateur where id=$id";
                                        $result = mysqli_query($link, $sql1);
                                        if ($row = mysqli_fetch_assoc($result)) {
                                            $sum = $sum + $row['prix_o']; ?>
                                            <div class="col-md-4">
                                                <a href="computerDetails.php?identifiant=<?php echo $row['id']; ?>">
                                                    <div class="single-box">
                                                        <div class="img-area"><img src="../ressources/<?php echo $row['image_o'] ?>" /></div>
                                                        <div class="img-text">
                                                            <h2><?php echo $row['nom_o'] ?></h2>
                                                            <p><?php echo $row['prix_o'] ?>DT</p>
                                                            <p><?php echo $row1['quantity'] ?></p>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php
                                        }
                                    } else if ($row1['id_table'] == 3) {
                                        $id = $row1['id_p'];
                                        $sql = "select * from tablette where id=$id";
                                        $result = mysqli_query($link, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        $sum = $sum + $row['prix_t']; ?>
                                        <div class="col-md-4">
                                            <a href="tabletDetails.php?identifiant=<?php echo $row['id']; ?>">
                                                <div class="single-box">
                                                    <div class="img-area"><img src="../ressources/<?php echo $row['image_t'] ?>" /></div>
                                                    <div class="img-text">
                                                        <h2><?php echo $row['nom_t'] ?></h2>
                                                        <p><?php echo $row['prix_t'] ?>DT</p>
                                                        <p><?php echo $row1['quantity'] ?></p>
                                                    </div>
                                                </div>
                                        </div>
                                    <?php
                                    } else if ($row1['id_table'] == 4) {
                                        $id = $row1['id_p'];
                                        $sql = "select * from imprimante where id=$id";
                                        $result = mysqli_query($link, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        $sum = $sum + $row['prix_i']; ?>
                                        <div class="col-md-4">
                                            <a href="printerDetails.php?identifiant=<?php echo $row['id']; ?>">
                                                <div class="single-box">
                                                    <div class="img-area"><img src="../ressources/<?php echo $row['image_i'] ?>" /></div>
                                                    <div class="img-text">
                                                        <h2><?php echo $row['nom_i'] ?></h2>
                                                        <p><?php echo $row['prix_i'] ?>DT</p>
                                                        <p><?php echo $row1['quantity'] ?></p>
                                                    </div>
                                                </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add_computer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Command Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="add_command.php?sum=<?php echo $sum; ?>">
                            <center>
                                <h3>Commande total: <?php echo "$sum DT"; ?></h3>
                            </center>
                            <center><input type="submit" value="Confirm"></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <br><br>
    <?php include "./templates/admin_footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>