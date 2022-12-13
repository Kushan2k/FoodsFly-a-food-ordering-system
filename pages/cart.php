<?php

include_once '../utils/jwt-auth.php';
include '../utils/conn.php';
include '../utils/select_data.php';


$logedin=false;
$user_id=0;
$cart_count=0;

if(checkIsLogedIn()){
  $logedin=true;
  $user=verifyJWT($_COOKIE['jwt-token']);
  if($user!=null){
    $user_id=$user['user_id'];
  }else{
    header("Location:./menu.php",true,403);
  }
}else{
  header("Location:../index.php");
}

?>

<html lang="en">
<head>
  <title>Foodsfly-My Cart</title>
  <?php include '../includes/header.php'?>
</head>
<body>

  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " ><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>My Cart</a></li>

      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="">Orders</a></li>';
      }?>
      <li class="nav_item"><a href="./aboutus.php"> About us</a></li>
      
      <?php
      if($logedin){?>
        <li class=" d-none d-sm-flex">
          <a href="./profile.php" class="profile">
            <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
          </a>
        </li>
      <?php }else {?>
        <li class="nav_item"><a href="./register.php">Register</a></li>
        <li class="nav_item"><a href="./login.php">Login</a></li>
      <?php }?>
      
    </ul>

    

    <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

    <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
  </nav>


  <section class="mt-5 container py-3" style="background-color: #eee;">

    <div class="container">
      <?php

        $cartItems=getCartItemsByUserID($conn,$user_id);

        foreach($cartItems as $item){?>
          <div class="row my-2">
            <div class="col-10 mx-auto d-flex justify-content-between align-items-center">
              <div class="d-flex  ">
                <img src="<?= $item['img_url'] ?>" width="100px" height="100px" alt="">
                <div class="d-flex flex-column m-3 pb-1" style="border-bottom: 2px solid grey;">
                  <h3 class="display-6"><?= ucfirst($item['name']) ?></h3>
                  <small class="d-none d-md-flex"><b><?= ucfirst($item['category'])?></b></small>
                  
                </div>
              </div>
              <div class="price-box d-flex align-items-center">
                <p class="m-0">Rs.<?= number_format($item['price'],2,'.',',') ?></p>
                <div class="options ms-2 ms-md-5">
                  <button class="bg-transparent text-danger border-0 fa-solid fa-trash"></button>
                </div>
              </div>
              
            </div>
          </div>
          
        <?php }


        ?>
        <div class="container d-flex justify-content-end">
          <button class="btn btn-outline-success btn-lg">Proceed to checkout</button>
        </div>
        
    </div>
    
  </section>
  

  <?php
    include_once '../includes/footer.php';
    include_once '../includes/scripts.php';
  ?>
</body>
</html>