<?php

include_once '../utils/jwt-auth.php';
session_start();

if(!isAdmin()){
  header("Location:../index.php",401);
}
?>

<html lang="en">
<head>
  <?php include_once '../includes/header.php'?>
  <title>Foodsfly-Admin</title>
  
</head>
  <body>
    <style>
      .nav_item{
        padding-bottom: 5px;
      }
    </style>

    <nav class="container-fluid  px-4 d-flex flex-row navbar-div justify-content-between ">
      <h1 class="brand-name text-danger">FoodsFly</h1>

      <ul id="navbar" class="navbar "> <!-- put navbar class  d-none   d-sm-flex -->
        <li class="nav_item " ><a href="../index.php" class="d-flex">
          <i class="fa-solid fa-house"></i>
        </a></li>
        <li class="nav_item " ><a href="./index.php" class="d-flex"><i class="fa-solid fa-chalkboard-user"></i></a></li>

        <li class="nav_item active-tab" ><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
        <li class="nav_item" ><a href="./users.php"><i class="fa-solid fa-users"></i></a></li>
      </ul>

      <!-- <button class="d-sm-none bg-transparent border-0 icon-btn popup fa-solid fa-bars text-white"></button>

      <button class="d-sm-none bg-transparent border-0 icon-btn d-none hide fa-solid fa-xmark text-white"></button> -->
    </nav>

    <style>
      .item-table{
        overflow-y: scroll;
      }
      .item-table::-webkit-scrollbar{
        display: none;
      }
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

    <div class="container mt-5">
      <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus"></i>
        Add Item
      </button>
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

    <div class="container my-4 h-100 item-table">
      <h2>Filterable Table</h2>
      <p>Type something in the input field to search the table for first names, last names or emails:</p>  
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <br>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="d-none d-sm-flex">#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th class="d-none d-sm-flex">Rating</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          include_once '../utils/conn.php';
          include_once '../utils/select_data.php';

          $data=getMenuItemData($conn);

          if($data!=null){
            for($i=0;$i<count($data);$i++){
              $rating=$data[$i]['rating'];
              $count=$data[$i]['rate_count'];
              $total=(int)$rating/$count;
              
              ?>
              <tr class="" id="row-<?=$data[$i]['menu_id'] ?>">
                <td class="d-none d-sm-flex"><?= $i+1?></td>
                <td><?= ucfirst($data[$i]['name'])?></td>
                <td>Rs.<?= number_format($data[$i]['price'],2,'.',',') ?></td>
                <td><?= ucfirst($data[$i]['category'])?></td>
                <td class="d-none d-sm-flex">
                  <?php

                  for($j=0;$j<$total;$j++){
                            
                    echo '<i class="fa-solid text-warning fa-star"></i>';
                  }


                  ?>
                </td>
                <td>
                  <button data-action='edit' class="bg-transparent border-0 fa-solid fa-pen text-success" data-id=<?= $data[$i]['menu_id'] ?>></button>
                  <button data-action="delete" class="bg-transparent border-0 fa-solid fa-trash text-danger" data-id=<?= $data[$i]['menu_id'] ?>></button>
                </td>
                
              </tr>
              
            <?php }
          }else{?>
            <tr>
              <td colspan="5"><p class="text-center text-warning mt-2">No data found</p></td>
            </tr>
          <?php }


          ?>
          
        </tbody>
      </table>
    </div>

    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"    aria-hidden="true">
      <div class="modal-dialog">
        <form action="../actions/menuAction.php" method="POST" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header " style="background-color: lightgray;">
              <h5 class="modal-title text-center display-6">Add a menu Item</h5>
              <br>
              
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="col-10 mx-auto">
                  
                    <div class="mb-3">
                      <label for="name" class="form-label">Item name</label>
                      <input type="text" name="name" class="form-control"  id="name" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Category</label>
                      <select name="category" class=" form-control form-select" id="">
                        <option value="Main">Main</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Sides">Sides</option>
                        <option value="Short eats">Short eats</option>
                        <option value="Beverages">Beverages</option>
                        <option value="Soup">Soup</option>

                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text"  name="price" class="form-control"  id="price" required>
                    </div>
                    <div class="mb-3">
                      <label for="des" class="form-label">Description</label>
                      <textarea name="desciption" id="des" class="form-control"  required >
                      </textarea>
                    </div>
                    <div class="mb-3">
                      <style>
                        .fa-sharp:hover{
                          cursor: pointer;
                        }
                      </style>
                      <label for="img" class="form-label">
                        <i class="ms-2 fa-sharp fa-solid bg-grey fa-image" style="transform: scale(1.5);" ></i>
                      </label>
                      <input type="file" accept="image/png, image/jpeg,image/jpg" name="img" class="form-control d-none"  id="img" required>
                    </div>
                    <div class="mb-3">
                      <p class="text-danger" style="font-size: 12px;">All feilds are required!</p>
                    </div>
                  
                </div>
            
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Later</button>
                  <button type="submit" name="save-changes" class="btn btn-outline-success">
                    <i class="fa-sharp fa-solid fa-floppy-disk me-2"></i>
                    Add item</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });

      document.addEventListener("DOMContentLoaded",()=>{
        
        setTimeout(() => {
          let error=document.querySelector('.error-div');
          if(error){
            error.remove()
          }
        }, 2000);

    

        let btns=document.querySelectorAll('.fa-solid')

        btns.forEach(btn=>{
          btn.addEventListener('click',(e)=>{
            const TYPES={
              EDIT:'edit',
              DELETE:'delete'
            }
            
            switch(e.target.dataset.action){
              case TYPES.EDIT:
                console.log(e.target.dataset.id)
                break
              case TYPES.DELETE:  
                
                let itemid=parseInt(e.target.dataset.id)

                let req=new XMLHttpRequest()
                
                req.open('POST','../actions/menuAction.php')
                req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                req.onreadystatechange = function () {
                  
                  if (this.readyState == 4 && this.status == 200) {
                    
                    document.getElementById(`row-${itemid}`).remove()
                  
                  }
                };
                req.send(`item_id=${itemid}&deleteMenuItem=true`)


                break  
            }
          })
        }) 
      })
    </script>
    


    
    <?php 
    include_once '../includes/footer.php';
    include_once '../includes/scripts.php'?>
  </body>
</html>