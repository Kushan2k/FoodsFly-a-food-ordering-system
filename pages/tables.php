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
  <link rel="stylesheet" href="../assets/css/tables.css">

</head>

<body class=" position-relative">
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " ><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>
      <li class="nav_item"><a href="../pages/menu.php"><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>Menu</a></li>
      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>Book a Table</a></li>

      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="./order.php">Orders</a></li>';
      }?>
      <li class="nav_item"><a href="./aboutus.php"> About us</a></li>
      
      <?php
      if($logedin){?>
        <li class="mt-4 mt-md-0">
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
        <div class="col-8 col-lg-10 col-md-9 ">

          <div class="row">
            <?php
            
            $data=getTableData($conn);

            if($data==null){

            }else{
                for($i=0; $i<count($data); $i++){
                    $status = $data[$i]['status'];
                    $table_number = ucfirst($data[$i]['table_number']);
                    $status_text = ($status == 0) ? 'Available' : 'Unavailable';
                    $button_html = ($status == 0) ? '<a href="#" class="btn btn-primary">Book</a>' : '<button class="btn btn-secondary" disabled>Unavailable</button>';
                    $card_class = ($status == 0) ? 'card-available' : 'card-unavailable';
                  ?>
                  
                  <div class="col-sm-6 col-lg-3 col-md-4 mb-4">
                    <div class="card <?= $card_class ?>">
                      <div class="card-body">
                        <h5 class="card-title text-black" >Table Number <?= $table_number ?></h5>
                        <h6 class="card-subtitle text-black"><?= $status_text ?></h6>
                        <br/>
                        <?php echo $button_html ?>
                        
                      </div>
                    </div>
                  </div>
                  
                  <?php }
                  
            }
            
            ?>

        </div>
      </div>
    </div>
 </section>
 <?php include '../includes/scripts.php'?>
</body>
</html>