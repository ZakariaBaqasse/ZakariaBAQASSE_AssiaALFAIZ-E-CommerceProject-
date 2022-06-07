<body>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product Title</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Price</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $gettingProducts = "select * from `products`";
      $gettingStmt = $db->prepare($gettingProducts);
      $gettingStmt->execute();
      $allProducts = $gettingStmt->fetchAll();
      foreach($allProducts as $oneProduct){
          $pId = $oneProduct['product_id'];
          $pTitle = $oneProduct['product_title'];
          $pImage = $oneProduct['product_image1'];
          $pPrice = $oneProduct['product_price'];

          echo " <tr>
          <td>$pId</td>
          <td>$pTitle</td>
          <td><img src='./productsImages/$pImage'class='productImage'></td>
          <td>$pPrice MAD</td>
          <td><a href='index.php?edit=$pId'><i class='fa-solid fa-pen-to-square'></i></a></td>
          <td><a href='index.php?delete=$pId'><i class='fa-solid fa-delete-left'></i></a></td>
        </tr>";
      }
    ?>

   
  </tbody>
</table>

</body>