<?php

include_once '../utils/jwt-auth.php';
if(!isAdmin()){
  header("Location:../index.php",401);
}
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

        <li class="nav_item" ><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
        <li class="nav_item" ><a href="./users.php"><i class="fa-solid fa-users "></i></a></li>
      </ul>

      <!-- <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button> -->
    </nav>

    <div class="container my-3">
      <div class="row ">
        <div class="col-10 col-md-5 col-lg-4 mx-auto my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Menu Items</h5>
              <p class="card-text my-4">
                Create/Read/Edit/Delete Menu Items
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
                you can Add/Remove Chefs here.
              </p>
              <a href="#" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-10 col-md-5 col-lg-4 mx-auto my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Summery</h5>
              <p class="card-text my-4">
                View User Activities on the site.
              </p>
              <a href="#" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-10 col-md-5 col-lg-4 mx-auto mx-lg-0  my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Review Orders</h5>
              <p class="card-text">
                You can view/Approve or Decline orders from here.
              </p>
              <a href="#" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="my-5 container">
      
    </div>


    <div class="my-5">

    </div>

    
    <?php 
    include_once '../includes/footer.php';
    include_once '../includes/scripts.php'?>
  </body>
</html>