<?php

session_start();
include_once '../utils/input_validate.php';
include_once '../utils/conn.php';


if(isset($_POST['add-chef'])){
  $name = htmlspecialchars($_POST['chef-name']);
  $address = htmlspecialchars($_POST['chef-address']);
  $mobile = $_POST['chef-mobile'];
  $email = $_POST['chef-email'];
  $password = $_POST['chef-password'];
  $cpassword = $_POST['chef-cpassword'];

  if(!validateEmail($email)){
    redirectWithError($_SERVER['HTTP_REFERER'], "Email is not valid!");
    return;
  }

  if(!valiatePassword($password,$cpassword)){
    redirectWithError($_SERVER['HTTP_REFERER'], "Passwords do not match!");
    return;
  }

  if(!validMobile($mobile)){
    redirectWithError($_SERVER['HTTP_REFERER'], "Mobile number is not valid!");
    return;
  }

  if(checkRecordExistsinDatabase($conn,$email,$mobile)>0){
     redirectWithError($_SERVER['HTTP_REFERER'], "User already exsits!");
      return;
  }

  $password_hash=password_hash($password,PASSWORD_BCRYPT);

  $query = "INSERT INTO users(fullname,address,mobile,email,password,type) VALUES(?,?,?,?,?,?)";
  $stm = $conn->prepare($query);

  if($stm){
    $type = 1567;
    $stm->bind_param('sssssi', $name, $address, $mobile, $email, $password_hash,$type);
    if($stm->execute()){
      redirectWithSuccess($_SERVER['HTTP_REFERER'], 'Chef is added to the system!');
    }else{
      redirectWithError($_SERVER['HTTP_REFERER'], "we could not add the chef");
      return;
    }
  }else{
    redirectWithError($_SERVER['HTTP_REFERER'], "we could not add the chef");
    return;
  }




}


?>