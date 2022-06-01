<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("./layout/head.php"); ?>
    <link rel="stylesheet" href="./usersArea/css/style.css" type="text/css" media="all">
    <title>Checkout</title>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/online solution.png" alt="Store Logo" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayAll.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION['cart']))$count = count($_SESSION['cart']);
              else $count = 0;?>
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php echo $count;?></sup></a></sup></a>
        </li>
        
       </ul>
    </div>
  </div>
</nav>
<!--Login navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
      </li> 
      <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
      </li> 
    </ul>
</nav>
<!--Welcome message-->
<div class="bg-light">
    <h3 class="text-center">Online Store</h3>
    <p class="text-center">Welcome to our online Store !</p>
</div>
<?php 
if(isset($_SESSION['username'])){
  header('Location: ./payment.php');
}else{
    header('Location: ./usersArea/login.php');
}

?>











<?php include_once("./layout/scripts.php"); ?>
</body>
</html>