<?php

session_start();

$db_host = "localhost";
$db_user = 'mahakplfinance_spa';
$db_pass = 'Mahak@2023';
$db_name = 'mahakplfinance_spa';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}

if (isset($_SESSION['session_id']) && isset($_SESSION['user_id'])) {
  $my_id=$_SESSION['user_id'];
} else {
  header("Location:login.php");
}
#error_reporting(0);
 ?>
