<?php

session_start();
$db_host = "localhost";
$db_user = 'root';
$db_pass = 'janish11';
$db_name = 'mahakplfinance_spa';
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$conn) {
  echo "Not connect";
}
if (isset($_POST['toggleStatus'])) {
    $userId = $_POST['user_id'];

    // Fetch the current status from the database
    $query = "SELECT isActive FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $currentStatus = $row['isActive'];
    
    // Toggle the status
    $newStatus = $currentStatus ? 0 : 1;

    // Update the status back to the database
    $updateQuery = "UPDATE users SET isActive = ? WHERE user_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ii', $newStatus, $userId);
    $stmt->execute();

    // Redirect back to the original page to reflect the changes
    header("Location:../agent_list.php");
    exit;
}

if (isset($_REQUEST['approve_loan'])) {
  $rerq_id=$_REQUEST['req_id'];
  $date=date("Y-m-d");
  mysqli_query($conn,"UPDATE `loan` SET `status`='1',`approve_date`='$date' WHERE `id`='$rerq_id'");
  header("Location:../loan_request.php");
}
if (isset($_REQUEST['approve_loan'])) {
    $rerq_id = $_REQUEST['req_id'];
    $date = date("Y-m-d");
    
    // Get the loan amount for the request
    $result = mysqli_query($conn, "SELECT `amt` FROM `loan` WHERE `id`='$rerq_id'");
    $row = mysqli_fetch_assoc($result);
    $loan_amount = $row['amt'];
    
    // Determine the EMI amount based on the approved loan amount
    $emi_duration = 0;
    if ($loan_amount == 25000) {
        $emi_duration = 10;
    } elseif ($loan_amount == 50000) {
        $emi_duration = 12;
    } elseif ($loan_amount == 100000) {
        $emi_duration = 18;
    }
    $emi_amount = $loan_amount / $emi_duration;

    // Store the EMI details in the emi table
    mysqli_query($conn, "INSERT INTO `emi` (`req_id`, `emi_amount`, `duration`, `remaining_payments`) VALUES ('$rerq_id', '$emi_amount', '$emi_duration', '$emi_duration')");
    
    // Update the withdrawal request as approved
    mysqli_query($conn, "UPDATE `loan` SET `status`='1', `approve_date`='$date' WHERE `id`='$rerq_id'");
    
    header("Location:../loan_request.php");
}

if (isset($_REQUEST['transfer_pair_income'])) {
  $user_id=$_REQUEST['user_id'];
  $amt=$_REQUEST['amount'];
  $date=$_REQUEST['date'];
  mysqli_query($conn,"UPDATE `users` SET `wallet`=`wallet`+$amt WHERE `user_id`='$user_id'");
  mysqli_query($conn,"UPDATE `pair_count` SET `status`=1 WHERE `user_id`='$user_id' AND `date`='$date'");
  mysqli_query($conn,"INSERT INTO `income_history`( `user_id`, `amt`, `desp`, `cr_dr`) VALUES ('$user_id','$amt','PAIR INCOME','0')");
  header("Location:../transfer_pair_income.php");
}



if (isset($_REQUEST['profile_update_password'])) {
  $my_id=$_REQUEST['my_user_id'];
  $password=$_REQUEST['password'];
  $c_password=$_REQUEST['confirm_password'];
  if ($password==$c_password) {
    mysqli_query($conn,"UPDATE `users` SET `password`='$c_password' WHERE `user_id`='$my_id'");
  }
  header("location:../profile.php?myid=$my_id");
}

if (isset($_REQUEST['profile_update_basic'])) {
  $my_id=$_REQUEST['my_user_id'];
  $dob=$_REQUEST['dob'];
  $gender=$_REQUEST['gender'];
  $address=$_REQUEST['address'];
  $pan_no=$_REQUEST['pan_no'];
  $aadhar_no=$_REQUEST['aadhar_no'];
  $mob=$_REQUEST['mob'];
  $status=$_REQUEST['status'];
  mysqli_query($conn,"UPDATE `users` SET `status`='$status', `mobile`='$mob',`dob`='$dob',`gender`='$gender',`address`='$address',`panno`='$pan_no',`aadharno`='$aadhar_no' WHERE `user_id`='$my_id'");
  header("Location:../profile.php?myid=$my_id");
}

if (isset($_REQUEST['login'])) {
  $user_id=$_REQUEST['user_id'];
  $password=$_REQUEST['password'];
  move_to_dashboard($user_id,$password);
}


function binary_count($spons,$pos){
  global $conn;
  if ($pos==0) {
    $pos="left_count";
  } else {
    $pos="right_count";
  }
  while ($spons!=0) {
    mysqli_query($conn,"UPDATE `users` SET `$pos`=`$pos`+1 WHERE `user_id`='$spons'");
    is_pair_generate($spons);
    $pos=find_position($spons);
    $spons=find_placement_id($spons);
  }
}

function is_pair_generate($spons){
  global $conn;
  $pla_data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons'"));
  if ($pla_data['left_count']==$pla_data['right_count']) {
    $date=date("Y-m-d");
    $data=mysqli_query($conn,"SELECT * FROM `pair_count` WHERE `date`='$date' AND `user_id`='$spons'");
    if (mysqli_num_rows($data)==1) {
      mysqli_query($conn,"UPDATE `pair_count` SET `no_of_pair`=`no_of_pair`+1 WHERE `date`='$date' AND `user_id`='$spons'");
    } else {
      mysqli_query($conn,"INSERT INTO `pair_count`(`user_id`, `date`, `no_of_pair`) VALUES ('$spons','$date','1')");
    }
  }
}







function level_distribution($s_id){
  global $conn;
  $a=0;
  $income=[20,10,5,5,5,5];
  while ($a < 6 && $s_id!=0) {
    mysqli_query($conn,"UPDATE `users` SET `wallet`=`wallet`+$income[$a] WHERE `user_id`='$s_id'");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `cr_dr`) VALUES ('$s_id','$income[$a]','Level Income','0')");
    $next_id=find_sponsor_id($s_id);
    $s_id=$next_id;
  }

}


function find_position($s_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  $pos=$data['position'];
  if ($pos==0) {
    $pos="left_count";
  } else {
    $pos="right_count";
  }
  return $pos;
}

function move_to_dashboard($user_id,$pass){
  global $conn;
  $query=mysqli_query($conn,"SELECT * FROM `admin` WHERE `user_id`='$user_id' AND `password`='$pass'");
  if (mysqli_num_rows($query)==1) {
    $_SESSION['session_id']=session_id();
    $_SESSION['user_id']=$user_id;
    header("Location:../dashboard.php");
  } else {
    header("Location:../login.php");
  }
}
 ?>
