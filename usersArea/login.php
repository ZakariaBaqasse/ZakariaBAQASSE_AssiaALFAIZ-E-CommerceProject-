
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
        <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

<!-- fontawesome -->
<link rel="stylesheet" href="/usersArea/css/style.css" type="text/css" media="all">

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Mukta:300,400,500" rel="stylesheet">
        <title>Log In</title>
    </head>

    <body class="p-0">
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
                                <a class="nav-link" href="register.php">Register</a>
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
                            <input type="submit" class="btn btn-login" value="Log IN" name="register">
                        </div>
                    </div>
                </fieldset>
                </form>

                
                <p class="already">Don't have an account? <a href="./register.php">Sign UP</a></p>
        </div>
        <!-- //register -->
        
    </section>

</body>
<!-- //Body -->

</html>
