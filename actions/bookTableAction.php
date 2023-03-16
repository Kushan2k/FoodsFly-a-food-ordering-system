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


if(isset($_POST['book'])){

  $user = verifyJWT($_COOKIE['jwt-token']);
  $id = $user['user_id'];

  if(checkifhaveBooking($conn,$id)){
    redirectWithWarning($_SERVER['HTTP_REFERER'], "You already have a booking!");
    return;
  }

  $tableid = $_POST['tableID'];

  $sql = "UPDATE tables SET status=1 WHERE table_id={$tableid}";
  if($conn->query($sql)==TRUE){
    $sql = "INSERT INTO tbook(table_id,user_id,book_status) VALUES({$tableid},{$id},0)";

    if($conn->query($sql)==TRUE){
      redirectWithSuccess($_SERVER['HTTP_REFERER'], "Your table has been booked!");
    }else{
      $conn->query("UPDATE tables SET status=0 WHERE table_id={$tableid}");
      redirectWithError($_SERVER['HTTP_REFERER'], 'We could not book your table!');
    }

    

  }else{
    redirectWithError($_SERVER['HTTP_REFERER'], 'We could not book your table!');
  }


}