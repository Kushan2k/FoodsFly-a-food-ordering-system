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

function getCartItemsByUserID($conn,$userid){
  $data=[];
  $SQL="SELECT * FROM user_cart INNER JOIN menu_item ON user_cart.item_id =menu_item.menu_id WHERE user_id={$userid} ORDER BY user_cart.id DESC";
  $res=$conn->query($SQL);
  if($res==TRUE && $res->num_rows>0){

    while($row=$res->fetch_assoc()){
      array_push($data,$row);
    }
    return $data;

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

function getUserData($conn,$userID){
  $sql = "SELECT * FROM users WHERE user_id={$userID}";
  $res = $conn->query($sql);
  if($res==TRUE && $res->num_rows>0){
    return $res->fetch_assoc();
  }else{
    return null;
  }
}


function getChefData($conn){

  $data = [];

  $sql = "SELECT * FROM users WHERE type=1567";
  $result = $conn->query($sql);

  if($result==TRUE){
    if($result->num_rows>0){

      while($row=$result->fetch_assoc()){
        array_push($data, $row);
      }

      return $data;
    }else{
      return null;
    }
  }else{
    return null;
  }

}

function getOrderItems($conn,$orderid){
  $html="";

  $sql = "SELECT menu_id,qty FROM order_item WHERE order_id={$orderid}";
  $res = $conn->query($sql);
  if($res==TRUE){
    // number_format($data['price'], 2, '.', ',')

    while($item=$res->fetch_assoc()){
      $sql = "SELECT name,price,img_url FROM menu_item WHERE menu_id={$item['menu_id']}";
      $result = $conn->query($sql);
      if($result==TRUE){
        $data = $result->fetch_assoc();
        $html.="<li class='col-md-4'>
          <figure class='itemside mb-3'>
              <div class='aside'><img src='{$data['img_url']}' class='img-sm border'></div>
              <figcaption class='info align-self-center'>
                  <p class='title'>{$data['name'] }<br>
                  <span class='text-muted'> RS.{$data['price']}</span>
                </p>
                <p>
                  <span class='text-danger'>X</span>
                  <span>{$item['qty']}</span>
                </p>
              </figcaption>
          </figure>
        </li>";
      }
    }
  }else{
    $html.='<li class="col-md-4">
        <figure class="itemside mb-3">
            <figcaption class="info align-self-center">
                <p class="title text-danger text-center">Error </p>
            </figcaption>
        </figure>
      </li>';
 }

  return $html;
}


function getTrackingBoc($status){
  if($status==0){
    return '<div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> In Processing</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Completed</span> </div>';

  }else if($status==1){
    return '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> In Processing</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Completed</span> </div>';
  }else if($status==2){
    return '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> In Processing</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Completed</span> </div>';
  }else if($status==3){
    return '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> In Processing</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Completed</span> </div>';
  }else{
    return '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> In Processing</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Completed</span> </div>';
   }


}
