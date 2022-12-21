<?php
include '../utils/jwt-auth.php';
include '../utils/conn.php';
include '../utils/select_data.php';

$user = verifyJWT($_COOKIE['jwt-token']);
if($user){
  $uid = $user['user_id'];

}else{
  header("Location:../index.php", false, 401);
}



?>


<html lang="en">
<head>
  <?php include '../includes/header.php'?>
  <title>FoodsFly-About us</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</head>

<body class=" position-relative">
 
  <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">

    <h1 class="brand-name text-danger">FoodsFly</h1>

    <ul id="navbar" class="navbar   d-sm-flex "> <!-- put navbar class -->
      <li class="nav_item " >
        <a href="../index.php">
          <i class="fa-solid fa-house" style="transform:scale(1.7) ;">

          </i>
        </a>
      </li>
      <li class="nav_item">
        <a href="./cart.php" class="profile">
          <i class="fa-sharp fa-solid fa-cart-shopping text-white me-2 me-sm-0" style="transform:scale(1.7) ;" ></i>
          
        </a>
      </li>
      <li class="nav_item">
        <a href="../actions/logoutAction.php?action=logout" class="profile">Logout
        </a>
      </li>

    </ul>
 
  </nav>

  <section style="background-color: #eee;">

    <?php

    $data = getUserData($conn, $uid);

    ?>
    <div class="container py-5">
      <div class="row my-2">
        <div class="col-6 mx-auto d-flex" >
          <img style="object-fit: cover;" width="200" class="img-fluid rounded mx-auto img-thumbnail" 
          src="https://cdn.pixabay.com/photo/2016/11/08/15/21/user-1808597__340.png" alt="img">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= ucfirst($data['fullname'])?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $data['email']?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $data['mobile']?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= ucfirst($data['address'])?></p>
                </div>
              </div>
            </div>
          </div>
        </div>  
              
      </div>
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <p class="display-5 text-center">Profile Settings</p>
          <div class="w-100 d-flex gap-3 justify-content-evenly flex-column flex-md-row">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Change My Info
            </button>
            <button class="btn btn-outline-success">Change Password</button>
            <button class="btn btn-outline-success">something</button>
            <button class="btn btn-outline-success">Delete My Account</button>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- change my info Modal -->
  <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center display-6">Profile Info</h5>
            <br>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="col-10 mx-auto">
                
                  <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="<?= ucfirst($data['fullname'])?>" id="fullname" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?= $data['email']?>" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" value="<?= $data['mobile']?>" id="mobile" required>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" value="<?= ucfirst($data['address'])?>" id="address" required>
                  </div>
                  <div class="mb-3">
                    <p class="text-danger" style="font-size: 12px;">All feilds are required!</p>
                  </div>
                
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
              <i class="fa-sharp fa-solid fa-floppy-disk me-2"></i>
              Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  

  


  
  <?php

  include '../includes/footer.php';
  
  include '../includes/scripts.php'?>
</body>
</html>