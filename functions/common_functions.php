<?php
include_once('./includes/connectDatabase.php');






//displaying products
function getProducts(){
    global $db;
    if(!isset($_GET['categorie']) && !isset($_GET['gender'])){
     if(!isset($_GET['brand']) && !isset($_GET['search_data_product'])){
    $selectSmt = "select * from `products` order by rand() limit 0,4";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $products = $stmt->fetchAll();
   
    foreach ($products as $product){
        $id = $product['product_id'];
      $title = $product['product_title'];
      $description = $product['product_description'];
      $image = $product['product_image1'];
      $price = $product['product_price'];
      echo"
 
     <div class='col-md-4 mb-2'>
       <div class='card'>
         <img src='./admin_dashboard/productsImages/$image' class='card-img-top'  alt='...'>
         <div class='card-body'>
           <h5 class='card-title'>$title</h5>
           <p class='card-text'>$description</p>
           <p class='card-text'>Price: $price MAD</p>
           <a href='index.php?addCart=$id' class='btn btn-info'>Add to cart</a>
           <a href='productDetails.php?product_id=$id' class='btn btn-secondary'>View More</a>
         </div>
       </div>
     </div>
   
 <!--row --> 
 ";
    }
}
}
}

//displaying all products

function displayAllProducts() {
    global $db;
    if(!isset($_GET['categorie']) && !isset($_GET['gender'])){
     if(!isset($_GET['brand']) && !isset($_GET['search_data_product'])){
    $selectSmt = "select * from `products` order by rand() ";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $products = $stmt->fetchAll();
    foreach ($products as $product){
        $id = $product['product_id'];
      $title = $product['product_title'];
      $description = $product['product_description'];
      $image = $product['product_image1'];
      $price = $product['product_price'];
      echo"
 
     <div class='col-md-4 mb-2'>
       <div class='card'>
         <img src='./admin_dashboard/productsImages/$image' class='card-img-top'  alt='...'>
         <div class='card-body'>
           <h5 class='card-title'>$title</h5>
           <p class='card-text'>$description</p>
           <p class='card-text'>Price: $price MAD</p>
           <a href='index.php?addCart=$id' class='btn btn-info'>Add to cart</a>
           <a href='productDetails.php?product_id=$id' class='btn btn-secondary'>View More</a>
        
         </div>
       </div>
     </div>
   
 <!--row --> 
 ";
    }
}
}
}


//displaying products by category

function getUniqueCategory(){
    global $db;
    if(isset($_GET['categorie']) && isset($_GET['gender'])){
     $category = $_GET['categorie'];
     $gender = $_GET['gender'];
    $selectSmt = "select * from `products` where categorie_id = $category and gender_id = $gender ";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $numOfRows = $stmt->rowCount();
    
   
    if ($numOfRows == 0) {
        echo "<h2 class='text-center text-danger'>Category out of Stock</h2>";
    }
    $products = $stmt->fetchAll();
    foreach ($products as $product){
        $id = $product['product_id'];
      $title = $product['product_title'];
      $description = $product['product_description'];
      $image = $product['product_image1'];
      $price = $product['product_price'];
      echo"
 
     <div class='col-md-4 mb-2'>
       <div class='card'>
         <img src='./admin_dashboard/productsImages/$image' class='card-img-top'  alt='...'>
         <div class='card-body'>
           <h5 class='card-title'>$title</h5>
           <p class='card-text'>$description</p>
           <p class='card-text'>Price: $price MAD</p>
           <a href='index.php?addCart=$id' class='btn btn-info'>Add to cart</a>
           <a href='productDetails.php?product_id=$id' class='btn btn-secondary'>View More</a>
        </div>
       </div>
     </div>
   
 <!--row --> 
 ";
    }
}
}



//displaying products by brand

function getUniqueBrand(){
    global $db;
    if(isset($_GET['brand'])){
     $brand = $_GET['brand'];
    $selectSmt = "select * from `products` where brand_id = $brand";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $numOfRows = $stmt->rowCount();
    
   
    if ($numOfRows == 0) {
        echo "<h2 class='text-center text-danger'>Brand out of Stock</h2>";
    }
    $products = $stmt->fetchAll();
    foreach ($products as $product){
        $id = $product['product_id'];
      $title = $product['product_title'];
      $description = $product['product_description'];
      $image = $product['product_image1'];
      $price = $product['product_price'];
      echo"
 
     <div class='col-md-4 mb-2'>
       <div class='card'>
         <img src='./admin_dashboard/productsImages/$image' class='card-img-top'  alt='...'>
         <div class='card-body'>
           <h5 class='card-title'>$title</h5>
           <p class='card-text'>$description</p>
           <p class='card-text'>Price: $price MAD</p>
           <a href='index.php?addCart=$id' class='btn btn-info'>Add to cart</a>
           <a href='productDetails.php?product_id=$id' class='btn btn-secondary'>View More</a>
           </div>
       </div>
     </div>
   
 <!--row --> 
 ";
    }
}
}




//displaying brands
function getBrands(){
    global $db;
    $SelectStmt = $db->prepare('SELECT * FROM `brands`');
              $SelectStmt->execute();
              $brands = $SelectStmt->fetchAll();
              foreach($brands as $brand){
                $title = $brand['brand_title'];
                $id = $brand['brand_id'];
                echo "<li class='nav-item'><a href='index.php?brand=$id' class='nav-link text-light'>$title</a></li>";
                
              }
}

