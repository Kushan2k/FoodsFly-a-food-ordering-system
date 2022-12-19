<?php

include_once '../utils/jwt-auth.php';

if(!isAdmin()){
  header("Location:../index.php",true,401);
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
        <li class="nav_item " ><a href="./index.php" class="d-flex"><i class="fa-solid fa-house "></i></a></li>

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
    </style>

    <div class="container mt-5">
      
    </div>

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
              <tr class="">
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
                console.log(e.target.dataset.id)
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