<?php
$productId = $_GET['edit'];
$selectProduct = "select * from`products` where product_id = $productId";
$productStmt = $db->prepare($selectProduct);
$productStmt->execute();
$uniqueProduct = $productStmt->fetch();
$uniqueTitle = $uniqueProduct['product_title'];
$uniqueDescription = $uniqueProduct['product_description'];
$uniqueKeywords = $uniqueProduct['product_keywords'];
$uniquePrice = $uniqueProduct['product_price'];
$uniqueImage1 = $uniqueProduct['product_image1'];
$uniqueImage2 = $uniqueProduct['product_image2'];
$uniqueImage3 = $uniqueProduct['product_image3'];


if(isset($_POST['updateProduct'])){
    if($_FILES['image1']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage2 = $_FILES['image2']['name'];
        $newImage3 = $_FILES['image3']['name'];
        $newImage2tmp = $_FILES['image2']['tmp_name'];
        $newImage3tmp = $_FILES['image3']['tmp_name'];
        move_uploaded_file($newImage2tmp,"./productsImages/$newImage2");
        move_uploaded_file($newImage3tmp,"./productsImages/$newImage3");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image2 = '$newImage2',
                     product_image3 = '$newImage3' where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else if($_FILES['image2']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage1 = $_FILES['image1']['name'];
        $newImage3 = $_FILES['image3']['name'];
        $newImage1tmp = $_FILES['image1']['tmp_name'];
        $newImage3tmp = $_FILES['image3']['tmp_name'];
        move_uploaded_file($newImage1tmp,"./productsImages/$newImage1");
        move_uploaded_file($newImage3tmp,"./productsImages/$newImage3");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image1 = '$newImage1',
                     product_image3 = '$newImage3' where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else if($_FILES['image3']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage2 = $_FILES['image2']['name'];
        $newImage1 = $_FILES['image1']['name'];
        $newImage2tmp = $_FILES['image2']['tmp_name'];
        $newImage1tmp = $_FILES['image1']['tmp_name'];
        move_uploaded_file($newImage2tmp,"./productsImages/$newImage2");
        move_uploaded_file($newImage1tmp,"./productsImages/$newImage1");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image2 = '$newImage2',
                     product_image1 = '$newImage1' where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else if($_FILES['image1']['name']=="" && !$_FILES['image2']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage3 = $_FILES['image3']['name'];
        $newImage3tmp = $_FILES['image3']['tmp_name'];
        move_uploaded_file($newImage3tmp,"./productsImages/$newImage3");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image3 = '$newImage3',
                     where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else if($_FILES['image2']['name']=="" && $_FILES['image3']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage1 = $_FILES['image1']['name'];
        $newImage1tmp = $_FILES['image1']['tmp_name'];
        move_uploaded_file($newImage1tmp,"./productsImages/$newImage1");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image1 = '$newImage1',
                     where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else if($_FILES['image1']['name']=="" && $_FILES['image3']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage2 = $_FILES['image2']['name'];
        $newImage2tmp = $_FILES['image2']['tmp_name'];
        move_uploaded_file($newImage2tmp,"./productsImages/$newImage2");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image2 = '$newImage2',
                     where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else if($_FILES['image1']['name']=="" && !$_FILES['image3']['name']=="" && $_FILES['image2']['name']==""){
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice'
                     where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }else{
        $newTitle = htmlspecialchars($_POST['product_title']);
        $newDescription = htmlspecialchars($_POST['description']);
        $newKeywords = htmlspecialchars($_POST['keywords']);
        $newPrice = htmlspecialchars($_POST['price']);
        $newImage1 = $_FILES['image1']['name'];
        $newImage2 = $_FILES['image2']['name'];
        $newImage3 = $_FILES['image3']['name'];
        $newImage1tmp = $_FILES['image1']['tmp_name'];
        $newImage2tmp = $_FILES['image2']['tmp_name'];
        $newImage3tmp = $_FILES['image3']['tmp_name'];
        move_uploaded_file($newImage2tmp,"./productsImages/$newImage2");
        move_uploaded_file($newImage1tmp,"./productsImages/$newImage1");
        move_uploaded_file($newImage3tmp,"./productsImages/$newImage3");
        $updating = "update `products` set product_title = '$newTitle', product_description = '$newDescription', 
                     product_keywords = '$newKeywords', product_price = '$newPrice', product_image2 = '$newImage2',
                     product_image1 = '$newImage1', product_image3 = '$newImage3' where product_id = $productId";
        $updatingStmt = $db->prepare($updating);
        if($updatingStmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Product updated successfully!
          </div>";
        }
    }
}

?>

<body class="bg-light m-0">
    <div class="container mt-3">
        <h1 class="text-center mb-2">Edit Product</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--Title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $uniqueTitle; ?>" autocomplete="off" required>
            </div>
            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" value="<?php echo $uniqueDescription; ?>" autocomplete="off" required>
            </div>
             <!--keywords-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" value="<?php echo $uniqueKeywords; ?>" autocomplete="off"  required>
            </div>
            <!--Gender-->
             
             <!--Image 1-->
             <div class="form-outline mb-4 w-50 m-auto d-flex">
                <label for="image1" class="form-label">Product image 1</label>
                <input type="file" name="image1" id="image1" class="form-control"  accept="image/png,image/jpeg,image/jpg">
                <img src="./productsImages/<?php echo $uniqueImage1 ;?>" class="productImage" >
            </div>
            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto d-flex">
                <label for="image2" class="form-label">Product image 2</label>
                <input type="file" name="image2" id="image2" class="form-control"  accept="image/png,image/jpeg,image/jpg">
                <img src="./productsImages/<?php echo $uniqueImage2 ;?>" class="productImage" >
            </div>
             <!--Image 3-->
             <div class="form-outline mb-4 w-50 m-auto d-flex">
                <label for="image3" class="form-label">Product image 2</label>
                <input type="file" name="image3" id="image3" class="form-control"  accept="image/png,image/jpeg,image/jpg">
                <img src="./productsImages/<?php echo $uniqueImage3 ;?>" class="productImage" >
            </div>
            <!--Price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product price</label>
                <input type="text" name="price" id="price" class="form-control mb-2 px-2" value="<?php echo $uniquePrice; ?>" autocomplete="off" required>
            </div>
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="updateProduct" value="Save Changes" class="btn btn-info">
            </div>
        </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
    
</body>