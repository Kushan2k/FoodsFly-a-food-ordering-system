<?php

include_once '../utils/jwt-auth.php';

if(!isAdmin()){
  header("Location:../index.php",true,401);
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
        <li class="nav_item active-tab" ><a href="" class="d-flex"><i class="fa-solid fa-house "></i></a></li>

        <li class="nav_item" ><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
        <li class="nav_item" ><a href="./users.php"><i class="fa-solid fa-users "></i></a></li>
      </ul>

      <!-- <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button> -->
    </nav>
    


    
    <?php 
    // include_once '../includes/footer.php';
    include_once '../includes/scripts.php'?>
  </body>
</html>