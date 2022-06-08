<?php
include_once('./includes/connectDatabase.php');
include_once('./functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once("./layout/head.php"); 
    session_start();
    ?>
  <script src="https://use.fontawesome.com/fbf13eceb7.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="./styles/paymentStyle.css">
  <link rel="stylesheet" href="newStyle.css">
  <title>Checkout</title>
</head>

<body class="p-0">
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

    <main>

      <!-- DEMO HTML -->
      <div class="container">
        <div class="py-5 text-center">

        </div>

        <div class="row">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">

            <?php
      $total = 0;
      $user = $_SESSION['username'];
      $get_user = "select * from `users` where username = '$user'";
      $getStmt = $db->prepare($get_user);
      $getStmt->execute();
      $resultQuery = $getStmt->fetch();
      $currentId = $resultQuery['user_id'];

      $products = array_column($_SESSION['cart'],'product_id');
      foreach($products as $cartItem){
        $select = "select * from `products` where product_id = $cartItem";
        $stmt = $db->prepare($select);
        $stmt->execute();
        $result = $stmt->fetch();
        $title = $result['product_title'];
        $price = $result['product_price'];
        $total += $price;
        echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>
        <div>
          <h6 class='my-0'>$title</h6>
          
        </div>
        <span class='text-muted'>$price MAD</span>
      </li>";
      }
      ?>

              <li class="list-group-item d-flex justify-content-between">
                <span>Total (MAD)</span>
                <strong id="total">
                  <?php echo $total; ?>
                </strong>
              </li>
          </ul>

        </div>
        <div class="row">


          <h4 class="mb-3">Payment</h4>
          <hr class="mb-4">
          <div id="paypal-button" class="w-50 mx-auto my-5">
           
          </div>

          </form>
        </div>


      </div>
    </main>
 





        <?php include_once("./layout/scripts.php"); 
             include_once("./layout/footer.php");
        ?>
        <script src="https://www.paypal.com/sdk/js?client-id=AfnYrtJAA2TsLrCx41dOrXQDgQ36DLihNrBfgxThxkcRjlTA8HjGli30PIJ9fcqNRf_BiD-vESmzokc6&currency=USD&disable-funding=credit,card"></script>
        <script src="./customScripts/paymentScript.js"></script>
</body>

</html>