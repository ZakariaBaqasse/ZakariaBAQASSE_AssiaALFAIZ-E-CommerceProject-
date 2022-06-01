<?php
session_start();
 include_once("../includes/connectDatabase.php");
 //include_once("../functions/common_functions.php");
?>

<?php
if (isset($_POST['register'])){
    $username= htmlspecialchars($_POST['username']);
    $password= htmlspecialchars($_POST['password']);
    $confirm= htmlspecialchars($_POST['confirm']);
    $email= htmlspecialchars($_POST['email']);
    $address= htmlspecialchars($_POST['address']);
    $phone= htmlspecialchars($_POST['phoneNumber']);
    $profile = $_FILES['profile']['name'];
    $profileTmp = $_FILES['profile']['tmp_name'];
    if($confirm != $password){
        echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
        Password and confirm password not matched!
      </div>";
    }else if(!preg_match('/[0-9]{9,10}/',$phone)){
        echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
        Please provide a valid phone number!
      </div>";
    }else{
        $select1 ="select * from `users` where username = '$username'";
        $stmt = $db->prepare($select1);
        $stmt->execute();
        $result = $stmt->rowCount();

        $select2 ="select * from `users` where email = '$email'";
        $stmt = $db->prepare($select2);
        $stmt->execute();
        $result2 = $stmt->rowCount();
        if($result>0){
            echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
        Username already Taken.
      </div>";
        }else if($result2>0){
            echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
        Email already Taken.
      </div>";
        }else{

        move_uploaded_file($profileTmp,"./usersProfile/$profile");
        $insert = "insert into `users` (username,email,password,profile_picture,address,mobile) 
                  values('$username', '$email', '$password', '$profile', '$address', '$phone')";
        $stmt = $db->prepare($insert);
        if($stmt->execute()){
            echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        Account created successfully!
      </div>";
        }          
    }
}
}
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include_once("../layout/head.php"); ?>
        <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

<!-- fontawesome -->
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Mukta:300,400,500" rel="stylesheet">
        <title>Register</title>
    </head>

    <body class="p-0">
        <!--navbar-->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="./images/online solution.png" alt="Store Logo" class="imglogo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../displayAll.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <?php if(isset($_SESSION['cart']))$count = count($_SESSION['cart']);
              else $count = 0;?>
                                <a class="nav-link" href="cart.php">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <sup>
                                        <?php echo $count;?>
                                    </sup>
                                </a>
                                </sup>
                                </a>
                            </li>

                        </ul>
                        
                    </div>
                </div>
            </nav>
            <!--navbar-->
            <section class="main">
        <div class="bottom-grid">
            <div class="logo text-center">
                <h1> Sign Up</h1>
            </div>
        </div>
        <!-- register -->
        <div class="w3lhny-register">
            <div class="iconhny">
               <span class="fa fa-user-plus"></span>
             </div>
            <form action="" method="post" class="register-form" enctype="multipart/form-data">
                <fieldset>
                    <div class="form">
                        <div class="form-row">
                            <span class="fa fa-user"></span>
                           
                            <input type="text" class="form-text" placeholder="User name" required name="username" autocomplete="off">
                        </div>
                        <div class="form-row">
                            <span class="fa fa-envelope"></span>
                            
                            <input type="email" class="form-text" placeholder="Email Address" required name="email" autocomplete="off">
                        </div>
                        <div class="form-row">
                            <span class="fa fa-lock"></span>
                            
                            <input type="password" class="form-text" placeholder="Password" required name="password" autocomplete="off">
                        </div>
                        <div class="form-row">
                            <span class="fa fa-lock"></span>
                            
                            <input type="password" class="form-text" placeholder="Confirm Password" required name="confirm" autocomplete="off">
                        </div>
                        <div class="form-row">
                            <span class="fa fa-phone"></span>
                            
                            <input type="text" class="form-text" placeholder="Phone Number" required name="phoneNumber" autocomplete="off">
                        </div>
                        <div class="form-row">
                            <span class="fa fa-home"></span>
                            
                            <input type="text" class="form-text" placeholder="Address" required name="address" autocomplete="off">
                        </div>
                        <div class="form-row">
                            <span class="fa fa-image"></span>
                            
                            <input type="file" class="form-text" placeholder="profile"  required name="profile" accept="image/png image/jpg image/jpeg">
                        </div>
                        <div class="form-row button-login">
                            <input type="submit" class="btn btn-login" value="Sign Up" name="register">
                        </div>
                    </div>
                </fieldset>
                </form>

                
                <p class="already">Already have an account? <a href="login.php">Login In</a></p>
        </div>
        <!-- //register -->
        
    </section>

</body>
<!-- //Body -->

</html>
<!--PHP-->
