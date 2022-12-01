<?php
session_start();

function CheckLogedin(){

  if(isset($_COOKIE['login'])){
    $_SESSION['login']=true;
  }
}