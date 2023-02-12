<?php
session_start();
include_once '../utils/jwt-auth.php';
include '../utils/conn.php';
include_once '../utils/select_data.php';
include '../utils/input_validate.php';
if(!isAdmin()){
  header("Location:../index.php",401);
}

$item = isset($_GET['itemid']) ? $_GET['itemid'] : header("Location:./menu-items.php?view=all");

$data = getMenuItemByID($conn, $item);

if($data==null){
  redirectWithError('./menu-items.php?view=all', 'Item do not exist!');
  return;
}


?>
<html lang="en">
  <head>
    <?php include_once '../includes/header.php'?>
    <title>Foodsfly-Edit Items</title>
    
  </head>
  <body>

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

  <div class='container-fluid bg-dark' style='height:55px;'>

  </div>

  <div class='container mt-4'>
    <div class='row'>
      <div class='col-10 mx-auto'>
        <p class='display-6 text-center'>Edit Item</p>
      </div>
    </div>
  </div>



  <div class="container my-3">
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
    <div class="row">
      <div class="col-10 col-md-6 mx-auto">
        <form action="../actions/menuAction.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Item name</label>
            <input type="text" name="name" value="<?= $data['name']?>" class="form-control"  id="name" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text"  name="price" class="form-control" value="<?= $data['price']?>"  id="price" required>
          </div>
          <div class="mb-3">
            <label for="des" class="form-label">Description</label>
            <textarea rows="10"  name="description" id="des"  class="form-control"  required >
              <?= trim($data['description'])?>
            </textarea>
          </div>
          <div class="mb-3">
            <style>
              
              .fa-sharp:hover{
                cursor: pointer;
              }
            </style>
            <label for="img" class="form-label">
              <i class="ms-2 fa-sharp fa-solid bg-grey fa-image" style="transform: scale(2);color: grey;" ></i>
            </label>
            <input type="file" accept="image/png, image/jpeg,image/jpg" name="img" class="form-control d-none"  id="img">
          </div>
          

          <div class="mb-3 gap-5">
            <a href="./menu-items.php?view=all" class="btn btn-outline-warning">Back</a>
            <button type="submit" name="edit-item" class="btn btn-outline-success" >
              <i class="fa-sharp fa-solid fa-floppy-disk me-2"></i>
              
            Save</button>
          </div>
          <input type="hidden" name="itemid" value="<?= $item?>">
          <input type="hidden" name="file" value="<?= $data['img_url']?>">
        </form>
      </div>
    </div>
  </div>


  <script>
    document.addEventListener('DOMContentLoaded',()=>{
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
  
  include '../includes/scripts.php' ?>
  </body>


</html>
