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

  if(filter_var($mobile,FILTER_VALIDATE_INT)){
    if(strlen($mobile)==10){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}