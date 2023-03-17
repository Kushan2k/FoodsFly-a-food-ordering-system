<?php
$username='root';
$password='';
$host='localhost';
$dbname='foodsfly';

$conn=new mysqli($host,$username,$password,$dbname);
$status = 0;

if($conn->errno){
  header("Location:../index.php");

}
