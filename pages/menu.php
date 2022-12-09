<?php

include_once '../utils/jwt-auth.php';

$logedin=false;
if(checkIsLogedIn()){
  $logedin=true;
}



?>

<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-Home</title>
   
</head>

<body class=" position-relative">
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " ><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>Menu</a></li>

      <li class="nav_item"><a href="">Orders</a></li>
      <li class="nav_item"><a href=".aboutus.php"> About us</a></li>
      <li class="nav_item"><a href=".contacts.php">Contact us</a></li>
      
      <?php
      if($logedin){?>
        <li class=" d-none d-sm-flex">
          <a href="./pages/profile.php" class="profile">
            <i class="fa-solid fa-user text-white">

            </i>
          </a>
        </li>
      <?php }else {?>
        <li class="nav_item"><a href="./pages/register.php">Register</a></li>
        <li class="nav_item"><a href="./pages/login.php">Login</a></li>
      <?php }?>
      
    </ul>

    

    <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

    <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
  </nav>

  <section class="menu_page mt-3">
    <div class="container serach_options_box">
      <div class="row ">    
        <div class="col-10 mx-auto ">
          <div class="row mx-auto">
            <div class="col-2 m-0">
              <p class="alert alert-danger">hello</p>
            </div>
            <div class="col-6 m-0">
              <p class="alert alert-warning">hello</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container menu-items-box">

    </div>
  </section>

 <?php include '../includes/scripts.php'?>
</body>
</html>