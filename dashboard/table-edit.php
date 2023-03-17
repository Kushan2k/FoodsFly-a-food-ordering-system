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
  <title>Foodsfly-Admin</title>
  <link rel='stylesheet' href='../assets/css/tables.css'/>
  
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

        <li class="nav_item " ><a href="./menu-items.php"><i class="fa-solid fa-list "></i></a></li>
        <li class="nav_item active-tab" ><a href=""><i class="fa-solid fa-users "></i></a></li>
      </ul>
    </nav>
    </div>

    <style>
      th,td{
        text-align: center;
      }
    </style>
      
    <div class='container'>
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
                  <p class="custom-alert text-center error"><?= $_SESSION['warning']?></p>
                </div>
              </div>
            </div>
            
          <?php $_SESSION['warning'] = null; }?>

      </div>
      <div class="container my-4 h-50 item-table">
        <table class="table table-bordered table-striped mt-4">
          <thead>
            <tr>

              <th>Table Number</th>
              <th>Occupants</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php

            $data = getTableData($conn);

            if($data!=null){

              for ($i = 0; $i < count($data);$i++) {?>
              <tr>
                <td><?= ucfirst($data[$i]['table_number']) ?></td>
                <td><?= $data[$i]['occupants'] ?></td>
                <td class='<?= $data[$i]['status']==1?'text-danger':'text-success' ?>'><h5><?= $data[$i]['status']==1?'Booked':'Availble' ?></h5></td>
                <td>
                <form action='../actions/editTableAction.php' method='POST'>
                  <input type='hidden' value='<?= $data[$i]['table_id']?>' name='tableID'/>
                  <input type='hidden' value='<?= $data[$i]['status']?>' name='status'/>
                  <?php
                  if($data[$i]['status']==1){?>
                    <input type='submit' class='btn btn-warning' name='change' value='Cancel' >
                  <?php }else{?>
                    <input type='submit' class='btn btn-success' name='change' value='Book' >
                  <?php }
                  ?>
                </form>
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

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        setTimeout(() => {
          let error = document.querySelector(".error-div")
          if (error) {
            error.remove()
          }
        }, 2000)
      })
    </script>


    
    
    

<?php  include_once '../includes/scripts.php'?>
  </body>
</html>