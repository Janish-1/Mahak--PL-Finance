  <?php
    include_once("element/redirect.php");
   ?>
   <!doctype html>
<html lang="en">

<?php
if(isset($_SESSION['alert'])) {
    echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
    unset($_SESSION['alert']);
}

$refer = isset($_GET['refer']) ? $_GET['refer'] : '';
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Mahak PL Finance </title>
    <style>
        body {
            background-color: #007BFF; /* Blue background */
        }

        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }

        .logo {
            display: block;
            margin: 0 auto 20px; /* Center the logo and add margin at the bottom */
            max-width: 150px; /* Adjust as needed */
        }
    </style>
</head>

<body>
 <div class="dashboard-main-wrapper centered-form">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="assets/images/logo.png" alt="Logo" class="logo"> <!-- Add your logo here -->
                            <!-- ... existing form content ... -->

                        
                              <div class="card">
                                  <h5 class="card-header">New Registration Form</h5>

                                  <div class="card-body">
                                      <form method="POST" action="element/redirect.php">
                                        <div class="form-group">
                                             <label for="inputUserName">Sponsor ID</label>
                                     <input id="inputUserName" name="sponsor_id" type="text" value="<?php echo $refer; ?>" class="form-control" readonly>
                                        </div>
                                          <div class="form-group">
                                              <label for="inputUserName">Name</label>
                                              <input id="inputUserName" type="text" name="user_name" required="" placeholder="Enter user name" class="form-control" oninput="this.value = this.value.toUpperCase()" pattern="[a-zA-Z\s]+">
                                          </div>
                                          <div class=" form-group btn-group btn-group-toggle" data-toggle="buttons">
                                              <label class="btn btn-primary active">
                                                  <input type="radio" name="position" id="option1" value="0" checked>Left
                                              </label>
                                              <label class="btn btn-primary">
                                                  <input type="radio" name="position" id="option2" value="1" > Right
                                              </label>
                                          </div>
                                          <div class="form-group">
                                              <label for="inputPassword">Mobile No</label>
                                              <input id="inputPassword" type="tel" name="user_mob" placeholder="mobile no" required="" class="form-control" pattern="[0-9]{10}">
                                          </div>
                                          <div class="form-group">
                                              <label for="inputRepeatPassword">Password</label>
                                              <input id="inputRepeatPassword" name="password" data-parsley-equalto="#inputPassword" type="text" required="" placeholder="Password" class="form-control" pattern="[a-zA-Z0-9@]{6,20}">
                                              <p><small>Password length should not less than 6 digit (only Numbers, Alphabet and @ is allowed)</small> </p>
                                          </div>
                                          <div class="form-group">
    <input type="checkbox" name="terms_acceptance" required>
    <label for="terms_acceptance">I accept the <a href="terms_and_conditions_link_here">Terms and Conditions</a></label>
</div>

                                       <div class="row">
    <div class="col-sm-6">
        <button type="submit" name="user_registration" class="btn btn-space btn-primary">Submit</button>
    </div>
    <div class="col-sm-6">
        <a href="login.php" class="btn btn-space btn-secondary">Login</a>
    </div>
</div>

                                          
                                      </form>
                                  </div>
                              </div>
                          </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
                      </div>

	                    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
	                    <!-- bootstap bundle js -->
	                    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	                    <!-- slimscroll js -->
	                    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
	                    <!-- main js -->
	                    <script src="assets/libs/js/main-js.js"></script>
	                    <!-- morris-chart js -->
	                    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	                    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
	                    <script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
	                    <!-- chart js -->
	                    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
	                    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
	                    <!-- dashboard js -->
	                    <script src="assets/libs/js/dashboard-influencer.js"></script>
</body>

</html>
