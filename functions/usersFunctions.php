<?php
function get_user_pending_orders(){
    global $db;
    global $uId;
    /*$username = $_SESSION['username'];
    $getUser = "select * from `users` where username = '$username'";
    $userStmt = $db->prepare($getUser);
    $userStmt->execute();
    $currentUser = $userStmt->fetch();
    $userId = $currentUser['user_id'];*/
    $status = 'pending';
    $getPendingOrder = "select * from `orders` where user_id = $uId and order_status = 'pending'";
    $orderStmt = $db->prepare($getPendingOrder);
    $orderStmt->execute();
    $orderCount = $orderStmt->rowCount();
    if(!isset($_GET['myOrders']) && !isset($_GET['editProfile'])&&!isset($_GET['deleteProfile'])){
        if($orderCount>0){
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$orderCount</span> pending orders.</h3>
                   <p class='text-center text-dark'><a href='user_dashboard.php?myOrders' class='text-dark'>Check Orders Details</a></p>";
        }
        else{
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have No pending orders.</h3>
                   <p class='text-center '><a href='../index.php' class='text-dark'>Check Orders Details</a></p>";
       
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
                echo "<a href='../index.php?brand=$id'>$title</a>";
                
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
      //echo "<li class='nav-item bg-light'>$genderTitle</li>";
      echo "<div class='dropdown'>
      <button class='dropbtn nav-link'>For $genderTitle</button>
      <div class='dropdown-content'>";
     foreach($categories as $category){
      $catetitle = $category['categorie_title'];
      $cateid = $category['categorie_id'];
      
     
      echo "<a href = '../index.php?categorie=$cateid&gender=$genderId' class='nav-link'>$catetitle</a>";
      
    }
    echo "</div>
    </div>";
  }
}
function searchProducts(){
  global $db;
  if(isset($_GET['search_data_product'])){
      if(isset($_GET['search_data'])){
   $search_query = $_GET['search_data_product'];
  $selectSmt = "select * from `products` where  LOWER(product_keywords) like LOWER('%$search_query%')";
  $stmt = $db->prepare($selectSmt);
  $stmt->execute();
  $numOfRows = $stmt->rowCount();
  if ($numOfRows == 0) {
      echo "<h2 class='text-center text-danger'>No results Match!</h2>";
  }else{
    echo "<h2 class='text-center my-5'>Results For: $search_query</h2>";
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
}


?>