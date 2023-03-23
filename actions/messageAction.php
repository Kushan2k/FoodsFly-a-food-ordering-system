<?php


if(isset($_POST['post-msg'])){

  $name=htmlspecialchars($_POST['name']);
  $email=htmlspecialchars($_POST['email']);
  $message=htmlspecialchars($_POST['message']);

  //create connection

  $conn = new mysqli($name,$email,$message);

  if($conn->connect_error){
    die("connction failed: ".$conn->connect_error) ;
  }
  $sql="SELECT * FROM messages";
  $result=$conn->query($sql);

  $sql = ("INSERT INTO messages(name,email,message) VALUES($name,$email,$message)");
  

  if($result->num_rows >0){
    while($row = $result->fetch_assoc()){

      echo $row["name"]."" .$row["email"]."" .$row["message"]."<br>" ;

    }

  }else{
    echo "0 results";
  }

  $conn->close();




}
?>