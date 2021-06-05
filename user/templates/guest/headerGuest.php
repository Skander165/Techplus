<header class="p-1 bg-dark text-white sticky-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <a class="nav-link" href="./techplusGuest.php"><img src="../../ressources/logo.jpg" height="70" width="170"></a>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li class="dropdown">
            <a href="#" class="nav-link px-5 text-white dropdown-toggle" data-toggle="dropdown">Products</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./user_Auth.php">Computers</a></li>
              <li><a class="dropdown-item" href="./user_Auth.php">Phones</a></li>
              <li><a class="dropdown-item" href="./user_Auth.php">Tablets</a></li>
              <li><a class="dropdown-item" href="./user_Auth.php">Printers</a></li>
            </ul>
          </li>


        </ul>
        <div class="col px-md-4">
          <form class="form-inline" action="" method="GET">
            <input class="form-control mr-sm-4 col-7 " type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger my-2 my-sm-0" type="submit" >Search</button>
          </form>
        </div>
        <div class="text-end">
            <button onclick="window.location.href='./user_Auth.php'" type="button" class="btn btn-danger me-4">Login</button>
            <button onclick="window.location.href='./user_Create.php'" type="button" class="btn btn-outline-light me-4">Register</button>
            </div>

      </div>
    </div>
  </header>