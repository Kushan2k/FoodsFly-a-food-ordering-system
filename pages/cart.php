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

  <style>
    .item-img{
      object-fit: cover;
      width: 175px;
      height: 175px;
    }
    .spec{
      font-size: 1.1rem;
    }
    .item-name{
      font-size: 1.4rem;
    }
    @media (max-width:768px) {

      .item-img {
        width: 60px;
        height: 60px;
      }
      .item-name{
        font-size: 1rem;
      }
      .spec{
        font-size: 0.8rem;
      }

    }
    .hide-item{
      animation-name: hide-item;
      animation-timing-function: linear;
      animation-duration: 300ms;
      animation-delay: 0;
      animation-fill-mode: forwards;
      animation-iteration-count: 1;
    }
    .card-header{
      background-color: rgba(127,127,127,0.4);
    }
    .fa-trash:hover{
      cursor: pointer;
    }

    @keyframes hide-item {
      from{
        transform: scale(1);
      }
      to{
        transform: scale(0);
        
      }
      
    }
  </style>

  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar d-none   d-sm-flex ">
      <!-- put navbar class -->
      <li class="nav_item "><a href="../index.php"><i class="fa-solid fa-house d-sm-none me-2"></i>Home</a></li>

      <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-bars-sort d-sm-none me-2"></i>My Cart</a></li>

      <?php
      if ($logedin) {
          echo '<li class="nav_item"><a href="">Orders</a></li>';
      }?>
            <li class="nav_item"><a href="./aboutus.php"> About us</a></li>

            <?php
      if ($logedin) {?>
        <li class=" d-none d-sm-flex">
          <a href="./profile.php" class="profile">
            <i class="fa-solid fa-circle-user text-white" style="transform: scale(1.7);"></i>
          </a>
        </li>
      <?php } else {?>
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
                              <input data-target='price-<?=$item['id']?>' type="number" value="1" id="inp-<?=$item['id']?>" onchange="updatecount(this);getTotalCost()" onkeyup="updatecount(this);getTotalCost()" name="count" class=" form-control form-control-sm">
                            </span>
                            <span  class="d-block mx-1 mx-md-3  font-weight-bold">
                              Rs.<span id="price-<?=$item['id']?>" class="price" data-ogprice='<?= $item['price']?>'> <?=number_format($item['price'], 2, '.', ',')?></span>
                            </span>
                            <button data-itemprice='<?=$item['price']?>' data-itemid="<?=$item['id']?>" class="fa fa-trash mx-1 mx-md-3 text-danger bg-transparent border-0"></button>
                          </div>
                      </div>
                  </div>
                    

                
                

        <?php }?>
        <!-- </div>
          <div class="col-md-4">
              <div class="payment-info">
                  <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span> </label>

                  <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span> </label>

                  <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span> </label>


                  <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png"/></span> </label>
                  <div><label class="credit-card-label">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                  <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                  <div class="row">
                      <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                      <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342"></div>
                  </div>
                  <hr class="line">
                  <div class="d-flex justify-content-between information"><span>Subtotal</span><span>$3000.00</span></div>
                  <div class="d-flex justify-content-between information"><span>Shipping</span><span>$20.00</span></div>
                  <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>$3020.00</span></div><button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button"><span>$3020.00</span><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span></button></div>
                </div>
          </div>
        </div> -->
        <div class="container my-4">
          <h5 style="text-align: right;">Total Cost: Rs.<span class="total-price"><?=$cost?></span></h5>
        </div>
        <div class="container d-flex justify-content-end mt-3">
          <button class="btn btn-outline-success btn-lg">Proceed to checkout</button>
        </div>
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

      

    }

  </script>


  <script src="../assets/js/cart.js"></script>
  <?php
  include_once '../includes/footer.php';
  include_once '../includes/scripts.php';
  ?>
</body>

</html>