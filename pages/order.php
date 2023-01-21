<?php
session_start();
include_once '../utils/jwt-auth.php';
include '../utils/conn.php';
include '../utils/select_data.php';

$logedin = false;
$user_id = 0;

if (checkIsLogedIn()) {
    $logedin = true;
    $user = verifyJWT($_COOKIE['jwt-token']);
    if ($user != null) {
        $user_id = $user['user_id'];
    } else {
        header("Location:./menu.php", true, 403);
    }
} else {
    header("Location:../index.php");
}

?>

<html lang="en">

<head>
  <title>Foodsfly-My Orders</title>
  <link rel="stylesheet" href="../assets/css/cart.css">
  <?php include '../includes/header.php'?>
</head>

<body>

    <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
      <h1 class="brand-name text-danger">FoodsFly</h1>

      <ul id="navbar" class="navbar d-none   d-sm-flex ">
        <!-- put navbar class -->
        <li class="nav_item "><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

        <li class="nav_item "><a href="./cart.php"><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>My Cart</a></li>

        
        <li class="nav_item active-tab"><a href="">Orders</a></li>
        
        <li class="nav_item"><a href="./aboutus.php"> About us</a></li>

        
        <li class=" d-none d-sm-flex">
            <a href="./profile.php" class="profile">
              <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
            </a>
      </li>
        

      </ul>



      <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
    </nav>

    <style>
          .custom-alert{
          
          padding: 15px;
          text-transform: capitalize;
          

          }
          .suc-error{
            border: 0.8px solid green;
            background-color: rgba(32, 125, 58, 0.3);
          }
          .error{
            border: 0.8px solid red;
            background-color: rgba(255, 0, 0, 0.09);
          }
          .warning{
            border: 0.8px solid yellow;
            background-color: rgb(247, 207, 47,0.5);
          }
    </style>

    <div class="container">
      <?php

        if(isset($_SESSION['error'])){?>
          <div class="container error-div my-2">
            <div class="row">
              <div class="col-10 col-md-6 mx-auto">
                <p class="custom-alert text-center error"><?= $_SESSION['error']?></p>
              </div>
            </div>
          </div>

          
        <?php $_SESSION['error']=null; }else if(isset($_SESSION['suc'])){?>
          <div class="container error-div my-2">
            <div class="row">
              <div class="col-10 col-md-6 mx-auto">
                <p class="custom-alert text-center suc-error"><?= $_SESSION['suc']?></p>
              </div>
            </div>
          </div>

        <?php $_SESSION['suc'] = null;}else if(isset($_SESSION['warning'])){?>
          <div class="container error-div my-2">
            <div class="row">
              <div class="col-10 col-md-6 mx-auto">
                <p class="custom-alert text-center suc-error"><?= $_SESSION['warning']?></p>
              </div>
            </div>
          </div>
          
        <?php $_SESSION['warning'] = null; }?>
    </div>

    <script>

      document.addEventListener("DOMContentLoaded",()=>{

        setTimeout(() => {
          let error=document.querySelector('.error-div');
          if(error){
            error.remove()
          }
        }, 2000);

      })
    </script>

<script src="../assets/js/cart.js"></script>
  <?php
  include_once '../includes/footer.php';
  include_once '../includes/scripts.php';
  ?>
</body>
</html>