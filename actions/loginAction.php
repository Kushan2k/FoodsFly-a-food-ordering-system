<?php

include_once '../utils/conn.php';
include_once '../utils/jwt-auth.php';
include '../utils/input_validate.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
  header("Location:../index.php");
}


if(isset($_POST['login'])){
  $email=htmlspecialchars($_POST['email']);
  $passwrod=htmlspecialchars($_POST['password']);

  $STM=$conn->prepare("SELECT user_id,fullname,type,password FROM users WHERE email=?");
  $STM->bind_param("s",$email);
  
  if($STM->execute()){

    $result=$STM->get_result();
    $user=$result->fetch_assoc();
    if($user!=null){
      $id=$user['user_id'];
      $passHash=$user['password'];
      $fullname=$user['fullname'];
      $type=$user['type'];

      if(password_verify($passwrod,$passHash)){
        $_SESSION['msg']='login successful';
        setcookie("login",true,time()+3600*24*30,"/");
        $jwt=createJWTLogin($email,$id,$type);
        setcookie("jwt-token",$jwt,time()+3600*24*30,"/");

        header("Location:../index.php");

      }else{
        redirectWithError('../pages/login.php','please check your password again!');
      }

    }else{
      redirectWithError('../pages/login.php','no records found!');
    }
  }else{
    redirectWithError('../pages/login.php',"couldn't connect!");
  }



}