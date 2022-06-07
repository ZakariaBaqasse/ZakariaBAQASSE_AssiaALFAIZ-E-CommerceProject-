<body>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Category Id</th>
      <th scope="col">Category Title</th>
      <th scope="col">Gender</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $gettingCategories = "select * from `categories`";
      $gettingCatStmt = $db->prepare($gettingCategories);
      $gettingCatStmt->execute();
      $allCategories = $gettingCatStmt->fetchAll();
      $gender = '';
      foreach($allCategories as $oneCategory){
          $cId = $oneCategory['categorie_id'];
          $cTitle = $oneCategory['categorie_title'];
          $cgender = $oneCategory['gender_id'];
          if($cgender == 2){
              $gender = 'Women';
          }else{
            $gender = 'Men';
          }

          echo " <tr>
          <td>$cId</td>
          <td>$cTitle</td>
          <td>$gender</td>
          <td><a href='index.php?editCategory=$cId'><i class='fa-solid fa-pen-to-square'></i></a></td>
          </tr>";
      }
    ?>

   
  </tbody>
</table>

</body>