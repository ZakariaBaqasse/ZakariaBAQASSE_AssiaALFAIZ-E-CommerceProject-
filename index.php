<?php
  include_once('./includes/connectDatabase.php');
  include_once('./functions/common_functions.php');
  cart();
  $_SESSION['location'] ='../index.php';
  
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="newStyle.css">
  </head>

  <body class="p-0">
    <!--Navbar-->
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
            <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn0" type="submit">Search</button>
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
    <?php
     if(!isset($_GET['brand'])&&!isset($_GET['categorie'])&&!isset($_GET['gender'])){
    ?>
    <section class="main">
      <div class="container py-5">
        <div class="row py-5">
          <div class="col-lg-7 pt-5 text-center">
            <h1 class="pt-5">Stay Always in Fashion !</h1>
            <button class="btn1 mt-3">More Tips</button>
          </div>
        </div>

      </div>

    </section>
    
      <section class="new">
      <div class="container py-5">
        <h2 class="text-center my-4">Our Features</h2>
        <div class="row pt-5">
          <div class="col-lg-7 m-auto">
            <div class="row text-center mb-4">
              <div class="col-lg-4">
                <img src="./images/pendant-g9e3abb396_640.jpg" class="img-luid" alt="">
                <h6>Fashion</h6>
              </div>
              <div class="col-lg-4">
                <img src="./images/pocket-watch-g3ae381e28_640.jpg" class="img-luid" alt="">
                <h6>Cool</h6>
              </div>
              <div class="col-lg-4">
                <img src="./images/wristwatch-gb573d2315_640.jpg" class="img-luid" alt="">
                <h6>New</h6>
 
              </div>
              
            </div>

          </div>
        </div>
      </div>
    </section>
    <section class="product">
      <div class="container py-5">
        <div class="row py-5 ">
          <div class="col-lg-5 m-auto text-center">
             <h1>What's Trending</h1>
             <h6 style="color:rgb(214, 36, 89);">Our Top Choices</h6>
          </div>
        </div>
        <div class="row">
          <?php
           getProducts();
          ?>
        </div>
        
      </div>
    </section>
    <section class="shop">
      <div class="container">
        <div class="row py-5">
          <div class="col-lg-8 m-auto text-center">
            <h1>Explore Our Store</h1>
            <h6 style="color:rgb(207, 65, 101);">Pick your Product From Our Store</h6>
          </div>
        </div>
        <div class="row">
          <?php
          getMoreProducts();
          ?>
      
      </div>
    </section>
    <section class="apple py-5">
      <div class="container text-white py-5">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="font-weight-bold py-3">Be Always the best</h1>
            <h6 >Be Fashionable</h6>
            <button class="btn1 mt-3">More From Us</button>
          </div>
        </div>
      </div>
    </section>
    <section class="container py-5">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-5 m-auto text-center">
            <h1>Contact Us</h1>
            <h6 style="color:red;">Always Be In Touch With Us</h6>
          </div>
        </div>
        <div class="row py-5">
          <div class="col-lg-9 m-auto">
            <div class="row">
              <div class="col-lg-4">
                <h6>LOCATION</h6>
                <p>New York 666 First Street</p>
              
                <h6>PHONE</h6>
                <p>0655448905</p>
              
                <h6>EMAIL</h6>
                <p>assiagop@gmail.com</p>
              
            </div>
            <div class="col-lg-7">
              <div class="row">
                <div class="col-lg-6">
                  <input  type="text" class="form-control bg-light" placeholder="First Name">
                </div>
                <div class="col-lg-6">
                  <input  type="text" class="form-control bg-light" placeholder="Last Name">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 py-3">
                  <textarea name="" class="form-control bg-light"  placeholder="Enter Your Name" cols="10" rows="5"></textarea>
                </div>
              </div>
              <button class="btn1">Submit</button>
            </div>

          </div>
        </div>
      </div>
    </section>
    <?php
     }
    ?>
    <!--Products and side nav-->
    <div class="row">
      <div class="col-md-10">
        <!--Products-->
        <div class="row">
          <?php
         
         
          searchProducts();
          getUniqueCategory();
          getUniqueBrand();
        ?>
        </div>

        <!--col-->
      </div>
     
    </div>







    </div>




    <?php
include('./layout/footer.php');

?>


    <script type="text/javascript" src="./customScripts/indexScript.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
  </body>

  </html>