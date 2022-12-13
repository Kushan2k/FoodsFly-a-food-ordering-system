<?php

include_once '../utils/jwt-auth.php';
include '../utils/conn.php';
include '../utils/select_data.php';


$logedin=false;
$user_id=0;
$cart_count=0;

if(checkIsLogedIn()){
  $logedin=true;
  $user=verifyJWT($_COOKIE['jwt-token']);
  if($user!=null){
    $user_id=$user['user_id'];
  }else{
    header("Location:./menu.php",true,403);
  }
}else{
  header("Location:../index.php");
}

?>

<html lang="en">
<head>
  <title>Foodsfly-My Cart</title>
  <?php include '../includes/header.php'?>
</head>
<body>

<style>

  @media (max-width:768px) {

    .item-img{
      width: 60px;
      height: 60px;
    }
    
  }
</style>

  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " ><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>My Cart</a></li>

      <?php
      if($logedin){
        echo '<li class="nav_item"><a href="">Orders</a></li>';
      }?>
      <li class="nav_item"><a href="./aboutus.php"> About us</a></li>
      
      <?php
      if($logedin){?>
        <li class=" d-none d-sm-flex">
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

  <p class="display-4 text-center">Your cart.</p>
  <section class="mt-5 container py-3" style="background-color: #eee;">
    
    <div class="container-fluid">
      <?php

        $cartItems=getCartItemsByUserID($conn,$user_id);

        if($cartItems!=null){
          foreach($cartItems as $item){?>
            <div class="card" id="div-<?= $item['id']?>">
              <h5 class="card-header"><?= ucfirst($item['category']) ?></h5>
              <div class="card-body">
                <h5 class="card-title"><?= ucfirst($item['name']) ?></h5>
                <p class="card-text"><?= ucfirst($item['description']) ?></p>
                <h6 class="card-title">Rs.<?= number_format($item['price'],2,'.',',') ?></h6>
                <button data-itemid="<?= $item['id']?>" class=" mt-2 bg-transparent border-0 fa-solid fa-trash text-danger"></button>
              </div>
            </div>

        <?php }?>
          <div class="container d-flex justify-content-end">
            <button class="btn btn-outline-success btn-lg">Proceed to checkout</button>
          </div> 
         <?php }else{

          echo 
          "
          <div class='container'>
            <p class='text-center text-warning'>No items in the cart! view our menu in <a href='./menu.php'>Here</a></p>
          </div>
          ";
         }

        ?>
        
        
    </div>
    
  </section>
  
  <script>
    document.addEventListener("DOMContentLoaded",()=>{
      let rmbtns=document.querySelectorAll(".fa-trash")
      rmbtns.forEach(btn=>{
        btn.addEventListener('click',(e)=>{
          let cartid=e.target.dataset.itemid
          
          let req=new XMLHttpRequest()
      
          req.open('POST','../actions/menuAction.php')
          req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

          req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              
              if(this.responseText==1){
                document.getElementById(`div-${cartid}`).remove()
              }else{
                console.log(this.responseText)
              }

            }
          };
          req.send(`cart_id=${cartid}&removeFromCart=true`)

        })
      })
    })
  </script>

  <?php
    include_once '../includes/footer.php';
    include_once '../includes/scripts.php';
  ?>
</body>
</html>