<?php
session_start();
 include_once("./includes/connectDatabase.php");
 include_once("./functions/common_functions.php");
 $_SESSION['location'] ='../cart.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include_once("./layout/head.php"); ?>
        <title>Cart</title>
    </head>

    <body class="p-0">
        <!--navbar-->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="./images/online solution.png" alt="Store Logo" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                        </form>
                    </div>
                </div>
            </nav>
            <!--navbar-->
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
            <h1>Shopping Cart</h1>

            <div class="shopping-cart mx-3">
                <form action="" method="post">

                    <?php
                        $total =[];
                        if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0){
                            
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>"; 
                            echo  "<button type='button' class='btn btn-info'><a class='text-light text-decoration-none' href='index.php'>Continue Shopping</a></button>";
                            array_push($total,0);
                        }
                        else{
                            echo " <div class='column-labels'>
                  <label class='product-image'>Image</label>
                  <label class='product-details'>Product</label>
                  <label class='product-price'>Price</label>
                  <label class='product-quantity'>Quantity</label>
                  <label class='product-quantity'>Remove from cart</label>
                  <label class='product-removal'>Remove</label>
                  <!--label class='product-line-price'>Total</label-->
              </div>";
                            $products_id = array_column($_SESSION['cart'],'product_id');
                            
                            foreach($products_id as $id){
                                $select = "select * from products where product_id = $id";
                                $stmt = $db->prepare($select);
                                $stmt->execute();
                                $product = $stmt->fetch();
                                array_push($total, $product['product_price']);
                                displayCartItems($product['product_image1'], $product['product_description'], $product['product_price'], $product['product_title'],$product['product_id']);
                            }
                            
                           if(isset($_POST['delete'])){

                             foreach($_POST['remove'] as $item){
                               foreach($_SESSION['cart'] as $key=>$value){
                                   if($value['product_id'] == $item){
                                       unset($_SESSION['cart'][$key]);
                                       //echo "<script>window.location='cart.php;</script>";
                                   }
                               }
                           }
                        }
                   
                                echo " <div class='mb-3 mx-auto'>
                                <button type='button' class='btn btn-info'><a class='text-light text-decoration-none' href='index.php'>Continue Shopping</a></button>
                                 
                                <button type='button' class='btn btn-success'><a class='text-light text-decoration-none' href='checkout.php'>Checkout</a></button>
                                      
                   
                            </div>'";
                            echo "<div class='product-removal w-100 d-flex justify-content-end'>
                            <input type='submit' value='Remove Checked Items' class='btn bg-danger mb-5 mx-4' name='delete'>
                        </div>";
                        }
                     ?>

                        <?php
                             /* $ip = getIPAddress();
                              if(isset($_POST['update'])){
                                  $quantity= $_POST['quantity'];

                                  $updateQuery="update `cart_details` set quantity=$quantity where ip_address='$ip' and product_id=$product_id";
                                  $updateStmt = $db->prepare($updateQuery);
                                  $updateStmt->execute();
                                  $total*=$quantity;
                              }*/
                            ?>
                            <!--div class="product-removal">
                                    <input type="checkbox" value="" name="remove[]" class="ms-5">

                                </div-->

                            <!--div class="product-removal">
                                    <input type="submit" value="Update" class="btn bg-info ms-5" name="update">

                                </div-->
                            <!--div class="product-line-price">25.98</div-->
            </div>

            
         
           
            <div class="totals mb-5">
                <div class="totals-item me-5 mb-3">
                    <label>Subtotal</label>
                    <div class="totals-value" id="cart-subtotal">
                        <?php echo array_sum($total); ?> MAD</div>
                </div>


            </div>
            </form>
            <!--div class="my-3 mx-auto">
                    <a href="index.php">
                        <button class="btn bg-info px-3 py-2 border-0 text-light">Back To Shop</button>
                    </a>
                    <a href="#">
                        <button class="btn bg-success px-3 py-2 border-0 text-light">Check out</button>
                    </a>

                </div-->
        </div>


        <script type="text/javascript" src="./customScripts/cartScript.js"></script>
        <?php include_once("./layout/head.php") ?>
    </body>

    </html>