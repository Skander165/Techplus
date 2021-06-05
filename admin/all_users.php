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
$sql = "SELECT * FROM user LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($link, $sql) or die("Bad query");

$sql = "SELECT COUNT(*) FROM user";
$result = mysqli_query($link, $sql);


$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>

<head>
    <title>All users</title>
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
        <h1 class="link">All users </h1>
        <div style="text-align: right;">
            <a href="./admin.php"><button class="btn btn-default btn-danger">Return</button></a>
        </div>
        <br>
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th style="font-size: 22px;">Delete</th>
                    <th style="font-size: 22px;">Firstname</th>
                    <th style="font-size: 22px;">Lastname</th>
                    <th style="font-size: 22px;">Address</th>
                    <th style="font-size: 22px;">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search']) && $_GET['search'] != '') {
                    include "./queries/search/search_user.php";
                } else {
                    while ($row = mysqli_fetch_assoc($res_data)) {
                ?>
                        <tr>
                            <td><a href="./queries/delete/deleteUser.php?identifiant=<?php echo $row['id_u'] ?>"><img src="../ressources/bin.PNG" width=25px height=30px /></a></td>
                            <td><?php echo $row['nom_u']; ?></td>
                            <td><?php echo $row['prenom_u']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><a href="modif_utilisateur.php?identifiant=<?php echo $row['id_u']; ?>" class="link">Voir dossier</a></td>
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
        <h6 style="text-align:center;"><a href="new_utilisateur.php" class="link" target="_blank">+ New user</a></h6>

    </div>
    <br><br><br><br><br>
    <?php include "./templates/admin_footer.php" ?>
</body>

</html>