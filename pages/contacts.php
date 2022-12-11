<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>

<body class=" position-relative">
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          <i class="fa-solid fa-house d-sm-none me-2">

          </i>Home
        </a>
      </li>

      <li class="nav_item ">
        <a href="">
          <i class="fa-solid fa-bars-sort d-sm-none me-2">

          </i>Menu
        </a>
      </li>
      <li class="nav_item "><a href="">Orders</a></li>
      <li class="nav_item "><a href="./aboutus.php"> About us</a></li>
      <li class="nav_item active-tab"> <a href="">Contact us</a></li>
      <li class=" d-none d-sm-flex">
        <a href="./profile.php" class="profile">
          <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
        </a>
      </li>
      
    </ul>

    <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

    <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
  </nav>


  <!-- <div class="container">
    <hr>
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">About</a></li>
      </ul>
      <hr/>

      <p class="text-center text-muted">© 2022 FoodsFly, Org</p>
    </footer>
  </div> -->
  <?php include '../includes/scripts.php'?>
</body>
</html>