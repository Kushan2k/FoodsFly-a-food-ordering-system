<?php

include_once '../utils/jwt-auth.php';
include_once('../utils/select_data.php');
include_once('../utils/conn.php');
if(!isAdmin() && !isChef()){
  header("Location:../index.php",401);
}

$chef = false;

if(isChef()){
  $chef = true;
}

$message_count = getNotViewdMesages($conn);
?>
<html lang="en">
<head>
  <?php include_once '../includes/header.php'?>
  <title>Foodsfly-Admin</title>
  
</head>
  <body>
    

  <style>
    .nav_item{
      padding-bottom: 10px;
    }
  </style>

    <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
      <h1 class="brand-name text-danger">FoodsFly</h1>

      <ul id="navbar" class="navbar "> <!-- put navbar class  d-none   d-sm-flex -->
        <li class="nav_item " ><a href="../index.php" class="d-flex">
          <i class="fa-solid fa-house"></i>
        </a></li>
        <li class="nav_item active-tab" ><a href="" class="d-flex">
          <i class="fa-solid fa-chalkboard-user"></i>
        </a></li>

        <?php
        if(!$chef){?>
            <li class="nav_item" ><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
          <li class="nav_item" ><a href="./view-chef.php?view=all"><i class="fa-solid fa-users "></i></a></li>
        <?php }
        ?>
      </ul>

      <!-- <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button> -->
    </nav>
    <div class="container my-3">
      <div class="row justify-content-start ">

    <?php
    if(!$chef){?>
    
        <div class="col-10 col-md-5 col-lg-4 mx-auto my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Menu Items</h5>
              <p class="card-text my-4">
                View/add/edit/delete Menu Items
              </p>
              <a href="./menu-items.php?view=all" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>

            </div>
          </div>
        </div>
        <div class="col-10 col-md-5 col-lg-4 mx-auto my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Chefs</h5>
              <p class="card-text my-4">
                Add/remove chefs here.
              </p>
              <a href="./view-chef.php" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-10 col-md-5 col-lg-4 mx-auto my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table Bookings</h5>
              <p class="card-text my-4">
                View status of the dining tablesw.
              </p>
              <a href="./table-edit.php" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>

        <style>
          .notification{
            position: absolute;
            bottom: -24px;
            right: 5px;
            font-size: 2rem;
            color:green;
            font-weight: bolder;
            background-color: white;
          }
        </style>

        <div class="col-10 col-md-5 col-lg-4 mx-auto mx-lg-0 my-2" >
        
          <div class="card" style='position: relative;'>
            <h3 class='notification <?= $message_count==0?'d-none':'' ?>'><?= $message_count?></h3>
            <div class="card-body" >
              
              <h5 class="card-title">View Messages</h5>
              <p class="card-text my-4">
                view customer problems and messages.
              </p>
              <a href="./view.message.php" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>
        

    <?php }

    ?>
    
        <div class="col-10 col-md-5 col-lg-4 mx-auto mx-lg-0 my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Review Orders</h5>
              <p class="card-text my-4">
               View/approve or decline orders from here.
              </p>
              <a href="./review-orders.php" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="my-5 container">
      <a href='../actions/logoutAction.php?action=logout'
       class='btn btn-outline-danger'>Logout</a>
    </div>


    <div class="my-5">

    </div>

    
    <?php 
    include_once '../includes/footer.php';
    include_once '../includes/scripts.php'?>
  </body>
</html>