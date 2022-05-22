<?php
  
  try{
    $host='localhost';
    $dbname='e-commerce_store';
    $charset='utf8';
    $user = 'root';
    $password = '';
    $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
}
catch(PDOException $e){
    echo "Error connecting to database";
}


?>