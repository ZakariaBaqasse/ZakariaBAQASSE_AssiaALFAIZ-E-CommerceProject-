<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="../images/online solution.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="../style.css">

</head>
<body>
 <!--Navbar-->   
  <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
          <div class="container-fluid">
              <img src="../images/online solution.png" alt="Logo" class="logo">
              <nav class="navbar navbar-expand-lg">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a href="#" class="nav-link">Welcome Guest!</a>
                          
                      </li>
                  </ul>
              </nav>
          </div>
      </nav>
      <div class="bg-light">
          <h3 class="text-center p-2">Manage Details</h3>
      </div>
      <div class="row">
          <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
              <div class="ms-3">
                  <a href="#"><img src="../images/filename.jpg" alt="" class="admin-img me-1"></a>
                  <p class="text-center text-light">Admin Name</p>
              </div>
              <div class="button text-center">
                  <button class="ms-3"><a href="" class="nav-link text-light bg-info my-1 p-2">Insert Products</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">View Products</a></button>
                  <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1 p-2">Insert Categories</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">View Categories</a></button>
                  <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1 p-2">Insert Brand</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">View Brand</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">All Orders</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">All Payments</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">List Users</a></button>
                  <button><a href="" class="nav-link text-light bg-info my-1 p-2">Log out</a></button>
              </div>
          </div>
      </div>
      <div class="container">
          <?php
            if(isset($_GET['insert_categories'])){
                include('insertCategories.php');
            }
            if(isset($_GET['insert_brands'])){
                include('insertBrands.php');
            }
          ?>
      </div>

  </div> 










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>

</body>
</html>