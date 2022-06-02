<?php 
    session_start();
  
if(isset($_SESSION['username'])){
  header('Location: ./payment.php');
}else{
    header('Location: ./usersArea/login.php');
}

?>