<?php
$brandId = $_GET['editBrand'];
$searchBrand = "select * from `brands` where brand_id = $brandId";
$searchBrandStmt = $db->prepare($searchBrand);
$searchBrandStmt->execute();
$uniqueBrand = $searchBrandStmt->fetch();
$brandTitle = $uniqueBrand['brand_title'];

if(isset($_POST['updateBrand'])){
    $brandTitle = htmlspecialchars($_POST['brandTitle']);
    $updateBrand = "update `brands` set brand_title = '$brandTitle' where brand_id = $brandId";
    $updateBr = $db->prepare($updateBrand);
    if($updateBr->execute()){
        echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        Brand updated successfully!
        </div>";
    }
}

?>

<body class="bg-light m-0">
    <div class="container mt-3">
        <h1 class="text-center mb-2">Edit Brand</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--Title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="brandTitle" class="form-label">Brand Title</label>
                <input type="text" name="brandTitle" id="brandTitle" class="form-control" value="<?php echo $brandTitle; ?>" autocomplete="off" required>
</div>
             
            
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="updateBrand" value="Save Changes" class="btn btn-info">
            </div>
        </form>
    </div>
    <script type="text/javascript" src="script.js"></script>
    
</body>