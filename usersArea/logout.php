<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['message']);
header('Location: ../index.php');

?>