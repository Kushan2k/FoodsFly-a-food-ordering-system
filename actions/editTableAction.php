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
    $currentstatus = $_POST['status'];
    $newstatus = $currentstatus == 1 ? 0 : 1;  
  
    $sql = "UPDATE tables SET status = {$newstatus} WHERE table_id = $tableid";
    
    if($conn->query($sql)==TRUE){

      if($currentstatus==1){
        $sql = "DELETE FROM tbook WHERE table_id={$tableid}";
        if($conn->query($sql)==TRUE){
          redirectWithSuccess($_SERVER['HTTP_REFERER'], "Changed Sucessfully");
        }else{
           redirectWithError($_SERVER['HTTP_REFERER'], 'Something Went Wrong');
        }
      }

      redirectWithSuccess($_SERVER['HTTP_REFERER'], "Changed Sucessfully");

      

      
    }else{
      redirectWithError($_SERVER['HTTP_REFERER'], 'Something Went Wrong');
    }

  
?>