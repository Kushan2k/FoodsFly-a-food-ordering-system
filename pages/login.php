<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>

<body class=" position-relative">
 
  <style>
    .navbar-div{
      position: static;
    }
  </style>
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          Home
        </a>
      </li>
      <li class="nav_item"><a href="./aboutus.php"> About us</a></li>
      <li class="nav_item d-none d-sm-flex"><a href="./contacts.php">Contact us</a></li>
      
    </ul>
  </nav>


  
  <?php include '../includes/scripts.php'?>
</body>
</html>