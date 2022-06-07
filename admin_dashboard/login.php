
<?php
include_once('../includes/connectDatabase.php');
session_start();
$_SESSION['admin']='';
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    echo "<div class='alert alert-success w-70 text-center mt-0' role='alert'>
        $message
      </div>";
      unset($_SESSION['message']);
}
if(isset($_POST['login'])){
    $user = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $select = "select * from `admin`where admin_name = '$user' or admin_email = '$user'";
    $stmt = $db->prepare($select);
    $stmt->execute();
    $result = $stmt->rowCount();
    $data = $stmt->fetch();
    if($result == 0){
        echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
        Wrong Username.
      </div>";
    }else{
        if(password_verify($password,$data['admin_password'])){
            $_SESSION['admin']=$user;
            header("Location: index.php");
        }else{
            echo "<div class='alert alert-danger w-70 text-center mt-0' role='alert'>
        Wrong Password
      </div>";
        }
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="./images/online solution.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- style CSS -->
    <link rel="stylesheet" href="./style.css" type="text/css" media="all">

<!-- fontawesome -->
<!-- <link rel="stylesheet" href="/usersArea/css/style.css" type="text/css" media="all"> -->

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Mukta:300,400,500" rel="stylesheet">
        <title>Log In</title>
    </head>

    <body class="p-0">
    <div class="container-fluid p-0">
            <!--navbar-->
            <section class="main">
        <div class="bottom-grid">
            <div class="logotext">
                <h1> Log In</h1>
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
                            <span class="fa fa-lock"></span>
                            
                            <input type="password" class="form-text" placeholder="Password" required name="password" autocomplete="off">
                        </div>
                        
                        <p class="already"><a href="register.php">Forgot Password?</a></p>
                        
                        <div class="form-row button-login">
                            <input type="submit" class="btn btn-login" value="Log IN" name="login">
                        </div>
                    </div>
                </fieldset>
                </form>

                
        </div>
        <!-- //register -->
        
    </section>

</body>
<!-- //Body -->

</html>
