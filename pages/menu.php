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
    <!-- <div class="container py-5 my-5">
      <div class="row text-center pb-4">
        <div class="col-md-12">
            <h2>explore foods and ..</h2>
        </div>
      </div>   
      <div class="row">
          <div class="col-md-12">
              <div class="card" style="border: none;">
                  <div class="card-body" >
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group ">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group ">
                          <select id="inputState" class="form-control" >
                            <option selected>Sort by </option>
                            <option>BMW</option>
                            <option>Audi</option>
                            <option>Maruti</option>
                            <option>Tesla</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group ">
                          <select id="inputState" class="form-control" >
                            <option selected>... Select Model...</option>
                            <option>City</option>
                            <option>Jazz</option>
                            <option>Brio</option>
                            
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group ">
                          <select id="inputState" class="form-control" >
                            <option selected>... Select Location...</option>
                            <option>New Delhi</option>
                            <option>Banglore</option>
                            <option>Chennai</option>
                            <option>Jaipur</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group ">
                          <select id="inputState" class="form-control" >
                            <option selected>... Select Budget...</option>
                            <option>1 Lac-5 Lac</option>
                            <option>5 Lac-10 Lac</option>
                            <option>10 Lac-15 Lac</option>
                            <option>15 Lac-20 Lac</option>
                            <option>20 Lac-25 Lac</option>
                            <option>25 Lac & Above</option>
                          </select>
                        </div>
                      </div>
                    
                    </div>
                  </div>
              </div> 
          </div>
      </div>
    </div> -->

    <style>
      .card-header{
        font-weight: 700;
      }
      .list-group{
        margin-left: 10px;
      }
      .list-group-item:hover{
        cursor: pointer;
        background-color: #dedede;
      }
    </style>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-3 ">

          <div class="card" style="border: none;">
            <div class="card-header">
              Catogory
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Breakfirst</li>
              <li class="list-group-item">Lunch</li>
              <li class="list-group-item">Dinner</li>
              <li class="list-group-item">Snacks</li>
            </ul>
          </div>

          <div class="card mt-3" style="border: none;">
            <div class="card-header">
              Price Range(LKR)
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">400-700</li>
              <li class="list-group-item">700-1500</li>
              <li class="list-group-item">1500-Up</li>
            </ul>
          </div>

          <div class="card mt-3" style="border: none;">
            <div class="card-header">
              something else
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
              <li class="list-group-item">A third item</li>
            </ul>
          </div>

      
        </div>
        <div class="col-lg-9 col-md-9 col-9">

          <div class="row">

            <?php

            for($i=0;$i<10;$i++){?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="https://media.istockphoto.com/id/1280158821/photo/diverse-keto-dishes.jpg?s=170667a&w=0&k=20&c=ag-PetVCq5UBmF8PWBznD3FCzNHzqXQgYpPTB_eptRs=" class="img-fluid" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Item name</h5>
                    <h6 class="card-subtitle text-muted">Lunch</h6>
                    <h4 class="text-success mt-2">Rs 600.00</h4>
                    <div class="d-flex justify-content-between align-items-center">
                      <a href="#!" class="btn btn-primary border-0 bg-transparent">
                        <i class="fa-sharp text-dark fa-solid fa-cart-shopping"></i>
                      </a>
                      <h1 class="text-warning">
                        <i class="fa-solid h6 text-warning fa-star"></i>
                        <i class="fa-solid h6 text-warning fa-star"></i>
                        <i class="fa-solid h6 text-warning fa-star"></i>
                        <i class="fa-solid h6 text-warning fa-star"></i>
                      </h1>
                    </div>
                  </div>
                </div>
              </div>

            <?php }


            ?>

            
          </div>

        </div>
      </div>
    </div>

    
  </section>

  <script>
    document.addEventListener('DOMContentLoaded',()=>{
      let types=document.querySelectorAll('.list-group-item');
      
      types.forEach((item)=>{
        item.addEventListener('click',(e)=>{
          
        })
      })

    })
  </script>

 <?php include '../includes/scripts.php'?>
</body>
</html>