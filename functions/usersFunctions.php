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


?>