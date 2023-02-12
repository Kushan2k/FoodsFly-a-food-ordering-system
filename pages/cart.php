<?php

include_once '../utils/jwt-auth.php';
include '../utils/conn.php';
include '../utils/select_data.php';

$logedin = false;
$user_id = 0;
$cart_count = 0;

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
  <title>Foodsfly-My Cart</title>
  <link rel="stylesheet" href="../assets/css/cart.css">
  <?php include '../includes/header.php'?>
</head>

<body>

  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex ">
      <!-- put navbar class -->
      <li class="nav_item "><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>My Cart</a></li>

      <li class="nav_item"><a href="./order.php">Orders</a></li>
      
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

  <p class="display-4 text-center">Your cart.</p>
  <section class="mt-5 container py-3" style="background-color: #eee;">

    <div class="container-fluid">
      <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-10 mx-auto">
              <h6 class="mb-0">Shopping cart</h6>
              
      
      <?php

      $cartItems = getCartItemsByUserID($conn, $user_id);
      $itemcount = count($cartItems!=null?$cartItems:[]);

      echo
        "
        <div class='d-flex justify-content-between'>
          <span >You have <span id='cart-count'>{$itemcount}</span> items in your cart</span>
        </div>
        <form action='../actions/placeOrderAction.php' method='POST' >
        ";
        

      if ($cartItems != null) {
        $cost = 0;
        foreach ($cartItems as $item) {
          $cost += $item['price'];  ?>
                  
              <div class="product-details mr-2" id="div-<?=$item['id']?>">
                  <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                      <div class="d-flex flex-row">
                        <img class="rounded item-img" src="<?= $item['img_url']?>" width="200">
                        
                        <div class="ms-3">
                          <span class="font-weight-bold d-block">
                            <h5 class="item-name"><?=ucfirst($item['name'])?></h5></span>
                          <span class="spec">
                            <?=ucfirst($item['category'])?>
                          </span>
                          
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <span class="d-block mx-2 mx-md-0">
                          <input data-target='price-<?=$item['id']?>' type="number" value="1" id="inp-<?=$item['id']?>" onchange="updatecount(this);getTotalCost()" onkeyup="updatecount(this);getTotalCost()" name="count[]" class=" form-control form-control-sm">
                        </span>
                        <span  class="d-block mx-1 mx-md-3  font-weight-bold">
                          Rs.<span id="price-<?=$item['id']?>" class="price" data-ogprice='<?= $item['price']?>'> <?=number_format($item['price'], 2, '.', ',')?></span>
                        </span>
                        <button type='button' data-itemprice='<?=$item['price']?>' data-itemid="<?=$item['id']?>" class="fa fa-trash mx-1 mx-md-3 text-danger bg-transparent border-0"></button>
                        <input type="hidden" name="item_id[]" value="<?= $item['item_id']?>">
                      </div>
                  </div>
              </div>
                    

                
                

        <?php }?>
          <div class="container my-4">
            <h5 style="text-align: right;" >Total Cost: Rs.<span class="total-price"><?=$cost?></span></h5>
            <input type="hidden" id="total" name="total" value="<?=$cost?>">
          </div>
          <div class="container d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-outline-success btn-lg" name='add-order'>Proceed to checkout</button>
          </div>
        </form>
      <?php } else {

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
      getTotalCost()
    })

    function updatecount(e){
      let prev=document.getElementById(e.id)
      if(e.value<1){
        e.value=1
      }else{
        let itemid=e.dataset.target
        let price=document.getElementById(itemid)
        let inc=parseFloat(price.dataset.ogprice)*e.value
        price.innerHTML=inc
        
        
      }
    }

    function getTotalCost(){
      const prices=document.querySelectorAll('.price')

      let total=document.querySelector('.total-price');

      let t=0;

      prices.forEach(price=>{
        t+=parseFloat(price.innerHTML)
      })

      total.innerHTML=t
      document.getElementById('total').value=t

      

    }

  </script>


  <script src="../assets/js/cart.js"></script>
  <?php
  include_once '../includes/footer.php';
  include_once '../includes/scripts.php';
  ?>
</body>

</html>