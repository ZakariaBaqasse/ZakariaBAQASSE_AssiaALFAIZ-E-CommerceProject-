<?php
include_once('../includes/connectDatabase.php');
$keywordsRegex = "/[a-zA-Z0-9]{2,}(?:,)?/";
if(isset($_POST['insert_product'])){
    $product_title = htmlspecialchars($_POST['product_title']);
    $description = htmlspecialchars($_POST['description']); 
    $keywords = htmlspecialchars($_POST['keywords']);
    $product_categories = htmlspecialchars($_POST['product_categories']);
    $product_brands = htmlspecialchars($_POST['product_brands']);
    $price = htmlspecialchars($_POST['price']);
    $status = 'true';
    $gender = $_POST['product_gender'];
    //accessing image names
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    //accessing image temp names
    $temp_image1 = $_FILES['image1']['tmp_name'];
    $temp_image2 = $_FILES['image2']['tmp_name'];
    $temp_image3 = $_FILES['image3']['tmp_name'];
    if($product_categories == '' || $product_brands == ''|| $gender == '' ){
        echo ("Please fill all the fields");
        exit();
    }else{
        move_uploaded_file($temp_image1,"./productsImages/$image1");
        move_uploaded_file($temp_image2,"./productsImages/$image2");
        move_uploaded_file($temp_image3,"./productsImages/$image3");
        $insertProductQuery = "insert into `products` 
                               (product_title,product_description,product_keywords,categorie_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status,gender_id) 
                               values ('$product_title','$description','$keywords','$product_categories','$product_brands','$image1','$image2','$image3',$price,NOW(),$status,$gender)";
        $Stmt = $db->prepare($insertProductQuery);
        if($Stmt->execute()){
            echo "Product inserted successfully";
        }
    }

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="../images/online solution.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center mb-2">Insert New Product</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--Title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
            </div>
            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required>
            </div>
             <!--keywords-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required>
            </div>
            <!--Gender-->
            <div class="form-outline mb-4 w-50 m-auto">
                 <select name="product_gender" id="category_gender" class="form-select">
                     <option value="">Select a gender</option>
                     <?php
                        $SelectStmt = $db->prepare('SELECT * FROM `gender`');
                        $SelectStmt->execute();
                        $genders = $SelectStmt->fetchAll();
                        foreach($genders as $gender){
                           $title = $gender['gender'];
                            $id = $gender['gender_id'];
                            echo "<option value='$id'>$title</option>";
                
                        }
                     ?>
                 </select>
             </div>
             <!--categories-->
             <div class="form-outline mb-4 w-50 m-auto" >
                 <select name="product_categories" class="form-select" id="category_select">
                     <option value="">Select a category</option>
                     <?php
                        /*$SelectStmt = $db->prepare('SELECT * FROM `categories`');
                        $SelectStmt->execute();
                        $categories = $SelectStmt->fetchAll();
                        foreach($categories as $category){
                           $title = $category['categorie_title'];
                            $id = $category['categorie_id'];
                            echo "<option value='$id'>$title</option>";
                
                        }*/
                     ?>
                 </select>
             </div>
             
              <!--brands-->
              <div class="form-outline mb-4 w-50 m-auto">
                 <select name="product_brands" id="" class="form-select">
                     <option value="">Select a brand</option>
                     <?php
                        $SelectStmt = $db->prepare('SELECT * FROM `brands`');
                        $SelectStmt->execute();
                        $brands = $SelectStmt->fetchAll();
                        foreach($brands as $brand){
                           $title = $brand['brand_title'];
                            $id = $brand['brand_id'];
                            echo "<option value='$id'>$title</option>";
                
                        }
                     ?>
                 </select>
             </div>
             <!--Image 1-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="image1" class="form-label">Product image 1</label>
                <input type="file" name="image1" id="image1" class="form-control" required  accept="image/png,image/jpeg,image/jpg">
            </div>
            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image2" class="form-label">Product image 2</label>
                <input type="file" name="image2" id="image2" class="form-control" required  accept="image/png,image/jpeg,image/jpg">
            </div>
             <!--Image 3-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="image3" class="form-label">Product image 2</label>
                <input type="file" name="image3" id="image3" class="form-control" required  accept="image/png,image/jpeg,image/jpg">
            </div>
            <!--Price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product price</label>
                <input type="text" name="price" id="price" class="form-control mb-2 px-2" placeholder="Enter Product price" autocomplete="off" required>
            </div>
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" value="Insert Product" class="btn btn-info">
            </div>
        </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>