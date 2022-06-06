<?php

  if(isset($_POST['update'])){
      if($_FILES['profile']==NULL){
         
          $newEmail = htmlspecialchars( $_POST['email']);
          $address = htmlspecialchars( $_POST['address'] );
          $newMobile = htmlspecialchars( $_POST['phone']);
          
          $updateProfile = "update `users` set email = '$newEmail', address = '$address', mobile = '$newMobile'
                            where user_id = $uId";
          $updateStmt = $db->prepare($updateProfile);
          if ($updateStmt->execute()) {
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
           Profile updated successfully
          </div>";
          }
        
      }else{
       
        $newEmail = htmlspecialchars( $_POST['email']);
        $address = htmlspecialchars( $_POST['address'] );
        $newMobile = htmlspecialchars( $_POST['phone']);
        $newProfile = $_FILES['profile']['name'];
        $newProfiletmp = $_FILES['profile']['tmp_name'];
        move_uploaded_file($newProfiletmp,"./usersProfile/$newProfile");
        $updateProfile = "update `users` set  email = '$newEmail', address = '$address', mobile = '$newMobile',profile_picture = '$newProfile'
        where user_id = $uId";
        $updateStmt = $db->prepare($updateProfile);
        if ($updateStmt->execute()) {
        echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        Profile updated successfully
        </div>";
        }
      }
  }

?>



<body>
<h3 class="text-center text-warning mt-5 mb-3">Edit Profile</h3>
<form action="" method="post" enctype="multipart/form-data" class="mb-5">
            <!--email-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Your new Email" autocomplete="off" required>
            </div>
             <!--address-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>"  placeholder="Enter Your new Address"  required>
            </div>
            
             <!--profile 1-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="profile" class="form-label">Profile Image</label>
                <input type="file" name="profile" id="profile" class="form-control"   accept="image/png image/jpeg image/jpg image/webp">
            </div>
            <!--phone-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="phone" class="form-label">Phone number</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $mobile; ?>" placeholder="Enter Your new phone number"  required>
            </div>
            
            <!--submit-->
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="update" value="Save Changes" class="btn btn-warning">
            </div>
        </form>


</body>