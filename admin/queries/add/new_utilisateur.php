<?php
  session_start ();
  if ($_SESSION["autoriser"]!="oui")
  { session_destroy();
    header("location:root.html");
  } 
?>
<!DOCTYPE html>
<head>
    <title>Welcome to TechPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .for{
            margin-left : 20%;
            margin-right : 20%;
            margin-top : 1%;
            
            padding : 2%;
        }

        form{
            margin-top:3%;

        }

        form .row{
            margin-bottom : 3%;
            
        }

        input{
            margin-left:0;
        }

        #red{
            background :grey;
            color:#f3f3f3;
        }

        .nav-item a {
            color : grey;
        }
        .btn1{
            background : red;
            border-color : red;
            color : white;
        }

        .btn1:hover{
            background : white;
            border-color : red;
            color : grey; 
        }

        .link{
            color : red;
        }
    </style>
</head>
<body>
    <header class="row mx-md-n5 p-3 bg-dark text-white">
        <div class="container">
          <div class="col px-md-2 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <a class="nav-link" href="techplus.php"><img src="unnamed.jpg" height="50" width="150"></a>
            </a>
    
            <div class="col px-md-2">
              <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search...">
              </form>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn1 btn-danger">Search</button>
            </div>
            <div class="col px-md-1">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li class="nav-item dropdown">
                    <a style="padding-right: 35px;" class="nav-link dropdown-toggle" id="action" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="all_roots.php">Roots list</a>
                    <a class="dropdown-item" href="all_users.php">Users list</a>
                    <a class="dropdown-item" href="">Products List</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="admin.php">Root menu</a>
                </div>
              </li>
            </ul>
        </div>
        <div class="col px-md-1">
            <form method="POST" action ="logout1.php">
                <input type="submit" class="btn btn1 btn-danger" value="Logout"/>
            </form>
            </div>
          </div>
      </header>
<div class="for">
    <h1 class="link" >New user </h1>

    <form method="post" action="creation2.php">
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


            <div class="row mx-md-n5 ">
                <div class="col px-md-2">
                    <input type="tel" class="form-control" id="inputAddress" name="tel" placeholder="Phone number" required>
                </div>
            </div>

          <div class="row mx-md-n5 ">
            <div class="col px-md-2">
                <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="Address (Main)" required>
            </div>
        </div>

            <div class="row mx-md-n5 form-group">
                <div class="col px-md-2">
                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Address 2">
                </div>
            </div>

            <div class="row mx-md-n5">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" required>
              </div>
              <div class="form-group col-md-4">
                <select id="inputState" name="state"  class="form-control" required>
                  <option selected>State</option>
                  <option>Tunis</option>
                  <option>Ariana</option>
                  <option>Ben Arous</option>
                  <option>Nabeul</option>
                  <option>Sousse</option>
                  <option>Sfax</option>                  
                  <option>Gabes</option>

                </select>
              </div>
              <div class="form-group col-md-2">
                <input type="text" class="form-control" name="zip" id="inputZip" placeholder="Zip" required>
              </div>
            </div>
            <button type="submit" class="btn btn-secondary">Add user</button>
          </form>
      </div>
</body>