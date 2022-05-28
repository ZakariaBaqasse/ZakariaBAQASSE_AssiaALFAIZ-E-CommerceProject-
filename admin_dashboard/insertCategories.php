<?php
 include_once('../includes/connectDatabase.php');
 if(isset($_POST['insert-categ'])){
  // if(isset($_POST['categ-title']) && isset($_POST['categorie_gender']) ){
    if(!empty($_POST['categ-title']) && !empty($_POST['categorie_gender']) ){
      $categorie_title = htmlspecialchars($_POST['categ-title']);
      $gender_id = $_POST['categorie_gender'];
      try{
      $selectSmt = $db->prepare("SELECT * FROM `categories` WHERE categorie_title = '$categorie_title' and gender_id=$gender_id");
      $selectSmt->execute();
      $title = $selectSmt->fetchColumn();
      if($title>0){
        echo "Categorie already exists in database";
      }
      else{
      $stmt = $db->prepare("INSERT INTO `categories` (categorie_title,gender_id) values ('$categorie_title',$gender_id)");
      if($stmt->execute()){
        echo '<p class="successInsert">Category has been inserted successfully</p>';
      }
    }
    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }
  }
    else{
      echo "Title cannot and/or gender cannot be empty";
    }
    }
    
 
?>
<h2 class="text-center mt-1">Insert Category</h2>
<form action="" method="POST" class="mb-3 mt-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert Categorie name" aria-label="Categories" aria-describedby="basic-addon1" name="categ-title">
</div>
<div class="form-outline mb-2 w-90 m-auto">
                 <select name="categorie_gender" id="" class="form-select">
                     <option value="">Select a Gender</option>
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
<div class="input-group w-10 mb-2">
  <input type="submit" class="bg-info border-0 p-2 my-3" value = "Insert Categorie"aria-label="Username" aria-describedby="basic-addon1" name="insert-categ">
  
</div>
</form>