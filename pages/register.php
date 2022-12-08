<?php 
session_start();

include_once '../utils/jwt-auth.php';

if(checkIsLogedIn()){
  header("Location:../index.php");
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
    .navbar-div{
      position: static;
    }
  </style>
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          Home
        </a>
      </li>
      <li class="nav_item"><a href="./aboutus.php"> About us</a></li>
      <li class="nav_item d-none d-sm-flex"><a href="./contacts.php">Contact us</a></li>
      
    </ul>
  </nav>

  <style>
    .side-img{
      position: absolute;
      object-fit: cover;
      top: 0;
      bottom: 0;
      left: 0;
      transition: 200ms linear;
      transition: 300ms linear;

      animation-name: popup-img;
      animation-timing-function: linear;
      animation-duration: 0.5s;
      animation-delay: 0s;
      animation-fill-mode: forwards;
      animation-iteration-count: 1;
      
    }
    @keyframes popup-img {
      from{
        transform: scale(0) rotate(250deg);
      }
      to{
        transform: scale(1) rotate(0deg);
      }
    }
    .side-img:hover{
      transform: scale(1.4);
      cursor: pointer;
    }
    .img-box{
      position: relative;
      overflow: hidden;
      min-height: 30vh;
      border-radius: 1%;
    }
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
  </style>
  <p class="text-center display-6 mt-3">We are <span class="text-danger">glad,</span> that you are here.</p>

  <?php

  if(isset($_SESSION['error'])){?>
    <div class="container error-div">
      <div class="row">
        <div class="col-10 col-md-6 mx-auto">
          <p class="custom-alert text-center error"><?= $_SESSION['error']?></p>
        </div>
      </div>
    </div>

    
  <?php }
    $_SESSION['error']=null;
  ?>


 

  <section class="testimonial py-md-4 py-1" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-5 py-5 bg-primary text-white text-center img-box">
                <img class="side-img" src="../assets/images/register.background.jpg" >
            </div>

            <div class="col-md-7 py-3 py-sm-5 px-4 px-sm-3">
              <h4 class="pb-4">Please fill with your details.</h4>
              <form action="../actions/registerAction.php" method="POST" >
                  <div class="row my-2 ">
                    <div class="col-12 col-md-6">
                      <input id="Full Name" name="fullname" placeholder="Full Name" class="form-control" type="text" required="required">
                    </div>
                    <div class="col-12 col-md-6">
                      <input type="text" class="form-control" id="inputEmail4" placeholder="Email" required="required" name="email">
                    </div>
                  </div>

                  <div class="row my-2">
                    <div class="col-12 col-md-6">
                        <input id="Mobile No." name="mobile" placeholder="Mobile No." class="form-control" required="required" type="text">
                    </div>
                    <div class="col-12 col-md-6">
                      <input id="address" name="address" placeholder="Residentail Address" class="form-control" required="required" type="text">
                    </div>
                    <div class="form-group col-12 col-md-6 my-2">
                    <input id="Password" name="password" placeholder="Password" class="form-control" required="required" type="password">
                    </div>
                    <div class="col-12 col-md-6 my-2">
                    <input id="Password" name="cpassword" placeholder="Confirm Password" class="form-control" required="required" type="password">
                    </div>
                  <div class="row my-2">
                      <div class="form-group">
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                              <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                            </label>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                  <div class="form-row">
                      <button type="submit" name="register" class="btn btn-danger">Submit</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
  </section>

  <div class="container">
    <hr>
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">About</a></li>
      </ul>
      <p class="text-center text-muted">© 2022 FoodsFly, Org</p>
    </footer>
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


  
  <?php include '../includes/scripts.php'?>
</body>
</html>