<?php

function getMenuItemData($conn){

  $SQL="SELECT * FROM menu_item ORDER BY menu_id DESC";
  $result=$conn->query($SQL);
  $data=[];

  if($result==TRUE){

    if($result->num_rows>0){

      while($row=$result->fetch_assoc()){
        array_push($data,$row);
      }
      return $data;

    }else{
      return null;
    }
  }else{
    return null;
  }
}

function getCartItemCount($conn,$user_id){
  $SQL="SELECT COUNT(id) AS item_count FROM user_cart WHERE user_id={$user_id}";
  
  $res=$conn->query($SQL);
  if($res==TRUE){
    return $res->fetch_assoc()['item_count'];
  }else{
    return 0;
  }
}

function getAllCustomres($conn){
  $users=[];
  $SQL="SELECT * FROM users WHERE type='customer'";
  $res=$conn->query($SQL);
  if($res==TRUE){
    if($res->num_rows>0){
      while($row=$res->fetch_assoc()){
        array_push($users,$row);
      }
      return $users;
    }else{
      return null;
    }
  }else{
    return null;
  }
}

function getMenuItemByID($conn,$menuID){
  $SQL="SELECT * FROM menu_item WHERE menu_id=?";
  $STM=$conn->prepare($SQL);
  if($STM){
    $STM->bind_param("i",$menuID);
    $STM->execute();
    $data=$STM->get_result();
    $data=$data->fetch_assoc();
    if($data!=null){
      return $data;
    }else{
      return null;
    }
  }else{
    return null;
  }
}
