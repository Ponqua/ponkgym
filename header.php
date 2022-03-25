<?php


session_start();

//if user id isn't in session (user not logged in)
if(!isset($_SESSION['id'])){

    header('location: login.php');
    exit;

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/img/PonkGymIcon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css"/>

</head>
<body>
    
    <nav class="navbar">
        <div class="nav-wrapper">
            <img src="assets/img/logo.png" class="brand-img"/>
            <form class="search-form" action="search.php" method="POST">
                <input type="text" class="search-box" placeholder="Search..." name="search_input"/>
            </form>
            <div class="nav-items">

                <a href="workouts.php"><i class="fa-solid fa-square-caret-up"></i></a>
                <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="profile.php"><i class="fas fa-user"></i></a>
                <a href="index.php"><i class="fa-solid fa-house"></i></a>

            </div>
        </div>
    </nav>