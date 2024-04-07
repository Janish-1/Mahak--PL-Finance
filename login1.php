<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request method is POST

    $txtReffer = $_POST['txtUser'];
    $txtPassword = $_POST['txtPwd'];

    $db_host = "localhost";
    $db_user = 'root';
    $db_pass = 'janish11';
    $db_name = 'mahakplfinance_spa';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user inputs to prevent SQL injection
    $txtReffer = mysqli_real_escape_string($conn, $txtReffer);
    $txtPassword = mysqli_real_escape_string($conn, $txtPassword);

    // Check if the user already exists
    $check_user_sql = "SELECT id, password FROM registeredusers WHERE email = '$txtReffer'";
    $result = mysqli_query($conn, $check_user_sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // User exists, verify the password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($txtPassword, $row['password'])) {
            // Password is correct, login successful
            echo "Login Successful!";
        } else {
            // Password is incorrect
            echo "Invalid Password!";
        }
    } else {
        // User does not exist
        echo "User not found!";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" class="dark-theme">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" /><link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" /><link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" /><link href="assets/css/dark-theme.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" /><link href="assets/css/bootstrap-extended.css" rel="stylesheet" /><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet" /><link href="assets/css/app.css" rel="stylesheet" /><link href="assets/css/icons.css" rel="stylesheet" /><title>
	N2N Community
</title>

<link rel="stylesheet" href="./sytle1.css">
<link rel="stylesheet" href="./css/app.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/dark-theame.css">
<link rel="stylesheet" href="./bootstrap.css">
</head>
<body class="bg-login">

    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <a href="/"><img src="assets/images/logo-img.png" alt="" /></a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
                                        <p>
                                            Don't have an account yet? <a href="./register.php">Sign up here</a>
                                        </p>
                                    </div>
                                    <div class="form-body">
                                        <form method="post" action="./login1.php" onsubmit="javascript:return WebForm_OnSubmit();" id="form1" class="row g-3">
<div class="aspNetHidden">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTY3NzgyNDI4NWQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFFmZsZXhTd2l0Y2hDaGVja0NoZWNrZWSQDLsLJrOpkC0feLDnm4J9MuWU1g==" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="/WebResource.axd?d=wGoWRwY5r6NeRn8FZeJlb9_Ip5eFVOLj7OQhErPipb67s2DCipxbFxnvWAGC8jfizvdJVeIhhZ1-Mc18mCLP0OH5O5I1&amp;t=637814365746327080" type="text/javascript"></script>


<script src="/WebResource.axd?d=1kJTGAMZT6YerwhODOTuJuAlasnsL_VSLq4HkfaB73Rbrj2lN7uXbG-84Jqj8TypvgGtgbGhBT1VykQQ-6yqFjdNuoMwKVHFTkcZYFdGkDoa9Ia70&amp;t=637814365746327080" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
function WebForm_OnSubmit() {
if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
return true;
}
//]]>
</script>

<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="C2EE9ABB" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAAWmaU/AFP5DHaSI4W1PkqPvDFTzKcXJqLg+OeJ6QAEa2jPSlu16Yx4QbiDU+dddK1NSQk8gkf2hZzbx4WIElBOVPOaW1pQztoQA36D1w/+bXXYq2PqKvkithis8uGy+E5EVkJtY" />
</div>
                                            <div class="col-12">
                                                <div id="vs1" class="alertSummary" style="display:none;">

</div>
                                            </div>
                                            <div class="col-12">
                                                
                                                <input name="txtUser" type="text" maxlength="50" id="txtUser" class="form-control" placeholder="User ID" />
                                                <span id="RequiredFieldValidator2" style="display:none;">User ID required</span>
                                            </div>
                                            <div class="col-12">
                                                

                                                <input name="txtPwd" type="password" maxlength="20" id="txtPwd" class="form-control" placeholder="Password" />
                                                <span id="RequiredFieldValidator1" style="display:none;">Password required</span>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                    
                                                    <input id="flexSwitchCheckChecked" type="checkbox" name="flexSwitchCheckChecked" />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a href="./password.php">Forgot Password?</a>
                                            </div> 
                                            <div class="col-12">
                                                <div class="d-grid"> 
                                                    <input type="submit" name="btnSubmit" value="Sign in" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnSubmit&quot;, &quot;&quot;, true, &quot;ValidGroup&quot;, &quot;&quot;, false, false))" id="btnSubmit" class="btn btn-warning" />
                                                </div>
                                            </div>
                                        
<script type="text/javascript">
//<![CDATA[
var Page_ValidationSummaries =  new Array(document.getElementById("vs1"));
var Page_Validators =  new Array(document.getElementById("RequiredFieldValidator2"), document.getElementById("RequiredFieldValidator1"));
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
var vs1 = document.all ? document.all["vs1"] : document.getElementById("vs1");
vs1.validationGroup = "ValidGroup";
var RequiredFieldValidator2 = document.all ? document.all["RequiredFieldValidator2"] : document.getElementById("RequiredFieldValidator2");
RequiredFieldValidator2.controltovalidate = "txtUser";
RequiredFieldValidator2.focusOnError = "t";
RequiredFieldValidator2.errormessage = "User ID required";
RequiredFieldValidator2.display = "Dynamic";
RequiredFieldValidator2.validationGroup = "ValidGroup";
RequiredFieldValidator2.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator2.initialvalue = "";
var RequiredFieldValidator1 = document.all ? document.all["RequiredFieldValidator1"] : document.getElementById("RequiredFieldValidator1");
RequiredFieldValidator1.controltovalidate = "txtPwd";
RequiredFieldValidator1.focusOnError = "t";
RequiredFieldValidator1.errormessage = "Password required";
RequiredFieldValidator1.display = "Dynamic";
RequiredFieldValidator1.validationGroup = "ValidGroup";
RequiredFieldValidator1.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator1.initialvalue = "";
//]]>
</script>


<script type="text/javascript">
//<![CDATA[

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        //]]>
</script>
</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <!--app JS-->
    <script src="assets/js/app.js"></script>




</body>
</html>
