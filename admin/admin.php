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
$id = $_SESSION['id'];
$sql = "SELECT * FROM root where id='$id'";
$result = mysqli_query($link, $sql) or die("Bad query");
$row = mysqli_fetch_assoc($result);

?>

<head>
  <title>Root menu</title>
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
    <br><br>
    <h1>Welcome root : <?php echo $row['nom_r']; ?> <?php echo $row['prenom_r']; ?></h1>
    <br><br>

    <a class="btn2" href="all_users.php"><button type="button" class="btn3 btn-default btn-lg btn-block">View all users</button></a><br />
    <div class="dropdown">
      <button class="btn3 btn-default btn-lg btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View all products</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="phones.php" target=_blank><button type="button" class="btn btn-default btn-lg btn-block">View smartphones</button></a>
        <a class="dropdown-item" href="computers.php" target=_blank><button type="button" class="btn btn-default btn-lg btn-block">View laptops</button></a>
        <a class="dropdown-item" href="tablets.php" target=_blank><button type="button" class="btn btn-default btn-lg btn-block">View all tablets</button></a>
        <a class="dropdown-item" href="printers.php" target=_blank><button type="button" class="btn btn-default btn-lg btn-block">View all printers</button></a>
      </div>
    </div>
    <br />
    <a class="btn2" href="all_roots.php"><button type="button" class="btn3 btn-default btn-lg btn-block">View all roots</button></a>
    <br>
    <a class="btn2" href="all_commands.php"><button type="button" class="btn3 btn-default btn-lg btn-block">View all commands</button></a>
  </div>
  <br><br><br><br><br>
  <?php include "./templates/admin_footer.php" ?>

</body>

</html>