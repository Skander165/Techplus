<?php
session_start();
if ($_SESSION["autorisation"] != "oui") {
    session_destroy();
    header('Location:./guest/user_Auth.php');
}
?>
<!DOCTYPE html>
<?php
$id = $_SESSION['id'];
$link = mysqli_connect("localhost", "root", "", "techplus");
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$sql = "SELECT id, quantity, total FROM commande JOIN user on user_id = id_u where user_id =$id LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($link, $sql) or die("Bad query");


$sql = "SELECT COUNT(*) FROM commande WHERE user_id = $id";
$result = mysqli_query($link, $sql);


$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>

<head>
    <title>All commands</title>
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "./templates/header.php" ?>


    <div class="container">
        <br>
        <h1 class="link">All commands </h1>
        <div style="text-align: right;">
            <a href="./cart.php"><button class="btn btn-default btn-danger">Return</button></a>
        </div>
        <br>
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th style="font-size: 22px;">Id</th>
                    <th style="font-size: 22px;">Quantity</th>
                    <th style="font-size: 22px;">Total</th>
                    <th style="font-size: 22px;">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_GET['search']) && $_GET['search'] != '') {
                    include "./search/search_command.php";
                } else {
                    while ($row = mysqli_fetch_assoc($res_data)) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['total']; ?> DT</td>
                            <td><a href="commandDetails.php?identifiant=<?php echo $row['id']; ?>" class="link">Voir dossier</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

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
    <?php } ?>

    <br><br>
    <?php include "./templates/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>