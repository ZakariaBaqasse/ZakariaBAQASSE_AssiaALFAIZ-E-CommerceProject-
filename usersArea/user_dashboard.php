<?php
session_start();
if(isset($_SESSION['insert'])){
    $message = $_SESSION['insert'];
    echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        $message
      </div>";
      unset($_SESSION['insert']);
}
?>