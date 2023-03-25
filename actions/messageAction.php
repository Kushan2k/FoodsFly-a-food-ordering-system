

<?php
include_once('../utils/conn.php');

if(isset($_POST['post-msg'])){

  $name=htmlspecialchars($_POST['name']);
  $email=htmlspecialchars($_POST['email']);
  $message=htmlspecialchars($_POST['message']);

  $sql = "INSERT INTO messages(name,email,message) VALUES(?,?,?)";
  $stm = $conn->prepare($sql);
  if($stm){
    $stm->bind_param('sss', $name, $email, $message);
    if($stm->execute()){
      redirectWithSuccess('../index.php', 'Message send successfully!');
      return;
    }else{
      header("Location:{$_SESSION['HTTP_REFERE']}");
    }
  }else{
    header("Location:{$_SESSION['HTTP_REFERE']}");
  }

  


}
?>