//displaying categories
function getCategories(){
    global $db;
    $genderStmt = $db -> prepare('SELECT * FROM `gender`');
              
    $genderStmt -> execute();
    
    $genders = $genderStmt ->fetchAll();
    foreach($genders as $gender) {
      
      $genderTitle = $gender['gender'];
      $genderId = $gender['gender_id'];
      $SelectStmt = $db->prepare("SELECT * FROM `categories` WHERE gender_id = $genderId");
      $SelectStmt->execute();
      $categories = $SelectStmt->fetchAll();
      echo "<li class='nav-item bg-light'>$genderTitle</li>";
     foreach($categories as $category){
      $catetitle = $category['categorie_title'];
      $cateid = $category['categorie_id'];
      
     
      echo "<li class='nav-item'><a href = 'index.php?categorie=$cateid&gender=$genderId' class='nav-link text-light'>$catetitle</a></li>";
      
    }
  }
}


//searching products
function searchProducts(){
    global $db;
    if(isset($_GET['search_data_product'])){
        if(isset($_GET['search_data'])){
     $search_query = $_GET['search_data'];
    $selectSmt = "select * from `products` where product_keywords like '%$search_query%'";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $numOfRows = $stmt->rowCount();
    if ($numOfRows == 0) {
        echo "<h2 class='text-center text-danger'>No results Match!</h2>";
    }
    $products = $stmt->fetchAll();
    foreach ($products as $product){
        $id = $product['product_id'];
      $title = $product['product_title'];
      $description = $product['product_description'];
      $image = $product['product_image1'];
      $price = $product['product_price'];
      echo"
 
     <div class='col-md-4 mb-2'>
       <div class='card'>
         <img src='./admin_dashboard/productsImages/$image' class='card-img-top'  alt='...'>
         <div class='card-body'>
           <h5 class='card-title'>$title</h5>
           <p class='card-text'>$description</p>
           <p class='card-text'>Price: $price MAD</p>
           <a href='index.php?addCart=$id' class='btn btn-info'>Add to cart</a>
           <a href='productDetails.php?product_id=$id' class='btn btn-secondary'>View More</a>
         </div>
       </div>
     </div>
   
 <!--row --> 
 ";
    }
}
}
}

//displaying products details
function displayDetails(){
    global $db;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['categorie']) && !isset($_GET['gender'])){
     if(!isset($_GET['brand']) && !isset($_GET['search_data_product'])){
         $product_id = $_GET['product_id'];
    $selectSmt = "select * from `products` where product_id = $product_id";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $products = $stmt->fetch();
   
    
        $id = $products['product_id'];
      $title = $products['product_title'];
      $description = $products['product_description'];
      $image1 = $products['product_image1'];
      $image2 = $products['product_image2'];
      $image3 = $products['product_image3'];
      $price = $products['product_price'];
      echo"
     <div class='col-md-4 mb-2'>
       <div class='card'>
         <img src='./admin_dashboard/productsImages/$image1' class='card-img-top'  alt='...'>
         <div class='card-body'>
           <h5 class='card-title'>$title</h5>
           <p class='card-text'>$description</p>
           <p class='card-text'>Price: $price MAD</p>
           <a href='index.php?addCart=$id' class='btn btn-info'>Add to cart</a>
           <a href='index.php' class='btn btn-secondary'>Go Home</a>
         </div>
       </div>
     </div>
     <div class='col-md-8'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h4 class='text-center text-info mb-5'>Related Images</h4>
                                </div>
                                <div class='col-md-6'>
                                <img src='./admin_dashboard/productsImages/$image2' class='card-img-top'  alt='...'>
         
                                </div>
                                <div class='col-md-6'>
                                <img src='./admin_dashboard/productsImages/$image3' class='card-img-top'  alt='...'>
         
                                </div>
                            </div>

                        </div>"
   ;
    }
}
}
}

//getting ip address
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 

//inserting cart items
function cart(){
  if(isset($_GET['addCart'])){
    global $db;
    $ip = getIPAddress();
    $product = $_GET['addCart'];
    $selectSmt = "select * from `cart_details` where product_id =$product and ip_address ='$ip'";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $result = $stmt->rowCount();
    if($result>0){
      echo "<div class='alert alert-warning w-70 text-center' role='alert'>
      Product already added to cart!
    </div>";
    
      //header('Location: '.$_SERVER['PHP_SELF']);
    }
    else{
      $insert = "insert into `cart_details`(product_id, ip_address,quantity) values($product,'$ip',0)";
      $insertStmt = $db->prepare($insert);
      $insertStmt->execute();
      echo "<div class='alert alert-success w-70 text-center' role='alert'>
      Product added to cart successfully!
    </div>";
      //header('Location: '.$_SERVER['PHP_SELF']);
    }
    
}
}

//displaying number of products in cart
/*function cartItemCount(){
  
    global $db;
    $ip = getIPAddress();
    
    $selectSmt = "select * from `cart_details` where ip_address ='$ip'";
    $stmt = $db->prepare($selectSmt);
    $stmt->execute();
    $itemsCount = $stmt->rowCount();
    echo $itemsCount;
    
}*/


?>