<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	session_start();
    // The request method is POST

    $txtReffer = $_POST['txtReffer'];
	$SponserName = "Test";
    $ddlSide = $_POST['ddlSide'];
	$txtPromoterName = $_POST['txtPromoterName'];
	$txtEmail = $_POST['txtEmail'];
	$txtMobile =  $_POST['txtMobile'];
	$txtState = $_POST['txtState'];
	$ddlCountry = $_POST['ddlCountry'];
	$txtPassword = $_POST['txtPassword'];

	$db_host = "localhost";
	$db_user = 'root';
	$db_pass = 'janish11';
	$db_name = 'mahakplfinance_spa';

	$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    
	if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape user inputs to prevent SQL injection
    $txtReffer = mysqli_real_escape_string($conn, $txtReffer);
	$SponserName = mysqli_real_escape_string($conn, $SponserName);
	$ddlSide = mysqli_real_escape_string($conn, $ddlSide);
	$txtPromoterName = mysqli_real_escape_string($conn, $txtPromoterName);
	$txtEmail = mysqli_real_escape_string($conn, $txtEmail);
	$txtMobile = mysqli_real_escape_string($conn, $txtMobile);
	$txtState = mysqli_real_escape_string($conn, $txtState);
	$ddlCountry = mysqli_real_escape_string($conn, $ddlCountry);
	$txtPassword = mysqli_real_escape_string($conn, $usertxtPasswordname);

    // Hash the password before storing it in the database (use a secure hashing algorithm)
    $hashed_password = password_hash($txtPassword, PASSWORD_BCRYPT);

    // Insert user data into the database (replace with your actual query)
	$sql = "INSERT INTO registeredusers (reffer, sponserName, side, promoterName, email, mobile, state, country, password) VALUES ('$txtReffer', '$SponserName', '$ddlSide', '$txtPromoterName', '$txtEmail', '$txtMobile', '$txtState', '$ddlCountry', '$hashed_password')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
		header("Location: /login1.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" class="dark-theme">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/css/dark-theme.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet" />
	<link href="assets/css/app.css" rel="stylesheet" />
	<link href="assets/css/icons.css" rel="stylesheet" />
	<title>
		Smart Help Organization
	</title>

	<link rel="stylesheet" href="./css/sytle1.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="./css/dark-theame.css"> -->
	<!-- <link rel="stylesheet" href="./css/style.css"> -->

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/customJS.js"></script>
	<script type="text/javascript">
		function ValidateCheckBox(sender, args) {

			if ($('#flexSwitchCheckChecked').is(':checked')) {
				args.IsValid = true;
			} else {
				args.IsValid = false;
			}

		}
	</script>

</head>





<body class="bg-login">

	<div id="spinner"
		class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Spinner End -->


	<!-- Topbar Start -->
	<div class="container-fluid bg-light p-0">
		<!-- Navbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">

        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">
                <div style="margin-left: 50px;">
                    <img src="./img/Smart help organization.png" alt="" height="75px" width="150px">
                </div>
            </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div style="margin-left: 50px;">
            <img src="./img/Smart help organization.png" alt="" height="80px" width="150px">
        </div> -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="about1.php" class="dropdown-item">About Us</a>
                        <a href="quote.php" class="dropdown-item">Our Legal</a>
                        <!-- <a href="404.php" class="dropdown-item">404 Page</a> -->
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Opportunity</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="feature.php" class="dropdown-item">Donation Plan</a>
                        <a href="quote.php" class="dropdown-item">Rewards</a>
                        <!-- <a href="404.php" class="dropdown-item">404 Page</a> -->
                    </div>
                </div>
                <a href="./earning.php" class="nav-item nav-link">Earning</a>
                <a href="./login1.php" class="nav-item nav-link">User Login</a>
                <!-- <a href="project.php" class="nav-item nav-link">Project</a> -->
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="./register.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Register<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

		<!--wrapper-->
		<div class="wrapper" style="box-shadow: 8px 8px 8px black;">
			<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
				<div class="container">
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
						<div class="col mx-auto">
							<div class="my-4 text-center">
								<a href="/">
									<img src="assets/images/logo-img.png" alt="" /></a>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="border p-4 rounded">
										<div class="text-center">
											<h3 class="">Sign Up</h3>
											<p>
												Already have an account? <a href="./login1.php">Sign in here</a>
											</p>
										</div>


										<div class="form-body">
											<form method="post" action="./register.php"
												onsubmit="javascript:return WebForm_OnSubmit();" id="registrarionForm"
												class="row g-3">
												<div class="aspNetHidden">
													<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET"
														value="" />
													<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT"
														value="" />
													<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"
														value="/wEPDwUJMzQwNjY0NzU3D2QWAgIDD2QWAgIjDxAPFgYeDURhdGFUZXh0RmllbGQFB0NvdW50cnkeDkRhdGFWYWx1ZUZpZWxkBQdDb3VudHJ5HgtfIURhdGFCb3VuZGdkDxbKAQIBAgICAwIEAgUCBgIHAggCCQIKAgsCDAINAg4CDwIQAhECEgITAhQCFQIWAhcCGAIZAhoCGwIcAh0CHgIfAiACIQIiAiMCJAIlAiYCJwIoAikCKgIrAiwCLQIuAi8CMAIxAjICMwI0AjUCNgI3AjgCOQI6AjsCPAI9Aj4CPwJAAkECQgJDAkQCRQJGAkcCSAJJAkoCSwJMAk0CTgJPAlACUQJSAlMCVAJVAlYCVwJYAlkCWgJbAlwCXQJeAl8CYAJhAmICYwJkAmUCZgJnAmgCaQJqAmsCbAJtAm4CbwJwAnECcgJzAnQCdQJ2AncCeAJ5AnoCewJ8An0CfgJ/AoABAoEBAoIBAoMBAoQBAoUBAoYBAocBAogBAokBAooBAosBAowBAo0BAo4BAo8BApABApEBApIBApMBApQBApUBApYBApcBApgBApkBApoBApsBApwBAp0BAp4BAp8BAqABAqEBAqIBAqMBAqQBAqUBAqYBAqcBAqgBAqkBAqoBAqsBAqwBAq0BAq4BAq8BArABArEBArIBArMBArQBArUBArYBArcBArgBArkBAroBArsBArwBAr0BAr4BAr8BAsABAsEBAsIBAsMBAsQBAsUBAsYBAscBAsgBAskBAsoBFsoBEAUHQWxiYW5pYQUHQWxiYW5pYWcQBQdBbmRvcnJhBQdBbmRvcnJhZxAFBkFuZ29sYQUGQW5nb2xhZxAFCEFuZ3VpbGxhBQhBbmd1aWxsYWcQBRNBbnRpZ3VhIGFuZCBCYXJidWRhBRNBbnRpZ3VhIGFuZCBCYXJidWRhZxAFCUFyZ2VudGluYQUJQXJnZW50aW5hZxAFB0FybWVuaWEFB0FybWVuaWFnEAUFQXJ1YmEFBUFydWJhZxAFCUF1c3RyYWxpYQUJQXVzdHJhbGlhZxAFB0F1c3RyaWEFB0F1c3RyaWFnEAUKQXplcmJhaWphbgUKQXplcmJhaWphbmcQBQdCYWhhbWFzBQdCYWhhbWFzZxAFB0JhaHJhaW4FB0JhaHJhaW5nEAUKQmFuZ2xhZGVzaAUKQmFuZ2xhZGVzaGcQBQhCYXJiYWRvcwUIQmFyYmFkb3NnEAUHQmVsYXJ1cwUHQmVsYXJ1c2cQBQdCZWxnaXVtBQdCZWxnaXVtZxAFBkJlbGl6ZQUGQmVsaXplZxAFBUJlbmluBQVCZW5pbmcQBQdCZXJtdWRhBQdCZXJtdWRhZxAFBkJodXRhbgUGQmh1dGFuZxAFB0JvbGl2aWEFB0JvbGl2aWFnEAUGQm9zbmlhBQZCb3NuaWFnEAUIQm90c3dhbmEFCEJvdHN3YW5hZxAFBkJyYXppbAUGQnJhemlsZxAFBkJydW5laQUGQnJ1bmVpZxAFCEJ1bGdhcmlhBQhCdWxnYXJpYWcQBQdCdXJ1bmRpBQdCdXJ1bmRpZxAFCENhbWJvZGlhBQhDYW1ib2RpYWcQBQhDYW1lcm9vbgUIQ2FtZXJvb25nEAUGQ2FuYWRhBQZDYW5hZGFnEAUSQ2FwZSBWZXJkZSBJc2xhbmRzBRJDYXBlIFZlcmRlIElzbGFuZHNnEAUOQ2F5bWFuIElzbGFuZHMFDkNheW1hbiBJc2xhbmRzZxAFF0NlbnRyYWwgQWZyaWNhIFJlcHVibGljBRdDZW50cmFsIEFmcmljYSBSZXB1YmxpY2cQBQRDaGFkBQRDaGFkZxAFBUNoaWxlBQVDaGlsZWcQBQVDaGluYQUFQ2hpbmFnEAUIQ29sdW1iaWEFCENvbHVtYmlhZxAFDkNvbW9yb3MgSXNsYW5kBQ5Db21vcm9zIElzbGFuZGcQBQVDb25nbwUFQ29uZ29nEAUMQ29vayBJc2xhbmRzBQxDb29rIElzbGFuZHNnEAUKQ29zdGEgUmljYQUKQ29zdGEgUmljYWcQBQdDcm9hdGlhBQdDcm9hdGlhZxAFBEN1YmEFBEN1YmFnEAUGQ3lwcnVzBQZDeXBydXNnEAUOQ3plY2ggUmVwdWJsaWMFDkN6ZWNoIFJlcHVibGljZxAFJERlbW9jcmF0aWMgUmVwdWJsaWMgb2YgQ29uZ28gKFphaXJlKQUkRGVtb2NyYXRpYyBSZXB1YmxpYyBvZiBDb25nbyAoWmFpcmUpZxAFB0Rlbm1hcmsFB0Rlbm1hcmtnEAUMRGllZ28gR2FyY2lhBQxEaWVnbyBHYXJjaWFnEAUIRGppYm91dGkFCERqaWJvdXRpZxAFEERvbWluaWNhIElzbGFuZHMFEERvbWluaWNhIElzbGFuZHNnEAUSRG9taW5pY2FuIFJlcHVibGljBRJEb21pbmljYW4gUmVwdWJsaWNnEAUHRWN1YWRvcgUHRWN1YWRvcmcQBQVFZ3lwdAUFRWd5cHRnEAULRWwgU2FsdmFkb3IFC0VsIFNhbHZhZG9yZxAFEUVxdWF0b3JpYWwgR3VpbmVhBRFFcXVhdG9yaWFsIEd1aW5lYWcQBQdFcml0cmVhBQdFcml0cmVhZxAFB0VzdG9uaWEFB0VzdG9uaWFnEAUIRXRoaW9waWEFCEV0aGlvcGlhZxAFEEZhbGtsYW5kIElzbGFuZHMFEEZhbGtsYW5kIElzbGFuZHNnEAUMRmlqaSBJc2xhbmRzBQxGaWppIElzbGFuZHNnEAUHRmlubGFuZAUHRmlubGFuZGcQBQZGcmFuY2UFBkZyYW5jZWcQBQ9GcmVuY2ggR3VpYW5hwqAFD0ZyZW5jaCBHdWlhbmHCoGcQBRBGcmVuY2ggUG9seW5lc2lhBRBGcmVuY2ggUG9seW5lc2lhZxAFBUdhYm9uBQVHYWJvbmcQBQdHZW9yZ2lhBQdHZW9yZ2lhZxAFB0dlcm1hbnkFB0dlcm1hbnlnEAUJR2licmFsdGFyBQlHaWJyYWx0YXJnEAUGR3JlZWNlBQZHcmVlY2VnEAUJR3JlZW5sYW5kBQlHcmVlbmxhbmRnEAUHR3JlbmFkYQUHR3JlbmFkYWcQBQpHdWFkZWxvdXBlBQpHdWFkZWxvdXBlZxAFBEd1YW0FBEd1YW1nEAUJR3VhdGVtYWxhBQlHdWF0ZW1hbGFnEAUNR3VpbmVhIEJpc3NhdQUNR3VpbmVhIEJpc3NhdWcQBQZHdXlhbmEFBkd1eWFuYWcQBQVIYWl0aQUFSGFpdGlnEAUISG9uZHVyYXMFCEhvbmR1cmFzZxAFCUhvbmcgS29uZwUJSG9uZyBLb25nZxAFB0h1bmdhcnkFB0h1bmdhcnlnEAUFSW5kaWEFBUluZGlhZxAFCUluZG9uZXNpYQUJSW5kb25lc2lhZxAFBElyYW4FBElyYW5nEAUESXJhcQUESXJhcWcQBQZJc3JhZWwFBklzcmFlbGcQBQVJdGFseQUFSXRhbHlnEAUHSmFtYWljYQUHSmFtYWljYWcQBQVKYXBhbgUFSmFwYW5nEAUGSm9yZGFuBQZKb3JkYW5nEAUKS2F6YWtoc3RhbgUKS2F6YWtoc3RhbmcQBQVLZW55YQUFS2VueWFnEAUIS2lyaWJhdGkFCEtpcmliYXRpZxAFDEtvcmVhLCBOb3J0aAUMS29yZWEsIE5vcnRoZxAFDEtvcmVhLCBTb3V0aAUMS29yZWEsIFNvdXRoZxAFBkt1d2FpdAUGS3V3YWl0ZxAFCkt5cmd5enN0YW4FCkt5cmd5enN0YW5nEAUETGFvcwUETGFvc2cQBQZsYXR2aWEFBmxhdHZpYWcQBQdMZWJhbm9uBQdMZWJhbm9uZxAFB0xlc290aG8FB0xlc290aG9nEAUFTGlieWEFBUxpYnlhZxAFDUxpZWNodGVuc3RlaW4FDUxpZWNodGVuc3RlaW5nEAUJTGl0aHVhbmlhBQlMaXRodWFuaWFnEAUKTHV4ZW1ib3VyZwUKTHV4ZW1ib3VyZ2cQBQVNYWNhdQUFTWFjYXVnEAURTWFjZWRvbmlhIChGeXJvbSkFEU1hY2Vkb25pYSAoRnlyb20pZxAFCk1hZGFnYXNjYXIFCk1hZGFnYXNjYXJnEAUGTWFsYXdpBQZNYWxhd2lnEAUITWFsYXlzaWEFCE1hbGF5c2lhZxAFEU1hbGRpdmVzIFJlcHVibGljBRFNYWxkaXZlcyBSZXB1YmxpY2cQBQVNYWx0YQUFTWFsdGFnEAUPTWFyaWFuYSBJc2xhbmRzBQ9NYXJpYW5hIElzbGFuZHNnEAUQTWFyc2hhbGwgSXNsYW5kcwUQTWFyc2hhbGwgSXNsYW5kc2cQBQpNYXJ0aW5pcXVlBQpNYXJ0aW5pcXVlZxAFCU1hdXJpdGl1cwUJTWF1cml0aXVzZxAFD01heW90dGUgSXNsYW5kcwUPTWF5b3R0ZSBJc2xhbmRzZxAFBk1leGljbwUGTWV4aWNvZxAFCk1pY3JvbmVzaWEFCk1pY3JvbmVzaWFnEAUHTW9sZG92YQUHTW9sZG92YWcQBQZNb25hY28FBk1vbmFjb2cQBQhNb25nb2xpYQUITW9uZ29saWFnEAUKTW9udHNlcnJhdAUKTW9udHNlcnJhdGcQBQpNb3phbWJpcXVlBQpNb3phbWJpcXVlZxAFD015YW5tYXIgKEJ1cm1hKQUPTXlhbm1hciAoQnVybWEpZxAFB05hbWliaWEFB05hbWliaWFnEAUFTmF1cnUFBU5hdXJ1ZxAFBU5lcGFsBQVOZXBhbGcQBQtOZXRoZXJsYW5kcwULTmV0aGVybGFuZHNnEAUUTmV0aGVybGFuZHMgQW50aWxsZXMFFE5ldGhlcmxhbmRzIEFudGlsbGVzZxAFDU5ldyBDYWxlZG9uaWEFDU5ldyBDYWxlZG9uaWFnEAULTmV3IFplYWxhbmQFC05ldyBaZWFsYW5kZxAFCU5pY2FyYWd1YQUJTmljYXJhZ3VhZxAFBU5pZ2VyBQVOaWdlcmcQBQdOaWdlcmlhBQdOaWdlcmlhZxAFC05pdWUgSXNsYW5kBQtOaXVlIElzbGFuZGcQBQ5Ob3Jmb2xrIElzbGFuZAUOTm9yZm9sayBJc2xhbmRnEAUGTm9yd2F5BQZOb3J3YXlnEAUET21hbgUET21hbmcQBQhQYWtpc3RhbgUIUGFraXN0YW5nEAUFUGFsYXUFBVBhbGF1ZxAFCVBhbGVzdGluZQUJUGFsZXN0aW5lZxAFBlBhbmFtYQUGUGFuYW1hZxAFEFBhcHVhIE5ldyBHdWluZWEFEFBhcHVhIE5ldyBHdWluZWFnEAUIUGFyYWd1YXkFCFBhcmFndWF5ZxAFBFBlcnUFBFBlcnVnEAULUGhpbGlwcGluZXMFC1BoaWxpcHBpbmVzZxAFBlBvbGFuZAUGUG9sYW5kZxAFCFBvcnR1Z2FsBQhQb3J0dWdhbGcQBQtQdWVydG8gUmljbwULUHVlcnRvIFJpY29nEAUFUWF0YXIFBVFhdGFyZxAFDlJldW5pb24gSXNsYW5kBQ5SZXVuaW9uIElzbGFuZGcQBQdSb21hbmlhBQdSb21hbmlhZxAFBlJ1c3NpYQUGUnVzc2lhZxAFBlJ3YW5kYQUGUndhbmRhZxAFEFNhbW9hIChBbWVyaWNhbikFEFNhbW9hIChBbWVyaWNhbilnEAUPU2Ftb2EgKFdlc3Rlcm4pBQ9TYW1vYSAoV2VzdGVybilnEAUKU2FuIE1hcmlubwUKU2FuIE1hcmlub2cQBQxTYXVkaSBBcmFiaWEFDFNhdWRpIEFyYWJpYWcQBQZTZXJiaWEFBlNlcmJpYWcQBQpTZXljaGVsbGVzBQpTZXljaGVsbGVzZxAFCVNpbmdhcG9yZQUJU2luZ2Fwb3JlZxAFD1Nsb3ZhayBSZXB1YmxpYwUPU2xvdmFrIFJlcHVibGljZxAFCFNsb3ZlbmlhBQhTbG92ZW5pYWcQBQ9Tb2xvbW9uIElzbGFuZHMFD1NvbG9tb24gSXNsYW5kc2cQBQdTb21hbGlhBQdTb21hbGlhZxAFDFNvdXRoIEFmcmljYQUMU291dGggQWZyaWNhZxAFBVNwYWluBQVTcGFpbmcQBQlTcmkgTGFua2EFCVNyaSBMYW5rYWcQBRBTdCBLaXR0cyAmIE5ldmlhBRBTdCBLaXR0cyAmIE5ldmlhZxAFCFN0IEx1Y2lhBQhTdCBMdWNpYWcQBQVTdWRhbgUFU3VkYW5nEAUHU3VyaW5hbQUHU3VyaW5hbWcQBQlTd2F6aWxhbmQFCVN3YXppbGFuZGcQBQZTd2VkZW4FBlN3ZWRlbmcQBQtTd2l0emVybGFuZAULU3dpdHplcmxhbmRnEAUFU3lyaWEFBVN5cmlhZxAFBlRhaXdhbgUGVGFpd2FuZxAFClRhamlraXN0YW4FClRhamlraXN0YW5nEAUIVGFuemFuaWEFCFRhbnphbmlhZxAFCFRoYWlsYW5kBQhUaGFpbGFuZGcQBQVUb25nYQUFVG9uZ2FnEAURVHJpbmlkYWQgJiBUb2JhZ28FEVRyaW5pZGFkICYgVG9iYWdvZxAFB1R1bmlzaWEFB1R1bmlzaWFnEAUGVHVya2V5BQZUdXJrZXlnEAUMVHVya21lbmlzdGFuBQxUdXJrbWVuaXN0YW5nEAUWVHVya3MgJiBDYWljb3MgSXNsYW5kcwUWVHVya3MgJiBDYWljb3MgSXNsYW5kc2cQBQZUdXZhbHUFBlR1dmFsdWcQBQZVZ2FuZGEFBlVnYW5kYWcQBQdVa3JhaW5lBQdVa3JhaW5lZxAFFFVuaXRlZCBBcmFiIEVtaXJhdGVzBRRVbml0ZWQgQXJhYiBFbWlyYXRlc2cQBQ5Vbml0ZWQgS2luZ2RvbQUOVW5pdGVkIEtpbmdkb21nEAUHVXJ1Z3VheQUHVXJ1Z3VheWcQBQNVU0EFA1VTQWcQBQpVemJla2lzdGFuBQpVemJla2lzdGFuZxAFB1ZhbnVhdHUFB1ZhbnVhdHVnEAUJVmVuZXp1ZWxhBQlWZW5lenVlbGFnEAUHVmlldG5hbQUHVmlldG5hbWcQBRdXYWxsaXMgJiBGdXR1bmEgSXNsYW5kcwUXV2FsbGlzICYgRnV0dW5hIElzbGFuZHNnEAUTWWVtZW4gQXJhYiBSZXB1YmxpYwUTWWVtZW4gQXJhYiBSZXB1YmxpY2cQBQZaYW1iaWEFBlphbWJpYWcQBQhaaW1iYWJ3ZQUIWmltYmFid2VnZGRkq0YQk4DVRCTyFxcY5PDxDlV4yLM=" />
												</div>

												<script type="text/javascript">
													//<![CDATA[
													var theForm = document.forms['registrarionForm'];
													if (!theForm) {
														theForm = document.registrarionForm;
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


												<script
													src="/WebResource.axd?d=wGoWRwY5r6NeRn8FZeJlb9_Ip5eFVOLj7OQhErPipb67s2DCipxbFxnvWAGC8jfizvdJVeIhhZ1-Mc18mCLP0OH5O5I1&amp;t=637814365746327080"
													type="text/javascript"></script>


												<script
													src="/WebResource.axd?d=1kJTGAMZT6YerwhODOTuJuAlasnsL_VSLq4HkfaB73Rbrj2lN7uXbG-84Jqj8TypvgGtgbGhBT1VykQQ-6yqFjdNuoMwKVHFTkcZYFdGkDoa9Ia70&amp;t=637814365746327080"
													type="text/javascript"></script>
												<script type="text/javascript">
													//<![CDATA[
													function WebForm_OnSubmit() {
														if (typeof (ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
														return true;
													}
													//]]>
												</script>

												<div class="aspNetHidden">

													<input type="hidden" name="__VIEWSTATEGENERATOR"
														id="__VIEWSTATEGENERATOR" value="B2F98CBF" />
													<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION"
														value="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" />
												</div>



												<div class="col-12">
													<div id="vs1" class="alertSummary" style="display:none;">

													</div>

												</div>

												<div class="col-sm-6">
													<label for="txtReffer" class="form-label">Sponsor ID</label>
													<input name="txtReffer" type="text" maxlength="20" id="txtReffer"
														class="form-control" placeholder="Sponsor ID"
														onblur="return GetAffiliateName(this);" />
													<span id="RequiredFieldValidator2" style="display:none;">Sponsor ID
														required</span>
												</div>
												<div class="col-sm-6">
													<label for="ajexresult_reffer" class="form-label">Sponsor
														Name</label>
													<input name="ajexresult_reffer" type="text" maxlength="100"
														readonly="readonly" id="ajexresult_reffer" class="form-control"
														placeholder="Sponsor Name" />
												</div>

												<div class="col-12">
													<label for="ddlSide" class="form-label">Position</label>
													<select name="ddlSide" id="ddlSide" class="form-control">
														<option value="0">--Select--</option>
														<option value="L">Left</option>
														<option value="R">Right</option>

													</select>
													<span id="Rq23" style="display:none;">*</span>
												</div>

												<div class="col-12">
													<label for="txtPromoterName" class="form-label">Your Name</label>
													<input name="txtPromoterName" type="text" maxlength="100"
														id="txtPromoterName" class="form-control"
														placeholder="Your Name" />
													<span id="RequiredFieldValidator7" class="alertInline"
														style="display:none;">*</span>
													<span id="RequiredFieldValidator4" style="display:none;">Your name
														required</span>
												</div>

												<div class="col-12">
													<label for="txtEmail" class="form-label">Email ID</label>
													<input name="txtEmail" type="text" maxlength="50" id="txtEmail"
														class="form-control" placeholder="Email ID" />
													<span id="RequiredFieldValidator6" class="alertInline"
														style="display:none;">*</span>
													<span id="RequiredFieldValidator8" class="alertInline"
														style="display:none;">*</span>
													<span id="REV1" class="alertInline" style="display:none;">Invalid
														email ID</span>
												</div>

												<div class="col-12">
													<label for="txtMobile" class="form-label">Mobile Number</label>
													<input name="txtMobile" type="text" maxlength="10" id="txtMobile"
														class="form-control" placeholder="Mobile Number" />
													<span id="RequiredFieldValidator1" style="display:none;">Mobile
														number required</span>
												</div>


												<div class="col-12">
													<label for="txtState" class="form-label">State</label>
													<input name="txtState" type="text" maxlength="50" id="txtState"
														class="form-control" placeholder="State Name" />
													<span id="RequiredFieldValidator5" style="display:none;">State name
														required</span>
												</div>
												<div class="col-12">
													<label for="ddlCountry" class="form-label">Country</label>
													<select name="ddlCountry" id="ddlCountry" class="form-control">
														<option value="">--Select--</option>
														<option value="Albania">Albania</option>
														<option value="Andorra">Andorra</option>
														<option value="Angola">Angola</option>
														<option value="Anguilla">Anguilla</option>
														<option value="Antigua and Barbuda">Antigua and Barbuda</option>
														<option value="Argentina">Argentina</option>
														<option value="Armenia">Armenia</option>
														<option value="Aruba">Aruba</option>
														<option value="Australia">Australia</option>
														<option value="Austria">Austria</option>
														<option value="Azerbaijan">Azerbaijan</option>
														<option value="Bahamas">Bahamas</option>
														<option value="Bahrain">Bahrain</option>
														<option value="Bangladesh">Bangladesh</option>
														<option value="Barbados">Barbados</option>
														<option value="Belarus">Belarus</option>
														<option value="Belgium">Belgium</option>
														<option value="Belize">Belize</option>
														<option value="Benin">Benin</option>
														<option value="Bermuda">Bermuda</option>
														<option value="Bhutan">Bhutan</option>
														<option value="Bolivia">Bolivia</option>
														<option value="Bosnia">Bosnia</option>
														<option value="Botswana">Botswana</option>
														<option value="Brazil">Brazil</option>
														<option value="Brunei">Brunei</option>
														<option value="Bulgaria">Bulgaria</option>
														<option value="Burundi">Burundi</option>
														<option value="Cambodia">Cambodia</option>
														<option value="Cameroon">Cameroon</option>
														<option value="Canada">Canada</option>
														<option value="Cape Verde Islands">Cape Verde Islands</option>
														<option value="Cayman Islands">Cayman Islands</option>
														<option value="Central Africa Republic">Central Africa Republic
														</option>
														<option value="Chad">Chad</option>
														<option value="Chile">Chile</option>
														<option value="China">China</option>
														<option value="Columbia">Columbia</option>
														<option value="Comoros Island">Comoros Island</option>
														<option value="Congo">Congo</option>
														<option value="Cook Islands">Cook Islands</option>
														<option value="Costa Rica">Costa Rica</option>
														<option value="Croatia">Croatia</option>
														<option value="Cuba">Cuba</option>
														<option value="Cyprus">Cyprus</option>
														<option value="Czech Republic">Czech Republic</option>
														<option value="Democratic Republic of Congo (Zaire)">Democratic
															Republic of Congo (Zaire)</option>
														<option value="Denmark">Denmark</option>
														<option value="Diego Garcia">Diego Garcia</option>
														<option value="Djibouti">Djibouti</option>
														<option value="Dominica Islands">Dominica Islands</option>
														<option value="Dominican Republic">Dominican Republic</option>
														<option value="Ecuador">Ecuador</option>
														<option value="Egypt">Egypt</option>
														<option value="El Salvador">El Salvador</option>
														<option value="Equatorial Guinea">Equatorial Guinea</option>
														<option value="Eritrea">Eritrea</option>
														<option value="Estonia">Estonia</option>
														<option value="Ethiopia">Ethiopia</option>
														<option value="Falkland Islands">Falkland Islands</option>
														<option value="Fiji Islands">Fiji Islands</option>
														<option value="Finland">Finland</option>
														<option value="France">France</option>
														<option value="French Guiana ">French Guiana&#160;</option>
														<option value="French Polynesia">French Polynesia</option>
														<option value="Gabon">Gabon</option>
														<option value="Georgia">Georgia</option>
														<option value="Germany">Germany</option>
														<option value="Gibraltar">Gibraltar</option>
														<option value="Greece">Greece</option>
														<option value="Greenland">Greenland</option>
														<option value="Grenada">Grenada</option>
														<option value="Guadeloupe">Guadeloupe</option>
														<option value="Guam">Guam</option>
														<option value="Guatemala">Guatemala</option>
														<option value="Guinea Bissau">Guinea Bissau</option>
														<option value="Guyana">Guyana</option>
														<option value="Haiti">Haiti</option>
														<option value="Honduras">Honduras</option>
														<option value="Hong Kong">Hong Kong</option>
														<option value="Hungary">Hungary</option>
														<option selected="selected" value="India">India</option>
														<option value="Indonesia">Indonesia</option>
														<option value="Iran">Iran</option>
														<option value="Iraq">Iraq</option>
														<option value="Israel">Israel</option>
														<option value="Italy">Italy</option>
														<option value="Jamaica">Jamaica</option>
														<option value="Japan">Japan</option>
														<option value="Jordan">Jordan</option>
														<option value="Kazakhstan">Kazakhstan</option>
														<option value="Kenya">Kenya</option>
														<option value="Kiribati">Kiribati</option>
														<option value="Korea, North">Korea, North</option>
														<option value="Korea, South">Korea, South</option>
														<option value="Kuwait">Kuwait</option>
														<option value="Kyrgyzstan">Kyrgyzstan</option>
														<option value="Laos">Laos</option>
														<option value="latvia">latvia</option>
														<option value="Lebanon">Lebanon</option>
														<option value="Lesotho">Lesotho</option>
														<option value="Libya">Libya</option>
														<option value="Liechtenstein">Liechtenstein</option>
														<option value="Lithuania">Lithuania</option>
														<option value="Luxembourg">Luxembourg</option>
														<option value="Macau">Macau</option>
														<option value="Macedonia (Fyrom)">Macedonia (Fyrom)</option>
														<option value="Madagascar">Madagascar</option>
														<option value="Malawi">Malawi</option>
														<option value="Malaysia">Malaysia</option>
														<option value="Maldives Republic">Maldives Republic</option>
														<option value="Malta">Malta</option>
														<option value="Mariana Islands">Mariana Islands</option>
														<option value="Marshall Islands">Marshall Islands</option>
														<option value="Martinique">Martinique</option>
														<option value="Mauritius">Mauritius</option>
														<option value="Mayotte Islands">Mayotte Islands</option>
														<option value="Mexico">Mexico</option>
														<option value="Micronesia">Micronesia</option>
														<option value="Moldova">Moldova</option>
														<option value="Monaco">Monaco</option>
														<option value="Mongolia">Mongolia</option>
														<option value="Montserrat">Montserrat</option>
														<option value="Mozambique">Mozambique</option>
														<option value="Myanmar (Burma)">Myanmar (Burma)</option>
														<option value="Namibia">Namibia</option>
														<option value="Nauru">Nauru</option>
														<option value="Nepal">Nepal</option>
														<option value="Netherlands">Netherlands</option>
														<option value="Netherlands Antilles">Netherlands Antilles
														</option>
														<option value="New Caledonia">New Caledonia</option>
														<option value="New Zealand">New Zealand</option>
														<option value="Nicaragua">Nicaragua</option>
														<option value="Niger">Niger</option>
														<option value="Nigeria">Nigeria</option>
														<option value="Niue Island">Niue Island</option>
														<option value="Norfolk Island">Norfolk Island</option>
														<option value="Norway">Norway</option>
														<option value="Oman">Oman</option>
														<option value="Pakistan">Pakistan</option>
														<option value="Palau">Palau</option>
														<option value="Palestine">Palestine</option>
														<option value="Panama">Panama</option>
														<option value="Papua New Guinea">Papua New Guinea</option>
														<option value="Paraguay">Paraguay</option>
														<option value="Peru">Peru</option>
														<option value="Philippines">Philippines</option>
														<option value="Poland">Poland</option>
														<option value="Portugal">Portugal</option>
														<option value="Puerto Rico">Puerto Rico</option>
														<option value="Qatar">Qatar</option>
														<option value="Reunion Island">Reunion Island</option>
														<option value="Romania">Romania</option>
														<option value="Russia">Russia</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Samoa (American)">Samoa (American)</option>
														<option value="Samoa (Western)">Samoa (Western)</option>
														<option value="San Marino">San Marino</option>
														<option value="Saudi Arabia">Saudi Arabia</option>
														<option value="Serbia">Serbia</option>
														<option value="Seychelles">Seychelles</option>
														<option value="Singapore">Singapore</option>
														<option value="Slovak Republic">Slovak Republic</option>
														<option value="Slovenia">Slovenia</option>
														<option value="Solomon Islands">Solomon Islands</option>
														<option value="Somalia">Somalia</option>
														<option value="South Africa">South Africa</option>
														<option value="Spain">Spain</option>
														<option value="Sri Lanka">Sri Lanka</option>
														<option value="St Kitts &amp; Nevia">St Kitts &amp; Nevia
														</option>
														<option value="St Lucia">St Lucia</option>
														<option value="Sudan">Sudan</option>
														<option value="Surinam">Surinam</option>
														<option value="Swaziland">Swaziland</option>
														<option value="Sweden">Sweden</option>
														<option value="Switzerland">Switzerland</option>
														<option value="Syria">Syria</option>
														<option value="Taiwan">Taiwan</option>
														<option value="Tajikistan">Tajikistan</option>
														<option value="Tanzania">Tanzania</option>
														<option value="Thailand">Thailand</option>
														<option value="Tonga">Tonga</option>
														<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago
														</option>
														<option value="Tunisia">Tunisia</option>
														<option value="Turkey">Turkey</option>
														<option value="Turkmenistan">Turkmenistan</option>
														<option value="Turks &amp; Caicos Islands">Turks &amp; Caicos
															Islands</option>
														<option value="Tuvalu">Tuvalu</option>
														<option value="Uganda">Uganda</option>
														<option value="Ukraine">Ukraine</option>
														<option value="United Arab Emirates">United Arab Emirates
														</option>
														<option value="United Kingdom">United Kingdom</option>
														<option value="Uruguay">Uruguay</option>
														<option value="USA">USA</option>
														<option value="Uzbekistan">Uzbekistan</option>
														<option value="Vanuatu">Vanuatu</option>
														<option value="Venezuela">Venezuela</option>
														<option value="Vietnam">Vietnam</option>
														<option value="Wallis &amp; Futuna Islands">Wallis &amp; Futuna
															Islands</option>
														<option value="Yemen Arab Republic">Yemen Arab Republic</option>
														<option value="Zambia">Zambia</option>
														<option value="Zimbabwe">Zimbabwe</option>

													</select>
												</div>
												<div class="col-12">
													<label for="txtPassword" class="form-label">Password</label>
													<input name="txtPassword" type="password" maxlength="20"
														id="txtPassword" class="form-control" placeholder="Password" />
													<span id="RequiredFieldValidator3" style="display:none;">Password
														required</span>
												</div>



												<div class="col-12">
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox"
															id="flexSwitchCheckChecked">
														<label class="form-check-label" for="flexSwitchCheckChecked">I
															read and agree to Terms & Conditions</label>
														<span id="CheckBoxRequired" style="display:none;">accept Terms &
															Conditions</span>
													</div>
												</div>


												<div class="col-12">
													<div class="d-grid">
														<input type="submit" name="btnSubmit" value="Sign up"
															onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnSubmit&quot;,&quot;&quot;, true, &quot;ValidGroup&quot;, &quot;&quot;, false, false))"
															id="btnSubmit" class="btn btn-warning" />
													</div>
												</div>





												<script type="text/javascript">
													//<![CDATA[
													var Page_ValidationSummaries = new Array(document.getElementById("vs1"));
													var Page_Validators = new Array(document.getElementById("RequiredFieldValidator2"), document.getElementById("Rq23"), document.getElementById("RequiredFieldValidator7"), document.getElementById("RequiredFieldValidator4"), document.getElementById("RequiredFieldValidator6"), document.getElementById("RequiredFieldValidator8"), document.getElementById("REV1"), document.getElementById("RequiredFieldValidator1"), document.getElementById("RequiredFieldValidator5"), document.getElementById("RequiredFieldValidator3"), document.getElementById("CheckBoxRequired"));
													//]]>
												</script>

												<script type="text/javascript">
													//<![CDATA[
													var vs1 = document.all ? document.all["vs1"] : document.getElementById("vs1");
													vs1.validationGroup = "ValidGroup";
													var RequiredFieldValidator2 = document.all ? document.all["RequiredFieldValidator2"] : document.getElementById("RequiredFieldValidator2");
													RequiredFieldValidator2.controltovalidate = "txtReffer";
													RequiredFieldValidator2.focusOnError = "t";
													RequiredFieldValidator2.errormessage = "Sponsor ID required";
													RequiredFieldValidator2.display = "Dynamic";
													RequiredFieldValidator2.validationGroup = "ValidGroup";
													RequiredFieldValidator2.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator2.initialvalue = "";
													var Rq23 = document.all ? document.all["Rq23"] : document.getElementById("Rq23");
													Rq23.controltovalidate = "ddlSide";
													Rq23.focusOnError = "t";
													Rq23.errormessage = "Select side";
													Rq23.display = "Dynamic";
													Rq23.validationGroup = "ValidGroup";
													Rq23.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													Rq23.initialvalue = "0";
													var RequiredFieldValidator7 = document.all ? document.all["RequiredFieldValidator7"] : document.getElementById("RequiredFieldValidator7");
													RequiredFieldValidator7.controltovalidate = "txtPromoterName";
													RequiredFieldValidator7.focusOnError = "t";
													RequiredFieldValidator7.errormessage = "Your name required";
													RequiredFieldValidator7.display = "Dynamic";
													RequiredFieldValidator7.validationGroup = "ValidGroup1";
													RequiredFieldValidator7.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator7.initialvalue = "";
													var RequiredFieldValidator4 = document.all ? document.all["RequiredFieldValidator4"] : document.getElementById("RequiredFieldValidator4");
													RequiredFieldValidator4.controltovalidate = "txtPromoterName";
													RequiredFieldValidator4.focusOnError = "t";
													RequiredFieldValidator4.errormessage = "Your name required";
													RequiredFieldValidator4.display = "Dynamic";
													RequiredFieldValidator4.validationGroup = "ValidGroup";
													RequiredFieldValidator4.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator4.initialvalue = "";
													var RequiredFieldValidator6 = document.all ? document.all["RequiredFieldValidator6"] : document.getElementById("RequiredFieldValidator6");
													RequiredFieldValidator6.controltovalidate = "txtEmail";
													RequiredFieldValidator6.focusOnError = "t";
													RequiredFieldValidator6.errormessage = "Email required";
													RequiredFieldValidator6.display = "Dynamic";
													RequiredFieldValidator6.validationGroup = "ValidGroup";
													RequiredFieldValidator6.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator6.initialvalue = "";
													var RequiredFieldValidator8 = document.all ? document.all["RequiredFieldValidator8"] : document.getElementById("RequiredFieldValidator8");
													RequiredFieldValidator8.controltovalidate = "txtEmail";
													RequiredFieldValidator8.focusOnError = "t";
													RequiredFieldValidator8.errormessage = "Email required";
													RequiredFieldValidator8.display = "Dynamic";
													RequiredFieldValidator8.validationGroup = "ValidGroup1";
													RequiredFieldValidator8.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator8.initialvalue = "";
													var REV1 = document.all ? document.all["REV1"] : document.getElementById("REV1");
													REV1.controltovalidate = "txtEmail";
													REV1.focusOnError = "t";
													REV1.errormessage = "Invalid email ID";
													REV1.display = "Dynamic";
													REV1.validationGroup = "ValidGroup";
													REV1.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
													REV1.validationexpression = "\\w+([-+.\']\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*";
													var RequiredFieldValidator1 = document.all ? document.all["RequiredFieldValidator1"] : document.getElementById("RequiredFieldValidator1");
													RequiredFieldValidator1.controltovalidate = "txtMobile";
													RequiredFieldValidator1.focusOnError = "t";
													RequiredFieldValidator1.errormessage = "Mobile number required";
													RequiredFieldValidator1.display = "Dynamic";
													RequiredFieldValidator1.validationGroup = "ValidGroup";
													RequiredFieldValidator1.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator1.initialvalue = "";
													var RequiredFieldValidator5 = document.all ? document.all["RequiredFieldValidator5"] : document.getElementById("RequiredFieldValidator5");
													RequiredFieldValidator5.controltovalidate = "txtState";
													RequiredFieldValidator5.focusOnError = "t";
													RequiredFieldValidator5.errormessage = "State name required";
													RequiredFieldValidator5.display = "Dynamic";
													RequiredFieldValidator5.validationGroup = "ValidGroup";
													RequiredFieldValidator5.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator5.initialvalue = "";
													var RequiredFieldValidator3 = document.all ? document.all["RequiredFieldValidator3"] : document.getElementById("RequiredFieldValidator3");
													RequiredFieldValidator3.controltovalidate = "txtPassword";
													RequiredFieldValidator3.focusOnError = "t";
													RequiredFieldValidator3.errormessage = "Password required";
													RequiredFieldValidator3.display = "Dynamic";
													RequiredFieldValidator3.validationGroup = "ValidGroup";
													RequiredFieldValidator3.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
													RequiredFieldValidator3.initialvalue = "";
													var CheckBoxRequired = document.all ? document.all["CheckBoxRequired"] : document.getElementById("CheckBoxRequired");
													CheckBoxRequired.errormessage = "accept Terms & Conditions";
													CheckBoxRequired.display = "Dynamic";
													CheckBoxRequired.validationGroup = "ValidGroup";
													CheckBoxRequired.evaluationfunction = "CustomValidatorEvaluateIsValid";
													CheckBoxRequired.clientvalidationfunction = "ValidateCheckBox";
													//]]>
												</script>


												<script type="text/javascript">
													//<![CDATA[

													var Page_ValidationActive = false;
													if (typeof (ValidatorOnLoad) == "function") {
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
		<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
		<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
		<!--Password show & hide js -->

		<!--app JS-->
		<script src="assets/js/app.js"></script>
		<script type="text/javascript">
			function companySponsorID() {
				$("#txtReffer").val("Z679277");
				$("#txtReffer").focus();
			}
		</script>
</body>

</html>