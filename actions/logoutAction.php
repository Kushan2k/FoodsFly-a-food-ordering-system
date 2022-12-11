<?php


if(isset($_GET['action']) && $_GET['action']=='logout'){

  setcookie("login",null,20,"/");
  setcookie("jwt-token",null,20,"/");

  header("Location:../index.php");
}