<?php


$username='root';
$password='';
$host='localhost';
$dbname='foodsfly';

$conn=new mysqli($host,$username,$password,$dbname);

if($conn->error){
  die();
}