<?php
session_start();
// $_POST=array('name'=>'kushan','email'=>'k@gmail.com','password'=>'dgdfg','register'=>true)
if($_SERVER['REQUEST_METHOD']=='GET'){
  header("Location:../index.php");
}

include_once '../utils/conn.php';
include_once '../utils/input_validate.php';


if(isset($_POST['register'])){
  $name=$_POST['fullname'];
  $email=htmlspecialchars($_POST['email']);
  $mobile=htmlspecialchars($_POST['mobile']);
  $password=htmlspecialchars($_POST['password']);
  $cpass=htmlspecialchars($_POST['cpassword']);

  $address=htmlspecialchars($_POST['address']);

  if(validateEmail($email)){
    if(valiatePassword($password,$cpass)){
      if(validMobile($mobile)){
        if(!checkRecordExistsinDatabase($conn,$email,$mobile)){
          $hash=password_hash($password,PASSWORD_BCRYPT);
          $STM=$conn->prepare("INSERT INTO users(fullname,email,mobile,password,address) VALUES(?,?,?,?,?)");
          $STM->bind_param("sssss",$name,$email,$mobile,$hash,$address);
          if($STM->execute()){
            header("Location:../pages/login.php");
          }else{
            redirectWithError('../pages/register.php','your registration was not recoded! please try again!');
          }
        }else{
          redirectWithError('../pages/register.php','user already exists!');
        } 
      }else{
        redirectWithError('../pages/register.php','mobile number is not valid!');

      }
    }else{
      redirectWithError('../pages/register.php','please check your password inputs again');
    }
  }else{
    redirectWithError('../pages/register.php','email you enterd is not valid!');
  }
}