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
           <a href='displayAll.php?addCart=$id' class='btn btn-info'>Add to cart</a>
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
           <a href='index.php?categorie=$category&gender=$gender&addCart=$id' class='btn btn-info'>Add to cart</a>
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
           <a href='index.php?brand=$brand&addCart=$id' class='btn btn-info'>Add to cart</a>
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
      echo "<!--CONTAINER-->
      <div class=\"product_container\">
      <div class=\"sidebar product_slides slide_border mb-4\">
      <img src='./admin_dashboard/productsImages/$image1' class=\"product_slides-item slide_images slide_option slide_image_color inline-photo2 show-on-scroll2\" onclick=\"changeSlide(event,'Slide1')\">
      <img src='./admin_dashboard/productsImages/$image2' class=\"product_slides-item slide_images slide_option inline-photo2 show-on-scroll2\" onclick=\"changeSlide(event,'Slide2')\">
      <img src='./admin_dashboard/productsImages/$image3' class=\"product_slides-item slide_images slide_option inline-photo2 show-on-scroll2\" onclick=\"changeSlide(event,'Slide3')\">
      </div>
      
      
      <div id=\"Slide1\" class=\"Slider_Container SLider_border Product_tumbnail animate\">
      <img src='./admin_dashboard/productsImages/$image1'>
      </div>
      
      <div id=\"Slide2\" class=\"Slider_Container SLider_border Product_tumbnail animate\" style=\"display:none\">
      <img src='./admin_dashboard/productsImages/$image2'>
      </div>
      
      <div id=\"Slide3\" class=\"Slider_Container SLider_border Product_tumbnail animate\" style=\"display:none\">
      <img src='./admin_dashboard/productsImages/$image3'>
      </div>
      <div class=\"details\">
      <h1 class=\"title\">$title</h1>
      <span class=\"price\">$price MAD</span>
      <div class=\"star-ratings-css\">
      <div class=\"star-ratings-css-top\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
      <div class=\"star-ratings-css-bottom\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
      </div>
      <p>$description</p>
      <ul class=\"sub-details\">
      <li><i class=\"fa fa-shield\"></i> Secured Payment</li>
      <li><i class=\"fa fa-truck\"></i> Delivered in 2-5 working days</li>
      </ul>
      <table>
      <tr>
      <td><label for=\"pincode\">Check Availability</label></td>
      </tr>
      <tr>
      <td><input type=\"tel\" name=\"pincode\" id=\"pincode\" placeholder=\"Pincode\"></td><td><button class=\"btn1\" type=\"submit\">CHECK</button></td>
      </tr>
      <tr>
      <td><button class=\"btn2\" href='productDetails.php?addCart=$id&product_id=$id'>ADD TO CART</button></td>
      </tr>
      </table>
      
      </div>
      </div>
      
      <div class=\"reviews inline-photo show-on-scroll\">
      <div class=\"review_sidebar review_bar_block review_gray review_card\"><center>
      <button class=\"review-bar-item review-button tablink btn4 active_button\" onclick=\"opentab_type(event, 'Description')\">Description</button>
      <button class=\"review-bar-item review-button tablink btn4\" onclick=\"opentab_type(event, 'Specification')\">Specification</button>
      <button class=\"review-bar-item review-button tablink btn4\" onclick=\"opentab_type(event, 'User_reviews')\">Reviews</button>
      </center></div>
      
      <div>
      
      <div id=\"Description\" class=\"review_container tab_type\">
      <h2>Description</h2>
      <p>$description</p>
      </div>
      
      <div id=\"Specification\" class=\"review_container tab_type\" style=\"display:none\">
      <h2>Specification</h2>
      <table class=\"specification_table\">
      <tr>
      <td>Dimension</td>
      <td>24cm</td>
      </tr>
      <tr>
      <td>Material</td>
      <td>Stainless Steel</td>
      </tr>
      <tr>
      <td>Warrenty</td>
      <td>1 Year</td>
      </tr>
      <tr>
      <td>Waterproof</td>
      <td>Yes</td>
      </tr>
      <tr>
      <td>Return</td>
      <td>No</td>
      </tr>
      </table>
      </div>
      
      <div id=\"User_reviews\" class=\"review_container tab_type\" style=\"display:none\">
      <div class=\"user_star_ratings\">
      <section class=\"overall_rating\">
      <span class=\"sub-title\">OVERALL RATING</span>
      <span class=\"title\">4.0</span>
      <p>(123 Reviews)</p>
      </section>
      <section class=\"rating_blocks\">
      <span class=\"sub-title\">BASED ON 123 REVIEWS</span>  
      <ul>
      <li>
      5 Star
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      23
      </li>
      <li>
      4 Star
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      40
      </li>
      <li>
      3 Star
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      35
      </li>
      <li>
      2 Star
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      10
      </li>
      <li>
      1 Star
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      15
      </li>
      </ul>  
      </section>
      <section class=\"reviews_recorded\">
      <ul>
      <li>
      <img src=\"https://source.unsplash.com/50x50/?person\" alt=\"User\"> <b>Albert</b>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </li>
      <li>
      <img src=\"https://source.unsplash.com/50x50/?person\" alt=\"User\"> <b>Albert</b>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span>
      <span class=\"fa fa-star checked\"></span> 
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </li>
      </ul>
      <center><button class=\"btn1\" style=\"width:150px;\">Load More...</button></center>
      </section>
      </div>
      <div class=\"enter_user_star_ratings\">
      <h1 class=\"title\">ADD YOUR REVIEW</h1>
      <div class=\"rating-box\">
      <div class=\"rating-container\">
      <input type=\"radio\" name=\"rating\" value=\"5\" id=\"star-5\"> <label for=\"star-5\">&#9733;</label>
      
      <input type=\"radio\" name=\"rating\" value=\"4\" id=\"star-4\"> <label for=\"star-4\">&#9733;</label>
      
      <input type=\"radio\" name=\"rating\" value=\"3\" id=\"star-3\"> <label for=\"star-3\">&#9733;</label>
      
      <input type=\"radio\" name=\"rating\" value=\"2\" id=\"star-2\"> <label for=\"star-2\">&#9733;</label>
      
      <input type=\"radio\" name=\"rating\" value=\"1\" id=\"star-1\"> <label for=\"star-1\">&#9733;</label>
      </div>
      </div>
      <textarea placeholder=\"Write a review\" name=\"userreview\" required></textarea>
      <button class=\"btn2\">SUBMIT</button>
      </div>
      </div>
      
      </div>
      </div>";
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
  session_start();
  global $db;
  if(isset($_GET['addCart'])){
    if(isset($_SESSION['cart'])){
      $arrayOfItemsId=array_column($_SESSION['cart'],"product_id");
      
      if(in_array($_GET['addCart'],$arrayOfItemsId)){
        echo "<div class='alert alert-warning w-70 text-center' role='alert'>
        Product already added to cart!
      </div>";
      }else{
        //return number of ids in cart session
        $numOfItems = count($_SESSION['cart']);
        $itemsarray = array('product_id' => $_GET['addCart']);
        $_SESSION['cart'][$numOfItems]=$itemsarray;
        echo "<div class='alert alert-success w-70 text-center' role='alert'>
        Product added to cart successfully!
      </div>";
      }
    }else{
      $itemsarray = array('product_id' => $_GET['addCart']);
        $_SESSION['cart'][0]=$itemsarray;
        echo "<div class='alert alert-success w-70 text-center' role='alert'>
        Product added to cart successfully!
      </div>";
    }
}
}

function displayCartItems($product_image, $product_description, $product_price, $product_title,$product_id){
   $element = "
   <div class='product'>
   <div class='product-image'>
       <img src='./admin_dashboard/productsImages/$product_image'>
   </div>
   <div class='product-details'>
       <div class='product-title'>
           $product_title
       </div>
       <p class='product-description'>
           $product_description</p>
   </div>
   <div class='product-price'>
       $product_price MAD</div>
   <div class='product-quantity'>
       <input type='number' value='0' min='0' name='quantity'>
   </div>
   <input type='checkbox' value='$product_id' class='btn bg-danger mt-3 mx-4' name='remove[]'>
   </div>";
   

   echo $element;
}


?>