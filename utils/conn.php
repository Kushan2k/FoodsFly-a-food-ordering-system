<?php

if(session_status()!=PHP_SESSION_ACTIVE){
  session_start();
}

$username='root';
$password='';
$host='localhost';
$dbname='foodsfly';

$conn=new mysqli($host,$username,$password,$dbname);

if($conn->error){
  die();
}
