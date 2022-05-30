<?php
 include_once("./includes/connectDatabase.php");
 include_once("./functions/common_functions.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include_once("./layout/head.php"); ?>
        <title>Cart</title>
    </head>

    <body class="p-0">
        <?php
    include_once('./layout/navbar.php');
    ?>
            <h1>Shopping Cart</h1>

            <div class="shopping-cart mx-3">
                <form action="" method="post">
                    <div class="column-labels">
                        <label class="product-image">Image</label>
                        <label class="product-details">Product</label>
                        <label class="product-price">Price</label>
                        <label class="product-quantity">Quantity</label>
                        <label class="product-quantity">Removal</label>
                        <label class="product-removal">Remove</label>
                        <!--label class="product-line-price">Total</label-->
                    </div>
                    <?php
              $ip = getIPAddress();
              
              $selectSmt = "select * from cart_details join products on products.product_id = cart_details.product_id where cart_details.ip_address='$ip'";
              $stmt = $db->prepare($selectSmt);
              $stmt->execute();
              $Items = $stmt->fetchAll();
              $total = 0;
              foreach($Items as $Item){
                  $product_id = $Item['product_id'];
                  $product_price = $Item['product_price'];
                  $product_title = $Item['product_title'];
                  $product_image = $Item['product_image1'];
                  $product_description = $Item['product_description'];
                  $price = array($Item['product_price']);
                  $totalPrice = array_sum($price);
                  $total+=$totalPrice;
            ?>
                        <div class="product">
                            <div class="product-image">
                                <img src="./admin_dashboard/productsImages/<?php echo $product_image;?>">
                            </div>
                            <div class="product-details">
                                <div class="product-title">
                                    <?php echo $product_title; ?>
                                </div>
                                <p class="product-description">
                                    <?php echo $product_description; ?>.</p>
                            </div>
                            <div class="product-price">
                                <?php echo $product_price; ?> MAD</div>
                            <div class="product-quantity">
                                <input type="number" value="1" min="1" name="quantity">
                            </div>
                            <?php
                              $ip = getIPAddress();
                              if(isset($_POST['update'])){
                                  $quantity= $_POST['quantity'];
                                  $updateQuery="update `cart_details` set quantity=$quantity where ip_address='$ip'";
                                  $updateStmt = $db->prepare($updateQuery);
                                  $updateStmt->execute();
                                  $total*=$quantity;
                              }
                            ?>
                            <div class="product-removal">
                                <input type="checkbox" value="<?php echo $product_id; ?>"  name="remove[]">
                            
                            </div>

                            <div class="product-removal">
                                <input type="submit" value="Update" class="btn bg-info" name="update">
                            
                            </div>
                            <!--div class="product-line-price">25.98</div-->
                        </div>
                        <?php
              }
         ?>             <div class="product-removal">
         <input type="submit" value="Remove" class="btn bg-danger" name="delete">
     </div>
     <?php
       if(isset($_POST['delete'])){
           foreach($_POST['remove'] as $remove_id){
           $deleteItem = "delete from `cart_details` where product_id = $remove_id";
           $delteStmt = $db->prepare($deleteItem);
           if($delteStmt->execute()){
               echo "<script>window.open('cart.php','_self');</script>";
           }
        }
       }
     ?>

                            <div class="totals">
                                <div class="totals-item">
                                    <label>Subtotal</label>
                                    <div class="totals-value" id="cart-subtotal">
                                        <?php echo $total; ?> MAD</div>
                                </div>


                            </div>
                            </form>
                            <div class="mb-3 mx-auto">
                                <a href="index.php">
                                    <button class="btn bg-info px-3 py-2 border-0 text-light">Back To Shop</button>
                                </a>
                                <a href="#">
                                    <button class="btn bg-success px-3 py-2 border-0 text-light">Check out</button>
                                </a>

                            </div>
            </div>
            

            <script type="text/javascript" src="./customScripts/cartScript.js"></script>
            <?php include_once("./layout/head.php") ?>
    </body>

    </html>