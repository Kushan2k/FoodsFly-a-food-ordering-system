<html lang="en">
<head>
  <?php include './includes/header.php'?>
  <title>FoodsFly-Home</title>
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class=" position-relative">

<nav class="container-fluid  px-4 bg-dark d-flex flex-row navbar-div justify-content-end">
  <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
    <li class="nav_item " >Home</li>
    <li class="nav_item">Menu</li>
    <li class="nav_item">Orders</li>
    <li class="nav_item">About us</li>
    <li class="nav_item">Contact us</li>
    
  </ul>
  <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

  <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
</nav>

  

  




  <script src="./assets/js/navbar.js"></script>
  <?php include './includes/scripts.php'?>
</body>
</html>