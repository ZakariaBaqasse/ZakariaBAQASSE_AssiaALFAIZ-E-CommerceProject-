<body>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">UserName</th>
      <th scope="col">User Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $gettingUsers = "select * from `users`";
      $gettingUsersStmt = $db->prepare($gettingUsers);
      $gettingUsersStmt->execute();
      $allUsers = $gettingUsersStmt->fetchAll();
     
      foreach($allUsers as $oneUser){
          $userId = $oneUser['user_id'];
          $userName = $oneUser['username'];
          $userEmail = $oneUser['email'];
         

          echo " <tr>
          <td>$userId</td>
          <td>$userName</td>
          <td>$userEmail</td>
          </tr>";
      }
    ?>

   
  </tbody>
</table>

</body>