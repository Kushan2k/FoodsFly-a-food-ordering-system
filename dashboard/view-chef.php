<?php

session_start();
include_once '../utils/jwt-auth.php';
include_once '../utils/select_data.php';
include_once '../utils/conn.php';
if(!isAdmin()){
  header("Location:../index.php",401);
}
?>

<html lang="en">

  <head>
    <?php include_once '../includes/header.php'?>
    <title>Foodsfly-View Chefs</title>

  </head>

  <body>

    <style>
      .nav_item {
        padding-bottom: 10px;
      }
      .btn-outline-info{
    
        padding: 10px 20px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 0;
        transition: 300ms linear;
      }
    </style>

    <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
      <h1 class="brand-name text-danger">FoodsFly</h1>

      <ul id="navbar" class="navbar "> <!-- put navbar class  d-none   d-sm-flex -->
        <li class="nav_item "><a href="../index.php" class="d-flex">
            <i class="fa-solid fa-house"></i>
          </a></li>
        <li class="nav_item "><a href="./index.php" class="d-flex">
            <i class="fa-solid fa-chalkboard-user"></i>
          </a></li>

        <li class="nav_item"><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
        <li class="nav_item active-tab"><a href=""><i class="fa-solid fa-users "></i></a></li>
      </ul>

      <!-- <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button> -->
    </nav>
    
    <div class='container mt-4'>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fa-solid fa-plus"></i>  
      Add Chef</button>
       
    </div>

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

        <?php $_SESSION['suc']=null;}
          
        ?>
    </div>
      
    <div class='container'>
      <div class="container my-4 h-50 item-table">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="d-none d-sm-flex">#</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php

            $data = getChefData($conn);

            if($data!=null){

              for ($i = 0; $i < count($data);$i++) {?>
                <tr>
                  <td><?= $i+1?></td>
                  <td><?= ucfirst($data[$i]['fullname']) ?></td>
                  <td><?= $data[$i]['mobile'] ?></td>
                  <td><?= $data[$i]['email'] ?></td>
                  <td>
                    <button data-action="delete" class="bg-transparent border-0 fa-solid fa-trash text-danger" data-id=<?= $data[$i]['user_id'] ?>></button>
                  </td>
                </tr>
              <?php }

             }else{?>
                 <tr>
                  <td colspan="6">
                    <p class="text-center text-warning mt-2">No data found</p>
                  </td>
                </tr>
             <?php }

            ?>
            
           

          </tbody>
        </table>
      </div>

    </div>

    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"    aria-hidden="true">
      <div class="modal-dialog">
        <form action="../actions/addchefAction.php" method="POST" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header " style="background-color: lightgray;">
              <h5 class="modal-title text-center display-6">Add a chef</h5>
              <br>
              
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="col-10 mx-auto">
                  
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" name="chef-name" class="form-control"  id="name" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email"  name="chef-email" class="form-control"  id="email" required>
                    </div>
                    <div class="mb-3">
                      <label for="pass" class="form-label">Password</label>
                      <input type="password"  name="chef-password" class="form-control"  id="pass" required>
                    </div>
                    <div class="mb-3">
                      <label for="cpass" class="form-label">Conform Password</label>
                      <input type="password"  name="chef-cpassword" class="form-control"  id="cpass" required>
                    </div>
                    <div class="mb-3">
                      <label for="ad" class="form-label">Address</label>
                      <input type="text"  name="chef-address" class="form-control"  id="ad" required>
                    </div>
                    <div class="mb-3">
                      <label for="mobile" class="form-label">Mobile</label>
                      <input name="chef-mobile" id="mobile" class="form-control" type='text'   required />
                      
                    </div>
                    
                    <div class="mb-3">
                      <p class="text-danger" style="font-size: 12px;">All feilds are required!</p>
                    </div>
                  
                </div>
            
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Later</button>
                  <button type="submit" name="add-chef" class="btn btn-outline-success">
                    <i class="fa-sharp fa-solid fa-floppy-disk me-2"></i>
                    Save</button>
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
    include_once '../includes/footer.php';
    include_once '../includes/scripts.php'?>
  </body>

</html>