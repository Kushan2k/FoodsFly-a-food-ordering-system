<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='GET'){
  header("Location:../index.php");
}

include_once '../utils/conn.php';
include_once '../utils/input_validate.php';
include_once('../utils/jwt-auth.php');
include_once('../utils/select_data.php');
header('Access-Control-Allow-Methods: POST');
if(isset($_POST['change']))

  
    $tableid = $_POST['tableID'];
  
    $sql = "UPDATE tables SET status = CASE WHEN status = 1 THEN 0 ELSE 1 END WHERE table_id = '$tableid'";
      if($conn->query($sql)==TRUE){
        redirectWithSuccess($_SERVER['HTTP_REFERER'], "Changed Sucessfully");
      }else{
        redirectWithError($_SERVER['HTTP_REFERER'], 'Something Went Wrong');
      }

  
?>