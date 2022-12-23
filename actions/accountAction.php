<?php

include '../utils/input_validate.php';
include '../utils/jwt-auth.php';
include '../utils/conn.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='GET'){
  header("Location:../index.php", false, 401);
}
$user=verifyJWT($_COOKIE['jwt-token']);

if(isset($_POST['save-changes'])){

  

  $newname = htmlspecialchars($_POST['fullname']);
  $email = htmlspecialchars($_POST['email']);
  $mobile = htmlspecialchars($_POST['mobile']);
  $address = htmlspecialchars($_POST['address']);

  if(!validMobile($mobile)){

    redirectWithError('../pages/profile.php', 'Mobile is invalid!');
    return ;
  }
  if(!validateEmail($email)){

    redirectWithError('../pages/profile.php', 'Email is not valid!');
    return;
  }

  // TODO 

}else if(isset($_POST['change-password'])){
  $currentPassword = $_POST['cpass'];
  $newpassword = $_POST['npassword'];
  $conformnewpassword = $_POST['conformnpass'];

  $sql = "SELECT password FROM users WHERE user_id={$user['user_id']}";
  $res = $conn->query($sql);
  if($res==TRUE){
    if($res->num_rows>0){
      $cp = $res->fetch_assoc()['password'];
      if(!password_verify($currentPassword,$cp)){
        redirectWithError('../pages/profile.php', "Passwords don't match");
        return;
      }
    }else{
      redirectWithError('../pages/login.php', 'please login first!');
    }
  }else{
    redirectWithError('../pages/profile.php', "error connecting to the database");
  }
  $hash = password_hash($newpassword, PASSWORD_BCRYPT);

  $sql = "UPDATE users SET password=? WHERE user_id=?";
  $stm = $conn->prepare($sql);
  if($stm){
    $stm->bind_param('si', $hash, $user['user_id']);
    if($stm->execute()){
      setcookie("login",null,20,"/");
      setcookie("jwt-token",null,20,"/");
      redirectWithSuccess('../pages/login.php', 'please login again!');
    }else{
      redirectWithError('../pages/profile.php', "error connecting...");
    }

  }else{
    redirectWithError('../pages/profile.php', "error connecting...");
  }
  

}else if(isset($_POST['delete-account'])){

  $sql = "DELETE FROM users WHERE user_id={$user['user_id']}";
  $res = $conn->query($sql);
  if($res==TRUE){
    redirectWithSuccess('../pages/register.php', 'Your account delete successfully');
    return;
  }else{
    redirectWithError('../pages/profile.php', "could not delete your account!<br>please try again later");
    return;
  }
}