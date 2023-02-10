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

              $sql = "SELECT * FROM orders WHERE user_id={$user_id} ORDER BY order_id DESC";
              $res = $conn->query($sql);
              if($res==TRUE){
                if($res->num_rows>0){
                  while($row=$res->fetch_assoc()){?>
                    <tr >
                      <td class='d-none d-md-flex'><?= $row['order_id']?></td>
                      <td><?= explode(' ',$row['order_date'])[0] ?></td>
                      <td>RS. <?=number_format($row['total'], 2, '.', ',')?></td>
                      <td style="opacity: 0.9;" class="<?= ($row['status']==0)? 'bg-danger text-white':'bg-success text-white' ?>">
                        <?= ($row['status']==0)? 'Pending..':'Approved' ?>
                      </td>
                      <td>
                        <button type="button" class="btn w-100 btn-sm btn-info m-0 fa-solid fa-eye bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        </button>
                      </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Order <?= $row['order_id']?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body m-0 p-0">
                            
                            <article class="card">
                              <header class="card-header"> My Orders / Tracking </header>
                                <div class="card-body">
                                  <h6>Order ID: <?= $row['order_id']?></h6>
                                  <article class="card">
                                    <div class="card-body row">
                                      <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                                      <div class="col"> <strong>Shipping BY:</strong> <br> FoodsFly, | <i class="fa fa-phone"></i> Mr.John </div>
                                      <div class="col"> <strong>Status:</strong> <br>
                                        <?= ($row['status']==0)? '<p class="text-danger">Waiting for review!</p>':'<p class="text-success">Oder placed<br>You will recive it soon</p>' ?>
                                      </div>
                                        
                                    </div>
                                  </article>
                                  <div class="track">
                                    <div class="step <?= ($row['status']==0)?'':'active'?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Complete</span> </div>
                                  </div>
                                  <hr>
                                  <p>Your order.</p>

                                  <ul class="row " style='overflow-x:scroll;'>

                                    <?php

                                      $sql = "SELECT menu_id,qty FROM order_item WHERE order_id={$row['order_id']}";
                                      $res = $conn->query($sql);
                                      if($res==TRUE){

                                        while($item=$res->fetch_assoc()){
                                          $sql = "SELECT name,price,img_url FROM menu_item WHERE menu_id={$item['menu_id']}";
                                          $result = $conn->query($sql);
                                          if($result==TRUE){
                                            $data = $result->fetch_assoc();
                                            ?>
                                            
                                            <li class="col-md-4">
                                              <figure class="itemside mb-3">
                                                  <div class="aside"><img src="<?= $data['img_url']?>" class="img-sm border"></div>
                                                  <figcaption class="info align-self-center">
                                                      <p class="title"><?=ucfirst($data['name']) ?><br>
                                                      <span class="text-muted"> RS. <?=number_format($data['price'], 2, '.', ',')?></span>
                                                    </p>
                                                  </figcaption>
                                              </figure>
                                            </li>
                                          <?php 
                                          }
                                        }
                                      }else{?>
                                          <li class="col-md-4">
                                            <figure class="itemside mb-3">
                                                <figcaption class="info align-self-center">
                                                    <p class="title text-danger text-center">Error </p>
                                                </figcaption>
                                            </figure>
                                          </li>
                                      <?php }
                                    ?>
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
                <tr>
                  <td class="text-center text-warning">No orders found!</td>
                </tr>
              <?php }

              }else{?>
                <tr>
                  <td class="text-center text-warning">Error</td>
                </tr>
              <?php }



              ?>
              
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <!-- <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
          <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
              <div class="card-body">
                <h6>Order ID: OD45345345435</h6>
                <article class="card">
                  <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                      
                  </div>
                </article>
                <div class="track">
                  <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                  <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                </div>
                <hr>
                <ul class="row">
                    <li class="col-md-4">
                      <figure class="itemside mb-3">
                          <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                          <figcaption class="info align-self-center">
                              <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                          </figcaption>
                      </figure>
                    </li>
                    <li class="col-md-4">
                      <figure class="itemside mb-3">
                          <div class="aside"><img src="https://i.imgur.com/tVBy5Q0.png" class="img-sm border"></div>
                          <figcaption class="info align-self-center">
                              <p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
                          </figcaption>
                      </figure>
                    </li>
                    <li class="col-md-4">
                      <figure class="itemside mb-3">
                          <div class="aside"><img src="https://i.imgur.com/Bd56jKH.png" class="img-sm border"></div>
                          <figcaption class="info align-self-center">
                              <p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
                          </figcaption>
                      </figure>
                    </li>
                </ul>
                <hr>
                <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
              </div>
            </header>
          </article>
        </div>
      </div>
    </div> -->


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