<?php
$catId = $_GET['editCategory'];
$searchCategory = "select * from `categories` where categorie_id = $catId";
$searchStmt = $db->prepare($searchCategory);
$searchStmt->execute();
$uniqueCategory = $searchStmt->fetch();
$catTitle = $uniqueCategory['categorie_title'];

if(isset($_POST['updateCategory'])){
    $catTitle = htmlspecialchars($_POST['category_title']);
    $updateCategory = "update `categories` set categorie_title = '$catTitle' where categorie_id = $catId";
    $updateCat = $db->prepare($updateCategory);
    if($updateCat->execute()){
        echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        Category updated successfully!
        </div>";
    }
}

?>

<body class="bg-light m-0">
    <div class="container mt-3">
        <h1 class="text-center mb-2">Edit Category</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--Title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="category_title" class="form-label">Category Title</label>
                <input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $catTitle; ?>" autocomplete="off" required>
</div>
             
            
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="updateCategory" value="Save Changes" class="btn btn-info">
            </div>
        </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
    
</body>