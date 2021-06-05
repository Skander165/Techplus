<?php
session_start();
if($_SESSION["autorisation"]!="oui"){
  session_destroy();
  header('location:../user/guest/user_Auth.php');
}
?>
<!DOCTYPE html>
<?php
$link = mysqli_connect("localhost", "root", "", "techplus");

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$sql = "SELECT * FROM ordinateur LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($link, $sql) or die("Bad query");

$sql = "SELECT COUNT(*) FROM ordinateur";
$result = mysqli_query($link, $sql);


$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>

<head>
  <title>Techplus | Computers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <?php include "./templates/header.php" ?>
  <br><br>
  <h1>
    <center>Computers:</center>
  </h1>
  <br />



  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <?php
                if (isset($_GET['search']) && $_GET['search'] != '') {
                  include "./search/search_computer.php";
                } else {
                  while ($row = mysqli_fetch_assoc($res_data)) {
                ?>
                  <a href="ordinateur.php?identifiant=<?php echo $row['id'];?>">

                    <div class="col-md-4">
                      <div class="single-box">
                        <div class="img-area"><img src="../ressources/<?php echo $row['image_o'] ?>" /></div>
                        <div class="img-text">
                          <h2><?php echo $row['nom_o'] ?></h2>
                          <p><?php echo $row['prix_o'] ?>DT</p>
                          <a href="add_cart_com.php?identifiant=<?php echo $row['id'] ;?>"><button class="img-btn btn btn-danger btn-xs" >Add To Cart</button></a>
                        </div>
                        <br>
                      </div>
                    </div>
                  </a>
                <?php }
                } ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

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