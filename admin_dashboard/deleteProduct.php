<?php
$deleteId = $_GET['delete'];
$fetching = "select * from `products` where product_id = $deleteId";
$fetchingStmt = $db->prepare($fetching);
$fetchingStmt->execute();
$productToDelete = $fetchingStmt->fetch();
$deleteTitle= $productToDelete['product_title'];
$deleteImage= $productToDelete['product_image1'];
$deletePrice= $productToDelete['product_price'];

if(isset($_POST['delete'])){
    $deleteQuery = "delete from `products` where product_id=$deleteId";
    $deleteStmt = $db->prepare($deleteQuery);
    if($deleteStmt->execute()){
        $_SESSION['deleteMessage']= "Product deleted successfully";
        echo "<script>window.open('index.php?viewProducts','_self');</script>";
    }
}
else if(isset($_POST['no'])){
    $_SESSION['deleteMessage']= "Product deletetion cancelled!";
    echo "<script>window.open('index.php?viewProducts','_self');</script>";
}

?>

<body>
  <h2 class="text-center text-danger">Are you sure you want to delete this product?</h2>
  <form action="" method="POST" class="mx-auto">
  <div class="text-center">
  <img src="./productsImages/<?php echo $deleteImage; ?> " class="deleteImage my-5">
  <h4 class="text-center mb-3"><?php echo $deleteTitle; ?></h4>
  <p class="mb-3">Price: <?php echo $deletePrice; ?> MAD</p>
  <input type='submit' value="Yes ! I'am sure " name='delete' class='btn bg-success'>
  <input type='submit' value="No ! Don't Delete" name='no' class='btn bg-danger'>
                      
  </div>
  </form>

</body>