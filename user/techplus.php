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
$sql = "SELECT * FROM smartphone order by id desc";
$sql1 = "SELECT * FROM tablette order by id desc";
$sql2 = "SELECT * FROM ordinateur order by id desc";

$result = mysqli_query($link, $sql) or die("Bad query");
$result1 = mysqli_query($link, $sql1) or die("Bad query");
$result2 = mysqli_query($link, $sql2) or die("Bad query");
$i = 0;
?>

<html>

<head>
  <title>TechPlus</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include "./templates/header.php" ?>

  <div class="row">
    <div class="list-group col-4">
      <a href="./computerList.php" class="list-group-item list-group-item-action list-group-item-dark  l1">Ordinateurs</a>
      <a href="./phoneList.php" class="l1 list-group-item list-group-item-action list-group-item-dark">Smartphones</a>
      <a href="./tabletList.php" class="l1 list-group-item list-group-item-action list-group-item-dark ">Tablettes</a>
      <a href="./printerList.php" class="l1 list-group-item list-group-item-action list-group-item-dark ">Impression</a>
    </div>

    <div class="image col-5">
      <img src="../ressources/iphone-12-pro-concept-noir.jpg" class="d-block w-100" height="90%" alt="...">
    </div>

    <div class="image col-2">
      <img src="../ressources/Promo.png" class="d-block w-100" alt="...">
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result) and $i < 3) {
                  $i = $i + 1;
                ?>
                  <div class="col-md-4">
                    <div class="single-box">
                      <div class="img-area"><img src="../ressources/<?php echo $row['image_s'] ?>" /></div>
                      <div class="img-text">
                        <h2><?php echo $row['nom_s'] ?></h2>
                        <p><?php echo $row['prix_s'] ?>DT</p>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <?php
                  $i = 0;
                  while ($row = mysqli_fetch_assoc($result1) and $i < 3) {
                    $i = $i + 1;
                  ?>
                    <div class="col-md-4">
                      <div class="single-box">
                        <div class="img-area"><img src="../ressources/<?php echo $row['image_t'] ?>" /></div>
                        <div class="img-text">
                          <h2><?php echo $row['nom_t'] ?></h2>
                          <p><?php echo $row['prix_t'] ?>DT</p>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <?php
                  $i = 0;
                  while ($row = mysqli_fetch_assoc($result2) and $i < 3) {
                    $i = $i + 1;
                  ?>
                    <div class="col-md-4">
                      <div class="single-box">
                        <div class="img-area"><img src="../ressources/<?php echo $row['image_o'] ?>" /></div>
                        <div class="img-text">
                          <h2><?php echo $row['nom_o'] ?></h2>
                          <p><?php echo $row['prix_o'] ?>DT</p>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <?php include "./templates/footer.php" ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>