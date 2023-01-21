<?php

function validateEmail($email){

  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    return true;
  }else{
    return false;
  }
}


function valiatePassword($password,$compass){

  if($password==$compass){
    if(strlen($password)>=8){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}

function validMobile($mobile){

  if(strlen($mobile)==10){
    return true;
  }else{
    return false;
  }
  
}

function checkRecordExistsinDatabase($conn,$testEmail,$testMobile){

  $SQL=$conn->prepare("SELECT user_id FROM users WHERE email=? OR mobile=? LIMIT 1");
  $SQL->bind_param("ss",$testEmail,$testMobile);
  $SQL->execute();
  $result = $SQL->get_result();
  $user = $result->fetch_assoc();

  if($user==null){
    return false;
  }
  $SQL->close();
  return $user['user_id'];


  
  

  

}

function redirectWithError($to,$msg){
  $_SESSION['error']=$msg;
  header("Location:{$to}");
}

function redirectWithSuccess($to,$msg){
  $_SESSION['suc']=$msg;
  header("Location:{$to}");
}

function redirectWithWarning($to,$msg){
  $_SESSION['warning'] = $msg;
  header("Location:{$to}");
}