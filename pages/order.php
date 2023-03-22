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
  <link rel="stylesheet" href="../assets/css/order.css">
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
          tr.tr-head>th{
            font-size: 1.1em;
            font-weight: 500;
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
    
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="display-6 text-center mt-3">My Orders.</p>

          <table class="table table-hover">
            <thead class='mb-3'>
              <tr class="tr-head  text-center " style="background-color: rgba(136, 138, 137,0.5);">
                <th class='d-none d-md-flex'>ID</th>
                <th>Order Date</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="text-center">

              <?php

              $sql = "SELECT * FROM orders WHERE user_id={$user_id} ORDER BY order_date DESC";
              $res = $conn->query($sql);
              if($res==TRUE){
                if($res->num_rows>0){
                  
                  while($row=$res->fetch_assoc()){?>
                    <tr>
                      <td class='d-none d-md-flex'><?= $row['order_id']?></td>
                      <td><?= explode(' ',$row['order_date'])[0] ?></td>
                      <td>RS. <?=number_format($row['total'], 2, '.', ',')?></td>
                      <td style="opacity: 0.9;" class="<?= ($row['status']==0)? 'bg-danger text-white':'bg-success text-white' ?>">
                        <?= ($row['status']==0)? 'Pending..':'Approved' ?>
                      </td>
                      <td>
                        <button type="button" class="btn w-100 btn-sm btn-info m-0 fa-solid fa-eye bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['order_id']?>">
                        </button>
                      </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade modal-lg" id="exampleModal<?= $row['order_id']?>" tabindex="-1" aria-labelledby="exampleModal<?= $row['order_id']?>Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal<?= $row['order_id']?>Label">Order <?= $row['order_id']?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body m-0 p-0">
                            
                            <article class="card">
                              <header class="card-header"> My Orders / Tracking </header>
                                <div class="card-body">
                                  <h6>Order ID: <?= $row['order_id']?></h6>
                                  <article class="card">
                                    <div class="card-body row">
                                      <div class="col"> <strong>Estimated Delivery time:</strong> <br>Your order will receive in 45 minutes  </div>
                                      <div class="col"> <strong>Shipping BY:</strong> <br> FoodsFly, | <i class="fa fa-phone"></i> Mr.sameera </div>
                                      <div class="col"> <strong>Status:</strong> <br>
                                        <?= ($row['status']==0)? '<p class="text-danger">Waiting for review!</p>':'<p class="text-success">Oder placed<br>' ?>
                                        <?= $row['status']!=4? ($row['status']!=0?'You will recive it soon':'') :'Your order is comepted!' ?></p>
                                      </div>
                                        
                                    </div>
                                  </article>
                                  <div class="track">
                                    <?= getTrackingBoc($row['status']) ?>
                                  </div>
                                  <hr>
                                  <p>Your order.</p>

                                  <ul class="row" style='overflow-x:scroll;'>

                                    <?= getOrderItems($conn,$row['order_id']) ?>
                                  </ul>
                                  <hr>
                                  <p>Options.</p>
                                </div>
                              </header>
                            </article>
                               
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <?php 

                            if($row['status']==0){?>
                            <form action='../actions/placeOrderAction.php' method='POST'>
                              <input type='hidden' value='<?= $row['order_id']?>' name='order_id'/>
                              <button type="submit" name='cancel-order' class="btn btn-danger">Cancel Order</button>
                            </form>

                            <?php }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    

                  <?php }

                }else{?>
                <tr >
                  <td colspan='5' class="text-center text-warning">No orders found!</td>
                </tr>
              <?php }

              }else{?>
                <tr >
                  <td colspan='5' class="text-center text-warning">Error</td>
                </tr>
              <?php }



              ?>
              
            </tbody>
          </table>

        </div>
      </div>
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