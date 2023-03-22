<?php
include_once '../utils/jwt-auth.php';
include_once('../utils/conn.php');
include_once('../utils/select_data.php');

if(!isAdmin()){
  header("Location:../index.php",401);
}

setMessagesStatusToViewd($conn);
?>
<html lang="en">
<head>
  <?php include_once '../includes/header.php'?>
  <title>Foodsfly-Admin-View-Messages</title>
  
</head>
  <body>
    

  <style>
    .nav_item{
      padding-bottom: 10px;
    }
  </style>

    <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
      <h1 class="brand-name text-danger">FoodsFly</h1>

      <ul id="navbar" class="navbar "> <!-- put navbar class  d-none   d-sm-flex -->
        <li class="nav_item " ><a href="../index.php" class="d-flex">
          <i class="fa-solid fa-house"></i>
        </a></li>
        <li class="nav_item active-tab" ><a href="" class="d-flex">
          <i class="fa-solid fa-chalkboard-user"></i>
        </a></li>

        <li class="nav_item" ><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
        <li class="nav_item" ><a href="./view-chef.php?view=all"><i class="fa-solid fa-users "></i></a></li>
      </ul>

      <!-- <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button> -->
    </nav>
  </body>
  <div class='container mt-5'>
    <div class='container my-2'>
      <a href='./index.php' class='btn btn-outline-warning btn-sm'>Back</a>
    </div>
    <div class="accordion" id="accordionExample">
    <?php

      $sql = "SELECT * FROM messages ORDER BY id DESC";
      $res = $conn->query($sql);
      if($res==TRUE){
        if($res->num_rows>0){
          

          while($data=$res->fetch_assoc()){?>
            <div class="accordion-item mt-2">
              <h2 class="accordion-header" id="heading-<?= $data['id']?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#div-<?= $data['id']?>" aria-expanded="true" aria-controls="div-<?= $data['id']?>">
                  <?= $data['email'] ?>
                </button>
              </h2>
              <div id="div-<?= $data['id']?>" class="accordion-collapse collapse show" aria-labelledby="heading-<?= $data['id']?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>
                    <?= ucfirst($data['message'])?>
                  </p>
                </div>
              </div>
            </div>
          <?php }
        }else{?>

          <p class='text-center alert alert-warinng'>No Messages Found!</p>
          
        <?php }
      }else{?>
        <p class='text-center alert alert-warinng'>Error</p>
      <?php }


  ?>
  </div>

  </div>
  <?php 
    include_once '../includes/scripts.php'?>
  </body>
</html>