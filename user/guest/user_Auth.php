<!DOCTYPE html>

<head>
  <title>Welcome to TechPlus</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
     -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php include "../templates/guest/headerAuth.php" ?>
  <br><br><br>
  <div class="for">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="user_Create.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-danger active" id="red" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./AdminAuthForm.php">Root</a>
      </li>
    </ul>


    <form class="form" action="auth1.php" method="post">
      <div class="row mx-md-n5">
        <div class="col px-md-2">
          <input type="email" name="email1" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="row mx-md-n5">
        <div class="col px-md-2">
          <input type="password" name="password1" class="form-control" placeholder="Password">
        </div>
      </div>

      <button type="submit" class="btn btn-danger">Login</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <br><br><br><br><br>
  <?php include "../templates/guest/footerGuest.php" ?>
</body>