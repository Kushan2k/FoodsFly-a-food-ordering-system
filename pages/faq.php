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
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>

<body class=" position-relative">

    <style>
        .social-link {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        border-radius: 50%;
        transition: all 0.3s;
        font-size: 0.9rem;
      }

      .social-link:hover,
      .social-link:focus {
        background: #ddd;
        text-decoration: none;
        color: #555;
      }
    </style>
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          <i class="fa-solid fa-house d-sm-none me-2">

          </i>Home
        </a>
      </li>

      <li class="nav_item ">
        <a href="./menu.php">
          <i class="fa-solid fa-bars-sort d-sm-none me-2">

          </i>Menu
        </a>
      </li>
      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="./order.php">Orders</a></li>';
      }?>
      <li class="nav_item active-tab"><a href=""> FAQ</a></li>
      <?php 
      
      if($logedin){?>
        <li class=" d-none d-sm-flex">
          <a href="./profile.php" class="profile">
            <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
          </a>
        </li>
      <?php }
      
      ?>
      
    </ul>

    <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

    <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button>
  </nav>

  <section class="about-us container mt-3">
    <div class='container'>
      
      <div class='row mt-3'>
        <div class="card">
          <div class="card-header">
            can the app builder setup the menu for customer?
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Yes, initially our app developer will setup the complete menu as per your requirements. However, later you will have access to add, edit and delete items as per your requirements.</p>
              
            </blockquote>
          </div>
        </div>
      </div>

      <div class='row mt-3'>
        <div class="card">
          <div class="card-header">
          What is your restaurant's cuisine?
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Our restaurant specializes in Italian cuisine, with a variety of pasta dishes, pizzas, and seafood options available.</p>
              
            </blockquote>
          </div>
        </div>
      </div>

      <div class='row mt-3'>
        <div class="card">
          <div class="card-header">
          Do you offer takeout or delivery services?
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>we offer both takeout and delivery services. You can place an order online through our website or by calling us directly</p>
              
            </blockquote>
          </div>
        </div>
      </div>

      <div class='row mt-3'>
        <div class="card">
          <div class="card-header">
          How do I create an account on your web site?
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>To create an account on our website, simply click the "Register" button on the top right corner of the page and fill out the registration form.</p>
              
            </blockquote>
          </div>
        </div>
      </div>


      <div class='row mt-3'>
        <div class="card">
          <div class="card-header">
          Do you offer gluten-free, vegetarian, or vegan options?
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Yes, we offer a variety of gluten-free, vegetarian, and vegan options on our menu.you can check the menu.</p>
              
            </blockquote>
          </div>
        </div>
      </div>


      <div class='row mt-3'>
        <div class="card">
          <div class="card-header">
          Is it necessary to create an account in order to use your website?
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Some features on our website require an account to access.However, we recommend creating an account so that you can fully enjoy all of the features and benefits of our website</p>
              
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include_once '../includes/footer.php'?>
  <?php include '../includes/scripts.php'?>
</body>
</html>