<?php

include '../vendor/autoload.php';


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function createJWTLogin($email,$user_id,$type){
  
  $key='7c296c15ee1a4097bd0b5656011194d7343c609b';
  
  $payload = [
    'iss' => 'localhost',
    'aud' => 'localhost',
    'exp'=>time()+3600*24*30,
    'data'=>[
      'user_id'=>$user_id,
      'email'=>$email,
      'type'=>$type=='customer'?'customer':'admin'
    ]
  ];

  return JWT::encode($payload, $key, 'HS256');

}

function verifyJWT($jwt){
  try{
    $key='7c296c15ee1a4097bd0b5656011194d7343c609b';
    $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

    $ar=(array)$decoded->data;
    return $ar;
  }catch(Exception $e){
    return null;
  }
}

function checkIsLogedIn(){


  if(isset($_COOKIE['login']) && isset($_COOKIE['jwt-token'])){
    if(verifyJWT($_COOKIE['jwt-token'])!=null){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}

function isAdmin(){

  if(checkIsLogedIn()){
    $user=verifyJWT($_COOKIE['jwt-token']);
    if($user!=null){
      if($user['type']=='admin'){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }

  }else{
    return false;
  }
}
