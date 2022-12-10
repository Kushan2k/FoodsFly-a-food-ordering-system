<?php

function getMenuItemData($conn){

  $SQL="SELECT * FROM menu_item ORDER BY menu_id DESC";
  $result=$conn->query($SQL);
  $data=[];

  if($result==TRUE){

    if($result->num_rows>0){

      while($row=$result->fetch_assoc()){
        array_push($data,$row);
      }
      return $data;

    }else{
      return null;
    }
  }else{
    return null;
  }
}
