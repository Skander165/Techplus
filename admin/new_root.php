<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
  session_destroy();
  header("location:../user/guest/adminAuthForm.php");
}
?>
<!DOCTYPE html>

<head>
  <title>Welcome to TechPlus</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include "./templates/admin_header.php" ?>
  <div class="for">
    <h1 class="link">New root</h1>
    <div style="text-align: right;">
      <a href="./all_roots.php"><button class="btn btn-default btn-danger">Return</button></a>
    </div>
    <br>
    <form class="form" method="post" action="./queries/add/add_Root.php">
      <div class="row mx-md-n5">
        <div class="col px-md-2">
          <input type="text" class="form-control" name="firstname" placeholder="First name" required>
        </div>
        <div class="col px-md-2">
          <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
        </div>
      </div>

      <div class="row mx-md-n5">
        <div class="col px-md-2">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="col px-md-2">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-secondary">Create</button>
    </form>
  </div>
</body>