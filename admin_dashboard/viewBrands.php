<body>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Brand Id</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $gettingBrands = "select * from `brands`";
      $gettingBrStmt = $db->prepare($gettingBrands);
      $gettingBrStmt->execute();
      $allBrands = $gettingBrStmt->fetchAll();
      $gender = '';
      foreach($allBrands as $oneBrand){
          $bId = $oneBrand['brand_id'];
          $bTitle = $oneBrand['brand_title'];
          
         

          echo " <tr>
          <td>$bId</td>
          <td>$bTitle</td>
          <td><a href='index.php?editBrand=$bId'><i class='fa-solid fa-pen-to-square'></i></a></td>   
          </tr>";
      }
    ?>

   
  </tbody>
</table>

</body>