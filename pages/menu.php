<?php

include_once '../utils/jwt-auth.php';
include_once '../utils/select_data.php';
include_once '../utils/conn.php';

$logedin=false;
$cart_count=0;

if(checkIsLogedIn()){
  $logedin=true;
  $user=verifyJWT($_COOKIE['jwt-token']);
  if($user!=null){
    $cart_count=getCartItemCount($conn,$user['user_id']);
  }
}

?>

<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-Home</title>
  <link rel="stylesheet" href="../assets/css/menu.css">
   
</head>

<body class=" position-relative">
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " ><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>Menu</a></li>

      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="">Orders</a></li>';
      }?>
      <li class="nav_item"><a href="./aboutus.php"> About us</a></li>
      
      <?php
      if($logedin){?>
        <li class="">
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

  <section class="menu_page mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-5 col-lg-3 col-md-3">

          <div class="card" style="border: none;">
            <div class="card-header">
              Category
            </div>
            <ul class="list-group list-group-flush" data-parent="category">
              <li class="list-group-item">All</li>
              <li class="list-group-item">Mains</li>
              <li class="list-group-item">Sides</li>
              <li class="list-group-item">Dessert</li>
              <li class="list-group-item">Beverages</li>
              <li class="list-group-item">Short eats</li>
            </ul>
          </div>

          <div class="card mt-3" style="border: none;">
            <div class="card-header">
              Price Range(LKR)
            </div>
            <ul class="list-group list-group-flush" data-parent="price">
            <li class="list-group-item">0-400</li>
              <li class="list-group-item">400-700</li>
              <li class="list-group-item">700-1500</li>
              <li class="list-group-item">1500-Up</li>
            </ul>
          </div>
        </div>
        <div class="col-7 col-lg-9 col-md-9 ">

          <div class="row">
            <?php
            
            $data=getMenuItemData($conn);

            if($data==null){

            }else{
              for($i=0;$i<count($data);$i++){?>
                <div class="col-sm-6 col-lg-4 col-md-6 mb-4 menu_item" data-cat="<?= ucfirst($data[$i]['category']) ?>" data-price="<?= $data[$i]['price']?> " >
                  <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                      <img src="<?= $data[$i]['img_url']?>" class="img-fluid" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?= ucfirst($data[$i]['name'])?></h5>
                      <h6 class="card-subtitle text-muted"><?= ucfirst($data[$i]['category'])?></h6>
                      <h4 class="text-success mt-2">Rs <?= number_format($data[$i]['price'],2,'.',',') ?></h4>
                      <div class="d-flex justify-content-between align-items-center">
                        <?php

                        if($logedin){?>
                            <button data-itemID=<?= $data[$i]['menu_id'] ?>
                             class="btn btn-primary border-0 bg-transparent fa-sharp text-dark fa-solid fa-cart-shopping"></button>
                        <?php }?>
                        <h1 class="text-warning">
                          <?php
                          
                          $rating=$data[$i]['rating'];
                          $count=$data[$i]['rate_count'];
                          $total=(int)$rating/$count;
                          for($j=0;$j<$total;$j++){
                           
                            echo '<i class="fa-solid h6 text-warning fa-star"></i>';
                          }
                          
                          ?>
                        </h1>
                      </div>
                    </div>
                  </div>
                </div>

              <?php }
            }
            
            ?>
          </div>

        </div>
      </div>
    </div>

    <div class="msg d-none">
      <h4 class="text-center">added to the cart</h4>
    </div>

    <?php

    if($logedin){?>
      <div class="cart bg-dark" style="border-radius: 50%;">
      
        <a class="bg-transparent cart-btn border-0" href="./cart.php?action=view-cart">
          <h3 class="text-danger cart-count"><?= $cart_count ?></h3>  
        <i class="fa-solid fa-cart-shopping text-white"></i></a>
      </div>

    <?php }?>
    
  </section>
  <?php include_once '../includes/footer.php'?>
  <script src="../assets/js/menu.js"></script>
 <?php include '../includes/scripts.php'?>
</body>
</html>