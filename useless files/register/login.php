<?php
  echo "<script>alert('Unsuccessfully logged in!');</script>";
 ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container">
    <div class="card ">

        <!-- Animated Success Quote -->
        <div class="animated-quote">
            सफलता उसी को मिलती है जो समय पर काम करता है।
        </div>

        <div class="card-header text-center">
            <a href="../index.html"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a>
            <span class="splash-description">Please enter your Member information.</span>
        </div>
        <div class="card-body">
            <form method="POST" action="element/redirect.php">
                <div class="form-group">
                    <input class="form-control form-control-lg" name="user_id" type="text" placeholder="Userid" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
       
    </div>
</div>

<!-- Styles for the Animated Quote -->
<style>
    .animated-quote {
        background-color: blue;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 20px;
        margin-bottom: 20px;
        animation: fadeInOut 5s infinite;
    }

    @keyframes fadeInOut {
        0% {opacity: 0.5;}
        50% {opacity: 1;}
        100% {opacity: 0.5;}
    }
</style>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
