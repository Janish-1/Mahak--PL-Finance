

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
<link rel="stylesheet" href="./css/dark-theame.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">



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
                                        <h3 class="">Forget Password</h3>
                                        <p>
                                            Sorry you are here! <a href="./login1.php">Sign in here</a>
                                        </p> 
                                    </div>
                                    <div class="form-body">
                                        <form method="post" action="./recover-password.php" onsubmit="javascript:return WebForm_OnSubmit();" id="form1" class="row g-3">
<div class="aspNetHidden">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwULLTEwMDE1OTk0NzhkZDtUznUsfNPeITwFaBr1zPlf/ktE" />
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

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="2C4F4A63" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAAPI3sEJoTAtDwXJXsQA2gLjDFTzKcXJqLg+OeJ6QAEa2hi08poMJjBwaT+xMGu1Ika6Y9noaLLGhZcq4ndMLrksP7WPaw==" />
</div>
                                            <div class="col-12">
                                                <div id="vs1" style="display:none;">

</div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Your User ID</label>
                                                <input name="txtUser" type="text" maxlength="50" id="txtUser" class="form-control" placeholder="Enter Your User ID .." />
                                                <span id="RequiredFieldValidator2" style="display:none;">User ID required</span>
                                            </div> 
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" name="btSubmit" value="Email My Password" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btSubmit&quot;, &quot;&quot;, true, &quot;ValidGroup&quot;, &quot;&quot;, false, false))" id="btSubmit" class="btn btn-warning" /> 
                                                </div>
                                            </div>
                                        
<script type="text/javascript">
//<![CDATA[
var Page_ValidationSummaries =  new Array(document.getElementById("vs1"));
var Page_Validators =  new Array(document.getElementById("RequiredFieldValidator2"));
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
</body>
</html>
