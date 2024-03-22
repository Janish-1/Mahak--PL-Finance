<!doctype html>
<html lang="en">
<head>
  <?php
    include_once("element/connection.php");
   ?>

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
    <title>Your EMIs</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <?php
            include_once("element/sidebar.php");
        ?>

        <div class="dashboard-wrapper">
            <div class="dashboard-influence">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Your EMI Details</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>Loan Amount</th>
                                                    <th>EMI Amount</th>
                                                    <th>Duration (months)</th>
                                                    <th>Remaining Payments</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT e.id, e.emi_amount, e.duration, e.remaining_payments, l.amt as loan_amount 
                                                          FROM emi e
                                                          JOIN loan l ON e.req_id = l.id
                                                          WHERE l.user_id = '$my_id'";

                                                $result = mysqli_query($conn, $query);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['loan_amount'] . "</td>";
                                                        echo "<td>" . $row['emi_amount'] . "</td>";
                                                        echo "<td>" . $row['duration'] . "</td>";
                                                        echo "<td>" . $row['remaining_payments'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No EMI records found.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
    </div>
</body>
</html>
