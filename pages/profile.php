<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>

<body class=" position-relative">
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          <i class="fa-solid fa-house" style="transform:scale(1.7) ;">

          </i>
        </a>
      </li>
      <li class="nav_item">
        <a href="./cart.php" class="profile">
          <i class="fa-sharp fa-solid fa-cart-shopping text-white me-2 me-sm-0" style="transform:scale(1.7) ;" ></i>
          
        </a>
      </li>
      <li class="nav_item">
        <a href="../actions/logoutAction.php?action=logout" class="profile">Logout
        </a>
      </li>
      
      
    </ul>

    
  </nav>


  
  <?php include '../includes/scripts.php'?>
</body>
</html>