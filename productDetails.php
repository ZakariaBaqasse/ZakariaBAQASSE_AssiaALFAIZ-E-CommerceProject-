<?php

  include_once('./includes/connectDatabase.php');
  include_once('./functions/common_functions.php');
  cart();
  
  $_SESSION['location'] ="../productDetails.php?product_id=" . $_GET['product_id'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ecommerce Project</title>
        <link rel="shortcut icon" type="image/png" href="./images/online solution.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="details.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="newStyle.css">
    </head>

    <body class="p-0 mb-5">
        <!--Navbar-->
        <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">Organic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav m-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="displayAll.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./usersArea/register.php">Register</a>
            </li>
            <div class="dropdown">
              <button class="dropbtn nav-link">Brands</button>
              <div class="dropdown-content">
                <?php
             getBrands();
            ?>
              </div>
            </div>
            <?php
         getCategories();
        ?>
              <li class="nav-item">
                <?php if(isset($_SESSION['cart']))$count = count($_SESSION['cart']);
              else $count = 0;?>
                <a class="nav-link" href="cart.php">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <sup>
                    <?php echo $count;?>
                  </sup>
                </a>
                </sup>
                </a>
              </li>

          </ul>
          <form class="d-flex">
            <input class="px-2 search" type="search" placeholder="Search" name="search_data_product">
            <input class="btn0" type="submit" value="Search" name="search_data">
          </form>
        </div>
      </div>
    </nav>
            <!--Login navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">
                    <?php
      if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        echo "<li class='nav-item'>
        <a class='nav-link' href='./usersArea/user_dashboard.php'>Welcome $name</a>
    </li> 
    <li class='nav-item'>
        <a class='nav-link' href='./usersArea/logout.php'>Log out</a>
    </li> ";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
    </li> 
    <li class='nav-item'>
        <a class='nav-link' href='./usersArea/login.php'>Login</a>
    </li> ";
      }
      ?>
                </ul>
            </nav>
            <!--Welcome message-->
            <div class="bg-light">
                <h3 class="text-center">Online Store</h3>
                <p class="text-center">Welcome to our online Store !</p>
            </div>
            <!--Products and side nav-->
            <div class="row">
                <div class="col-md-12">
                    <!--Products-->
                    <div class="row mt-2">
                        <?php
                        displayDetails();
                        ?>

                    </div>
                    <?php
          searchProducts();
          getUniqueCategory();
          getUniqueBrand();
        ?>
                </div>
                <!--col-->
            </div>
        </div>







 






        <script type="text/javascript" src="./customScripts/slideshowscript.js"></script>
        <script type="text/javascript" src="./customScripts/indexScript.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>

    </html>