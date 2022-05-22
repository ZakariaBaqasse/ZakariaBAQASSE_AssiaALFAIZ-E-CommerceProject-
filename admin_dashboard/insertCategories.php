<?php
 include_once('../includes/connectDatabase.php');
 if(isset($_POST['insert-categ'])){
    if(!empty($_POST['categ-title'])){
      $categorie_title = htmlspecialchars($_POST['categ-title']);
      try{
      $selectSmt = $db->prepare("SELECT * FROM `categories` WHERE categorie_title = '$categorie_title'");
      $selectSmt->execute();
      $title = $selectSmt->fetchColumn();
      if($title>0){
        echo "Categorie already exists in database";
      }
      else{
      $stmt = $db->prepare("INSERT INTO `categories` (categorie_title) values ('$categorie_title')");
      if($stmt->execute()){
        echo '<p class="successInsert">Category has been inserted successfully</p>';
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

<form action="" method="POST" class="mb-3 mt-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert Categorie name" aria-label="Categories" aria-describedby="basic-addon1" name="categ-title">
</div>
<div class="input-group w-10 mb-2">
  <input type="submit" class="bg-info border-0 p-2 my-3" value = "Insert Categorie"aria-label="Username" aria-describedby="basic-addon1" name="insert-categ">
  
</div>
</form>