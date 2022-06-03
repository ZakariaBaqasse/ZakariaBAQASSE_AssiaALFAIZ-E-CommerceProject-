<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['message']);
unset($_SESSION['location']);
header('Location: ../index.php');

?>