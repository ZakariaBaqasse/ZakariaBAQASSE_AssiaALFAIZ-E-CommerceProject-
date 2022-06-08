<?php
session_start();
 $_SESSION['unpaid']='Payment Candeled! Your Products will remain in the cart';
 header('Location: ../usersArea/user_dashboard.php');
?>