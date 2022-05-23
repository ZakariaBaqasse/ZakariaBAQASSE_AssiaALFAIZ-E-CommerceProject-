<?php
 include_once('../includes/connectDatabase.php');
 if(isset($_POST['insert-brand'])){
    if(!empty($_POST['brand-title'])){
      $brand_title = htmlspecialchars($_POST['brand-title']);
      try{
      $selectSmt = $db->prepare("SELECT * FROM `brands` WHERE brand_title = '$brand_title'");
      $selectSmt->execute();
      $title = $selectSmt->fetchColumn();
      if($title>0){
        echo "Brand already exists in database";
      }
      else{
      $stmt = $db->prepare("INSERT INTO `brands` (brand_title) values ('$brand_title')");
      if($stmt->execute()){
        echo '<p class="successInsert">Brand has been inserted successfully</p>';
      }
    }
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }
    }
    else{
      echo "Title cannot be empty";
    }
 }
?>
<h2 class="text-center mt-1">Insert Brand</h2>
<form action="" method="POST" class="mb-3 mt-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert Brand name" aria-label="Brands" aria-describedby="basic-addon1" name="brand-title">
</div>
<div class="input-group w-10 mb-2">
  <input type="submit" class="bg-info p-2 my-3 border-0" value = "Insert Brand"aria-label="Username" aria-describedby="basic-addon1" name="insert-brand">
  
</div>
</form>