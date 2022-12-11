<?php

include_once '../utils/conn.php';
include_once '../utils/jwt-auth.php';
include_once '../utils/select_data.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
  header("Location:../index.php");
}


if(isset($_POST['addToCart'])){
  $itemid=$_POST['item_id'];
  $userId=verifyJWT($_COOKIE['jwt-token'])['user_id'];

  $SQL="INSERT INTO user_cart(user_id,item_id) VALUES(?,?)";
  $stm=$conn->prepare($SQL);
  if($stm){
    $stm->bind_param("ii",$userId,$itemid);
    if($stm->execute()){
      $count=getCartItemCount($conn,$userId);
      $res=[
        "status"=>true,
        "newCount"=>$count
      ];
      echo json_encode($res);
    }else{
      $res=[
        "status"=>false,
        "newCount"=>0
      ];
      echo json_encode($res);
    }
  }else{
    $res=[
      "status"=>false,
      "newCount"=>0
    ];
    echo json_encode($res);
  }
}
