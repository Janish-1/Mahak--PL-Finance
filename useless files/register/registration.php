  <?php
    include_once("element/redirect.php");

if(isset($_SESSION['alert'])) {
    echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
    unset($_SESSION['alert']);
}

   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .qr-code {
            width: 2in;
            height: 2in;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center" style="background-color: red;">
                    <div class="card-header text-white bg-success">
                        Registration Successful
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-white">Welcome to Mahak Pl Finance Services Private Limited!</h5>
                        <p class="card-text text-white">Your registration has been completed successfully. </p>
                         <h5 class="card-text text-white"> For Activation of Your ID, pay on the QR code below:</h5>
                        
                        <!-- Adjust the path to your QR code image -->
                        <img src="assets/images/qrcode.jpg" alt="QR Code" class="img-fluid qr-code mx-auto d-block">
                        <div class="mt-3">
                            <a href="/mlm/index.php" class="btn btn-light">Go to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
