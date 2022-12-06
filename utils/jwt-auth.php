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
      'type'=>$type
    ]
  ];

  return JWT::encode($payload, $key, 'HS256');

}

function verifyJWT($jwt){
  $key='7c296c15ee1a4097bd0b5656011194d7343c609b';
  $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

  print_r($decoded);  
}

verifyJWT('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJhdWQiOiJsb2NhbGh3QiLCJleHAiOjE2NzI5MTg5MTEsImRhdGEiOnsidXNlcl9pZCI6MiwiZW1haWwiOiJrdXNoYW5nYXlhbnRoYXBlcmN5QGdtYWlsLmNvbSIsInR5cGUiOiJjdXN0b21lciJ9fQ.I3RCewRWnVIE70Y0QJ5iLv6sWTLxB78mlBw6-MbuPG4');
