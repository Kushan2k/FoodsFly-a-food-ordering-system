<?php

// $_POST=array('name'=>'kushan','email'=>'k@gmail.com','password'=>'dgdfg','register'=>true)

include_once '../utils/conn.php';
include_once '../utils/input_validate.php';

if(isset($_POST['register'])){
  $name=$_POST['fullname'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
  $cpass=$_POST['cpassword'];

  $address=$_POST['address'];

  if(validateEmail($email)){
    if(valiatePassword($password,$cpass)){
      if(validMobile($mobile)){

        // TODO 



      }else{
        setcookie("error","Mobile is not valid",time()+10000,"/","");
        header("Location:../pages/register.php");

      }

    }else{
      setcookie("error","Password is not valid",time()+10,"/","");
      header("Location:../pages/register.php");
    }
  }else{
    setcookie("error","Email is not valid!",time()+10,"/","");
    header("Location:../pages/register.php");
  }


}