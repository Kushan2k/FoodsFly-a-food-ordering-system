<?php

session_start();

include_once '../utils/jwt-auth.php';
include_once '../utils/conn.php';
include_once '../utils/select_data.php';
include_once '../utils/input_validate.php';

header("Access-Control-Allow-Methods:POST");
header("ACcess-Control-Allow-Origin:localhost");

if($_SERVER["REQUEST_METHOD"]=='GET'){
  header("Location:../index.php");
}

if(isset($_POST['add-order'])){

  print_r($_POST);
  $order_id=random_int(11111,999999999);
  $user=verifyJWT($_COOKIE['jwt-token']);
  $total = $_POST['total'];

  if($user==null){
    redirectWithError('../pages/cart.php','User not found!');
  }

  $user_id=$user['user_id'];

  $error = [];

  if(addtoOrders($conn,$order_id,$total,$user_id)){
    for ($i=0; $i <count($_POST['item_id']) ; $i++) {
      $itemid = $_POST['item_id'][$i];
      $qty = $_POST['count'][$i];
      echo $itemid;
      if(!addOrderItems($conn, $order_id, $itemid, $qty)){
        $menu = getMenuItemByID($conn, $itemid);
        array_push($error, $menu['name']);
      }

      
    }

    clearCart($conn, $user_id);

    if(count($error)>0){

      $msg="";
      for ($i=0; $i < count($error); $i++) { 
        $msg.="Item {$error[$i]} did not add to the order.<br>";
      }

      redirectWithWarning('../pages/order.php', $msg);

    }else{
      redirectWithSuccess("../pages/order.php", "Your order has been submited for approval!");
    }

  }else{
    redirectWithError('../pages/cart.php', "Could not add your order <br> please try again");
  }






}

if(isset($_POST['cancel-order'])){
  $id = $_POST['order_id'];

  $sql = "DELETE FROM orders WHERE order_id={$id}";
  if($conn->query($sql)==TRUE){
    redirectWithSuccess($_SERVER['HTTP_REFERER'], "You order has been canceld!");
  }else{
    redirectWithError($_SERVER['HTTP_REFERER'], "Sorry we couldn't cancel your order!");
  }
}

function addtoOrders($conn,$id,$total,$userId){

  $orderSQL = "INSERT INTO orders(order_id,total,user_id) VALUES(?,?,?)";
  

  $orderSTM = $conn->prepare($orderSQL);

  if($orderSTM==false){
    return false;
  }
  $orderSTM->bind_param('iii', $id, $total, $userId);
  if($orderSTM->execute()){
    return true;
  }else{
    return false;
  }


}

function addOrderItems($conn,$order_id,$menuid,$qty){
  $ordermenuSQl = "INSERT INTO order_item(menu_id,order_id,qty) VALUES(?,?,?)";
  $meniitemSTM = $conn->prepare($ordermenuSQl);

  if($meniitemSTM){
    $meniitemSTM->bind_param("iii", $menuid, $order_id, $qty);

    if($meniitemSTM->execute()){
      return true;
    }else{
      return false;
    }

  }else{
    return false;
  }
}

function clearCart($conn,$user_id){
  $sql = "DELETE FROM user_cart WHERE user_id={$user_id}";

  if($conn->query($sql)==TRUE){
    return true;
  }else{
    return false;
  }
}
