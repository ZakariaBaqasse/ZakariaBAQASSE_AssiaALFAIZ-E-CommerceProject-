<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("./layout/head.php"); ?>
    <title>Checkout</title>
</head>
<body>
<?php include_once("./layout/navbar.php"); 
/*if(isset($_SESSION['username'])){
    include_once('./payment.php');
}else{*/
    include_once('./payment.php');
//}

?>











<?php include_once("./layout/scripts.php"); ?>
</body>
</html>