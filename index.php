<?php

$logedin=false;
$ischef = false;
$isadmin = false;

if(isset($_COOKIE['login']) && isset($_COOKIE['jwt-token'])){
  $logedin=true; 
}

?>

<html lang="en">
<head>
  <?php include './includes/header.php'?>
  <title>FoodsFly-Home</title>
  <link rel="stylesheet" href="../assets/css/slider.css">
  
  
  
</head>

<body class=" position-relative">
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item active-tab" ><a href=""><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item"><a href="./pages/menu.php"><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>Menu</a></li>

      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="./pages/tables.php">Book Table</a></li>';
        echo '<li class="nav_item"><a href="./pages/order.php?for=my-orders">Orders</a></li>';
      }?>
      <li class="nav_item"><a href="./pages/aboutus.php"> About us</a></li>
      
      <?php
      if($logedin){?>
        <li class="nav_item">
          <a href="./pages/profile.php" class="profile">
            <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
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

  <section class="hero slider">

  <style>
    
  </style>

    <div class="container-fluid m-0 p-0">
      <div class="row p-0 m-0 position-relative">
        <div class="col-12 m-0 p-0">
          <img src="./assets/images/image-8.jpg" class=" w-100 slider-img" alt="img">
        </div>
        <div class="next-icons">
          <button class="text-white fa-solid fa-backward next-back-btns bg-transparent border-0" data-type='back' style="transform:scale(1.5) ;"></button>
          <button class="text-white fa-solid fa-forward next-back-btns bg-transparent border-0" data-type='forward' style="transform:scale(1.5) ;"></button>

        </div>

        <div class="hero-text container">
          <div class="row" style="justify-content: end;">
            <div class="col-md-7 col-10 hero-container">
              <h3 class="featurette-heading fw-normal lh-1 mb-5" style='text-align: right;' >Hungry?<p style='text-align: right;'>Good,we are here to serve you.</p> </h3>
              <p style='text-align: right;' class="lead d-none d-sm-block" >Indulge in a culinary journey. Our menu features an array of dishes that are both sophisticated and approachable.
               From locally sourced ingredients to carefully curated flavors, each dish on our menu is crafted with a focus on quality and taste. So come and explore our menu, 
               and discover what makes our dining experience truly unforgettable.</p>
               <?php
              if($logedin){
                echo '<a href="./pages/tables.php?view=all" style="float: right;margin-right: 1.7rem;border-radius: 5px;" class="btn btn-outline-light border border-2">Book Table</a>';
              }?>
              <a href="./pages/menu.php?view=all" style="float: right;margin-right: 1.7rem;border-radius: 5px;" class="btn btn-outline-light border border-2">View Menu</a>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <main class='mt-0 mx-0'>
    <div class="container-fluid mx-0">
      <!--Section: Content-->
      <section style='background-color:rgb(201, 200, 197,0.6);height: 600px;overflow: hidden;'>
        <div class="row p-3">
          <div class="col-md-6 gx-5 mb-4 mt-3">
            <h4 class="display-4">Welcome</h4>
            <p class='fs-4  mt-5 fw-lighter '>
            Meet the culinary geniuses behind the scenes at FoodsFly. Our team of highly trained chefs have honed their skills at some of the finest restaurants around the world, and now bring their talent to your plate. Whether it's crafting a beautifully plated dish, or experimenting with new and exotic ingredients, our chefs are committed to making every bite as memorable as the last.
            </p>
            <br/>


            <a href="" class='btn btn-outline-danger mt-3' >
              <i class='fa fa-book me-2'>
                </i>View Chefs</a>
          </div>

          <div class="d-none d-md-flex col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5 mx-auto" data-mdb-ripple-color="light">
              <img src="./assets/images/Chef.png" width="400px"  />
              
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class=" container">   
        <h4 class="mb-5 text-center"><strong>Latest Menu items</strong>
        
      </h4>
        <!-- <div class="container " style="align-items: center;justify-content:start;" >
          <p>View All ? <input type="checkbox" name="view" id="view" class="form-radio"></p>
        </div> -->

        <style>
          .img-div-bottom{
            height: 300px;
            height: 200px;
            object-fit: contain;
            overflow: hidden;

          }
          .items{
              flex-wrap: nowrap;
              overflow-x: scroll;
          }
          .img-h:hover{
            cursor: pointer;
          }
          .item-div{

            animation-name:popup;
            animation-duration:400ms;
            animation-timing-function:linear;
            animation-fill-mode:forwards;
            animation-iteration-count:1;
            transition:400ms linear;
          }

          

          @keyframes popup{
            from{
              transform: scale(0);
            }
            to{
              transform: scale(1);
            }
          }
          
        </style>

        <div class="row items" >
          <?php
          include_once './utils/select_data.php';
          require_once './utils/conn.php';
          $data = getMenuItemData($conn);

          if($data==null){?>

            <p class="alert text-center p-3">No menu items found</p>

          <?php }

          $data = array_slice($data, 0, 6);

          foreach($data as $item){?>
            
            <div class="col-6 col-lg-4 mb-4 item-div">
              <div class="card" >
                <div class="bg-image hover-overlay ripple img-div-bottom" data-mdb-ripple-color="light" >
                <a href='./pages/menu.php?view=all' class="img-h" >  
                  <img src="<?= $item['img_url'] ?>" class="img-fluid" style="width: 380px; height: 200px; object-fit: cover;" />
                </a>
                  
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center"><?= ucfirst($item['name'])?></h5>
                  <h1 class="text-warning mt-2 text-end">
                    <?php
                    
                    $rating=$item['rating'];
                    $count=$item['rate_count'];
                    $total=(int)$rating/$count;
                    for($j=0;$j<$total;$j++){
                      
                      echo '<i class="fa-solid h6 text-warning fa-star"></i>';
                    }
                    
                    ?>
                  </h1>
                  
                </div>
              </div>
            </div>
            

          <?php }
          


?>

          
        </div>
      </section>
      
    </div>
  
    <?php include_once './includes/footer.php'?>
  </main>

  <!-- <script>
    document.addEventListener('DOMContentLoaded',()=>{
      
      const type=document.getElementById('view')
      let contentView=document.querySelector('.items')

      type.addEventListener('change',(e)=>{
        if(e.target.checked){
          contentView.style.overflowX='hidden'
          contentView.style.flexWrap='wrap'
        }else{
          contentView.style.overflowX='scroll'
          contentView.style.flexWrap='nowrap'
        }
      })
    })
  </script> -->

  <script src="./assets/js/index.js"></script>
  <script src="../assets/js/slider.js"></script>
  <?php include './includes/scripts.php'?>
</body>
</html>