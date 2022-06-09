<?php
session_start();
if(isset($_SESSION['paid'])){
    $message = $_SESSION['paid'];
    echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        $message
      </div>";
      unset($_SESSION['paid']);
}else if(isset($_SESSION['unpaid'])){
  $message = $_SESSION['unpaid'];
  echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
      $message
    </div>";
    unset($_SESSION['unpaid']);
}
include_once('../includes/connectDatabase.php');
include_once('../functions/usersFunctions.php');
if(isset($_SESSION['username'])){
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
    <link rel="stylesheet" href="./css/userDashboardStyle.css">
    <link rel="stylesheet" href="../newStyle.css">
    <style>
      body{
        height: 100vh;
      }
    </style>
  </head>

  <body class="p-0">
    <!--Navbar-->
    <div class="container-fluid p-0 h-100">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Organic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav m-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../displayAll.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./weatherApp.php">Forecast</a>
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
                <a class="nav-link" href="../cart.php">
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
        $name = $_SESSION['username'];
        echo "<li class='nav-item'>
        <a class='nav-link' href='user_dashboard.php'>Welcome $name</a>
    </li> 
    <li class='nav-item'>
        <a class='nav-link' href='logout.php'>Log out</a>
    </li> ";
      ?>
        </ul>
      </nav>
      <div class="row h-100">
        <div class="profile-nav col-md-3">
          <div class="panel ms-5">
            <div class="user-heading round">
              <a href="user_dashboard.php">
                <?php
                 $get_user_query = "Select * from `users` where username='$name'";
                 $get_user_stmt = $db -> prepare($get_user_query);
                 $get_user_stmt->execute();
                 $user = $get_user_stmt->fetch();
                 $profile_picture = $user['profile_picture'];
                 $userName = $user['username'];
                 $email = $user['email'];
                 $address = $user['address'];
                 $mobile = $user['mobile'];
                 $uId = $user['user_id'];
                 
                ?>
                <img src="./usersProfile/<?php echo $profile_picture;?>" alt="">
              </a>
              <h1><?php echo $name;?></h1>
             
            </div>

            <ul class="nav nav-pills nav-stacked d-flex flex-column ms-5 mt-3">
              <li class="mb-3">
                <a href="user_dashboard.php?myOrders">
                  <i class="fa-solid fa-bag-shopping"></i> My Orders</a>
              </li>
              
              <li class="mb-3">
                <a href="user_dashboard.php?editProfile">
                  <i class="fa fa-edit"></i> Edit profile</a>
              </li>
              
              <li class="mb-3">
                <a href="logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <?php if(!isset($_GET['editProfile'])&&!isset($_GET['myOrders'])){
             echo "<h3 class='text-center text-success mt-5 mb-3'>Welcome To your Dashoard $name !</h3>";
          } 
               searchProducts();
          if(isset($_GET['editProfile'])){
            include('./editProfile.php');
          }
          if(isset($_GET['myOrders'])){
            include('./orders.php');
          }
          ?>
          
        </div>
        
      </div>
    </div>  

   



      <?php
          include('../layout/footer.php');
          
        
}
?>
  </body>
  </html>