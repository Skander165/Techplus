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
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$sql = "SELECT * FROM imprimante LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($link, $sql) or die("Bad query");

$sql = "SELECT COUNT(*) FROM imprimante";
$result = mysqli_query($link, $sql);


$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>

<head>
    <title>All Smartphones</title>
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "./templates/admin_header.php" ?>
    <div class="container">
        <br><br>
        <h1 class="link">All Printers</h1>
        <div style="text-align: right;">
            <a href="./admin.php"><button class="btn btn-default btn-danger">Return</button></a>
        </div>
        <br>
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>Delete</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search']) && $_GET['search'] != '') {
                    include "./queries/search/search_printer.php";
                } else {
                    while ($row = mysqli_fetch_assoc($res_data)) {
                ?>
                        <tr>
                            <td><a href="./queries/delete/deletePrinter.php?identifiant=<?php echo $row['id'] ?>" onclick='return checkDelete()'><img src="../ressources/bin.PNG" width=25px height=30px /></a></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nom_i']; ?></td>
                            <td><img src="../ressources/<?php echo $row['image_i']; ?>" width=40px height=40px></td>
                            <td><?php echo $row['marque']; ?></td>
                            <td><?php echo $row['prix_i']; ?></td>
                            <td><?php echo $row['quantite']; ?></td>
                            <td><a href="printerDetails.php?identifiant=<?php echo $row['id']; ?>" class="link">Voir dossier</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>

        </table>
        <?php
        if (!isset($_GET['search']) || $_GET['search'] == '') {
        ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="?pageno=1">Début</a></li>
                    <li class="page-item <?php if ($pageno <= 1) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php if ($pageno <= 1) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno - 1);
                                                    } ?>">Précédent</a>
                    </li>
                    <li class="page-item <?php if ($pageno >= $total_pages) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno + 1);
                                                    } ?>">Suivant</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Fin</a></li>
                </ul>
            </nav>

        <?php
        }
        ?>
        <h6 style="text-align:center;"><a data-toggle="modal" data-target="#add_printer_modal" href="#" class="link" target="_blank">+ New Printer</a></h6>

    </div>
    <!-- Add Printer Modal start -->
    <div class="modal fade" id="add_printer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Printer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form method="POST" action="./queries/add/add_printer.php">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Printer Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Printer Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input type="text" name="marque" class="form-control" placeholder="Enter Printer Brand">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Printer Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter Printer desc"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Printer Quantity</label>
                                    <input type="number" name="quantite" class="form-control" placeholder="Enter Printer Quantity">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Printer Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter Printer Price">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Printer Keywords <small>(eg: apple, iphone, mobile)</small></label>
                                    <input type="text" name="keywords" class="form-control" placeholder="Enter Printer Keywords">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Printer Image <small>(format: jpg, jpeg, png)</small></label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="Submit" class="btn btn-primary add-printer btn-danger">Add Printer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Printer Modal end -->
    <br><br><br><br><br>
    <?php include "./templates/admin_footer.php" ?>



</body>

</html>