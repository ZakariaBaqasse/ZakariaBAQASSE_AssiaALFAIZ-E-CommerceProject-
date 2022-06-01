<?php
  include_once('./includes/connectDatabase.php');
  include_once('./functions/common_functions.php');
  cart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Project</title>
    <link rel="shortcut icon" type="image/png" href="./images/online solution.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    </head>
<body class="p-0">
    <!--Navbar-->
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
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
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
<!--Products and side nav-->
<div class="row">
    <div class="col-md-10">
        <!--Products-->
        <div class="row">
        <?php
         
          getProducts();
          searchProducts();
          getUniqueCategory();
          getUniqueBrand();
        ?>
           </div>

        <!--col-->
    </div>
    <div class="col-md-2 bg-secondary p-0">
        <!--Sidenav-->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h4>Brands</h4></a></li>
            <?php
              getBrands();
            ?>
        </ul>
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h4>Categories</h4></a></li>
            <?php
             getCategories();
            ?>
        </ul>
    </div>
</div>







    </div>






    
    <script type="text/javascript" src="./customScripts/indexScript.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>
</html>