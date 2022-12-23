<?php
include '../utils/jwt-auth.php';
include '../utils/conn.php';
include '../utils/select_data.php';

session_start();

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
  </style>

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

          <?php $_SESSION['suc']=null;}
          
        ?>

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
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Change My Info
            </button>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#passwordchangemodel">
              Change Password
            </button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteaccoutmodel">
              Delete My Account
            </button>
            
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- change my info Modal -->
  <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"    aria-hidden="true">
    <div class="modal-dialog">
      <form action="../actions/accountAction.php" method="POST">
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
                    <input type="text" name="fullname" class="form-control" value="<?= ucfirst($data['fullname'])?>" id="fullname" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email']?>" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" name="mobile" class="form-control" value="<?= $data['mobile']?>" id="mobile" required>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="<?= ucfirst($data['address'])?>" id="address" required>
                  </div>
                  <div class="mb-3">
                    <p class="text-danger" style="font-size: 12px;">All feilds are required!</p>
                  </div>
                
              </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="save-changes" class="btn btn-primary">
                  <i class="fa-sharp fa-solid fa-floppy-disk me-2"></i>
                  Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- password change model   -->
  <div class="modal" id="passwordchangemodel" tabindex="-1" aria-labelledby="passwordchangemodelLabel"    aria-hidden="true">
    <div class="modal-dialog">
      <form action="../actions/accountAction.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center display-6">Password Change!</h5>
            <br>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="col-10 mx-auto">
                
                  <div class="mb-3">
                    <label for="cpass" class="form-label">Current Password</label>
                    <input type="password" placeholder="Current Passwrod" name="cpass" class="form-control" id="cpass" required>
                  </div>
                  <div class="mb-3">
                    <label for="npass" class="form-label">New Password</label>
                    <input type="password" placeholder="New password" name="npassword" class="form-control"  id="npass" required>
                  </div>
                  <div class="mb-3">
                    <label for="ncpass" class="form-label">Conform Password</label>
                    <input type="password" placeholder="Conform New password" name="conformnpass" class="form-control"  id="ncpass" required>
                  </div>
                  
                  <div class="mb-3">
                    <p class="text-danger" style="font-size: 12px;">All feilds are required!</p>
                  </div>
                
              </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="change-password" class="btn btn-primary">
                  <i class="fa-sharp fa-solid fa-floppy-disk me-2"></i>
                  Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- delete account model    -->
  <div class="modal" id="deleteaccoutmodel" tabindex="-1" aria-labelledby="deleteaccoutmodelLabel"    aria-hidden="true">
    <div class="modal-dialog">
      <form action="../actions/accountAction.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center display-6">Delete Account!</h5>
            <br>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="col-10 mx-auto">
                
                  <div class="mb-3">
                    <label for="cpass" class="form-label">Your Account Password</label>
                    <input type="password" placeholder="your account password" name="pass" class="form-control" id="cpass" required>
                  </div>
                  
                
              </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="delete-account" class="btn btn-danger">
                  <i class="fa-sharp fa-solid fa-trash me-2"></i>
                  Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
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
  
  <?php

  include '../includes/footer.php';
  
  include '../includes/scripts.php'?>
</body>
</html>