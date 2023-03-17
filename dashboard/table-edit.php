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
      
    <div class='container'>
      <div class="container my-4 h-50 item-table">
        <table class="table table-bordered table-striped">
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
                <td><?= $data[$i]['status'] ?></td>
                <td>
                <form action='../actions/editTableAction.php' method='POST'>
                            <input type='hidden' value='<?= $data[$i]['table_id']?>' name='tableID'/>
                            <input type='submit' class='btn btn-success' name='change' value='Change'/>
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


    
    
    

<?php  include_once '../includes/scripts.php'?>
  </body>
</html>