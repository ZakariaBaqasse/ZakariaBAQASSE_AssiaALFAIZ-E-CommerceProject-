<?php
session_start();
include_once('../includes/connectDatabase.php');
include_once('../functions/usersFunctions.php');
if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="./css/weatherApp.css">
    <!-- <link rel="stylesheet" href="../newStyle.css"> -->
    <script src="./weatherScripts/weatherScript.js" defer></script>
    <link rel="shortcut icon" href="./images/Untitled design (3).png" type="image/x-icon">
</head>

<body >
    <div class="container-fluid h-100">
       
        <!--Login navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary w-100">
            <ul class="navbar-nav me-auto">
                <?php
        $name = $_SESSION['username'];
        echo "<li class='nav-item'>
        <a class='nav-link' href='user_dashboard.php'>Welcome $name</a>
    </li> 
    <li class='nav-item'>
        <a class='nav-link' href='logout.php'>Log out</a>
    </li> ";
      ?>
            </ul>
        </nav>
        <div class="meteo mx-auto mt-5">
            <div class="search">
                <input type="text" class="search-bar" placeholder="Search">
                <button>
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="weather loading">
                <h2 class="city">Weather in Denver</h2>
                <h1 class="temp">51°C</h1>
                <div class="flex">
                    <img src="https://openweathermap.org/img/wn/04n.png" alt="" class="icon" />
                    <div class="description">Cloudy</div>
                </div>
                <div class="humidity">Humidity: 60%</div>
                <div class="wind">Wind speed: 6.2 km/h</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
}else{
    $_SESSION['location']='weatherApp.php';
    header("Location: login.php");
}
?>