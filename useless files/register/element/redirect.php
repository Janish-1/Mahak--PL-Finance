<?php
session_start();

// Database connection parameters
$db_host = "localhost";
$db_user = 'mahakplfinance_spa';
$db_pass = 'Mahak@2023';
$db_name = 'mahakplfinance_spa';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle user login
if (isset($_REQUEST['login'])) {
    $user_id = $_REQUEST['user_id'];
    $password = $_REQUEST['password'];
    move_to_dashboard($user_id, $password);
}

// Toggle user status between active and inactive
if (isset($_POST['toggleStatus'])) {
    toggle_user_status($_POST['user_id']);
}



// Handle profile update for password
if (isset($_REQUEST['profile_update_password'])) {
    update_password($_REQUEST['my_user_id'], $_REQUEST['password'], $_REQUEST['confirm_password']);
}

// Handle profile update for basic information
if (isset($_REQUEST['profile_update_basic'])) {
    update_basic_info($_REQUEST);
}

// Handle withdrawal request
if (isset($_REQUEST['withdrawl_request'])) {
    handle_withdrawal_request($_REQUEST['user_id'], $_REQUEST['amount']);
}

// Handle loan request
if (isset($_REQUEST['loan_request'])) {
    handle_loan_request($_REQUEST['user_id'], $_REQUEST['amount']);
}

// Redirects the user to the dashboard if the credentials are correct
function move_to_dashboard($user_id, $pass) {
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id`='$user_id' AND `password`='$pass' AND `status`='0'");
    
    if (mysqli_num_rows($query) == 1) {
        $_SESSION['session_id'] = session_id();
        $_SESSION['user_id'] = $user_id;
        header("Location:../dashboard.php");
    } else {
        $_SESSION['alert'] = "Login failed. Please check your credentials.";
        header("Location:../login.php");
    }
}



// Additional functions for handling user registration, updating profiles, withdrawals, etc.
// ...


if (isset($_REQUEST['user_registration'])) {
    $s_id = $_REQUEST['sponsor_id'];
    $name = $_REQUEST['user_name'];
    $pos = $_REQUEST['position'];
    $mobile = $_REQUEST['user_mob'];
    $password = $_REQUEST['password'];

    insert_into_users($s_id, $name, $pos, $mobile, $password);

   header("Location:../registration.php");
}

function insert_into_users($s_id, $name, $pos, $mobile, $password) {
    global $conn;

    // Generate a unique user code in the desired format
    $characters = "AB1CDE2FG3HI4JK5LM6NO7PQ8RS9TU0VQXYZ";
    $user_code = "";
    for ($i = 0; $i < 8; $i++) {
        $user_code .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Get the current datetime
    $current_datetime = date("Y-m-d H:i:s");

    mysqli_query($conn, "INSERT INTO `users`(`user_id`, `name`, `password`, `mobile`, `position`, `sponsor_id`, `registration_date`) VALUES ('$user_code', '$name', '$password', '$mobile', '$pos', '$s_id', '$current_datetime')");

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['alert'] = 'Registration successful!';
    } else {
        $_SESSION['alert'] = 'Registration failed. Please try again.';
    }

     level_distribution($s_id);
    placement_id($user_code, $s_id, $pos);


    // Generate the referral link based on the user's unique ID
    $referral_link = "/register?refer=" . $user_id;

    return $referral_link; // Return the generated referral link
}


if (!function_exists('insert_into_pair')) {
    function insert_into_pair($spons) {

function insert_into_pair($spons) {
    global $conn;
    $date = date("Y-m-d");
    
    // Prepared statement to check if a record exists for the given user and date
    $stmt = $conn->prepare("SELECT * FROM `pair_count` WHERE `date` = ? AND `user_id` = ?");
    $stmt->bind_param("ss", $date, $spons);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        // If a record exists, increment the no_of_pair by 1
        $stmt = $conn->prepare("UPDATE `pair_count` SET `no_of_pair` = `no_of_pair` + 1 WHERE `date` = ? AND `user_id` = ?");
        $stmt->bind_param("ss", $date, $spons);
        $stmt->execute();
    } else {
        // If no record exists, insert a new one with no_of_pair set to 1
        $stmt = $conn->prepare("INSERT INTO `pair_count`(`user_id`, `date`, `no_of_pair`) VALUES (?, ?, 1)");
        $stmt->bind_param("ss", $spons, $date);
        $stmt->execute();
    }
    $stmt->close();
}
}
}


if (isset($_REQUEST['profile_update_password'])) {
  $my_id=$_REQUEST['my_user_id'];
  $password=$_REQUEST['password'];
  $c_password=$_REQUEST['confirm_password'];
  if ($password==$c_password) {
    mysqli_query($conn,"UPDATE `users` SET `password`='$c_password' WHERE `user_id`='$my_id'");
  }
  header("location:../profile.php");
}

if (isset($_REQUEST['profile_update_basic'])) {
  $my_id=$_REQUEST['my_user_id'];
  $dob=$_REQUEST['dob'];
  $gender=$_REQUEST['gender'];
  $address=$_REQUEST['address'];
  $pan_no=$_REQUEST['pan_no'];
  $aadhar_no=$_REQUEST['aadhar_no'];
  $mob=$_REQUEST['mob'];
  mysqli_query($conn,"UPDATE `users` SET `mobile`='$mob',`dob`='$dob',`gender`='$gender',`address`='$address',`panno`='$pan_no',`aadharno`='$aadhar_no' WHERE `user_id`='$my_id'");
  header("Location:../profile.php");
}

if (isset($_REQUEST['withdrawl_request'])) {
  $amt=$_REQUEST['amount'];
  $user_id=$_REQUEST['user_id'];
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT `wallet` FROM `users` WHERE `user_id`='$user_id'"));
  if ($amt<=$data['wallet']) {
    $date=date("Y-m-d");
    mysqli_query($conn,"UPDATE `users` SET `wallet`=`wallet`-$amt WHERE `user_id`='$user_id'");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `cr_dr`) VALUES ('$user_id','$amt','withdraw','1')");
    mysqli_query($conn,"INSERT INTO `witdrawl`( `user_id`, `amt`, `request_date`) VALUES ('$user_id','$amt','$date')");
  }
  header("Location:../withdraw.php");
}

if (isset($_REQUEST['loan_request'])) {
    $amt = $_REQUEST['amount'];
    $user_id = $_REQUEST['user_id'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT `wallet` FROM `users` WHERE `user_id`='$user_id'"));

    // Predefined loan amounts
    $allowed_amounts = [25000, 50000, 100000, 200000];

    // Check if the requested loan amount is valid and within the user's wallet
    if (in_array($amt, $allowed_amounts) && $amt <= $data['wallet']) {
        $date = date("Y-m-d");
        mysqli_query($conn, "UPDATE `users` SET `wallet`=`wallet`-$amt WHERE `user_id`='$user_id'");
        mysqli_query($conn, "INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `cr_dr`) VALUES ('$user_id','$amt','loan','1')");
        mysqli_query($conn, "INSERT INTO `loan`( `user_id`, `amt`, `request_date`) VALUES ('$user_id','$amt','$date')");
    }

    header("Location:../loan.php");
}






function binary_count($spons,$pos){
  global $conn;
  if ($pos==0) {
    $pos="left_count";
  } else {
    $pos="right_count";
  }
  $spons=find_placement_id($spons);
  while ($spons!=0) {
    mysqli_query($conn,"UPDATE `users` SET `$pos`=`$pos`+1 WHERE `user_id`='$spons'");
    $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons'"));
    $is_first_pair_generate=$data['is_first_pair'];
    if ($is_first_pair_generate) {
      is_pair_generate($spons,$pos);
    } else {
      check_first_pair_condition($spons);
    }
    $pos=find_position($spons);
    $spons=find_placement_id($spons);
  }
}

function check_first_pair_condition($spons){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$spons'"));
  $left_count=$data['left_count'];
  $right_count=$data['right_count'];
  if ($left_count>0 && $right_count>0) {
    if ($left_count>$right_count || $left_count<$right_count) {
      if ($left_count>$right_count) {
        mysqli_query($conn,"UPDATE `users` SET `is_first_pair`='1',`pair_deduct`='left_count',`left_count`=`left_count`-1 WHERE `user_id`='$spons'");
        insert_into_pair($spons);
      } else {
        mysqli_query($conn,"UPDATE `users` SET `is_first_pair`='1',`pair_deduct`='right_count',`right_count`=`right_count`-1 WHERE `user_id`='$spons'");
      }
      insert_into_pair($spons);
    }
  }
}

function is_pair_generate($spons, $pos) {
    global $conn;

    // Determine the opposite position
    $compare_pos = ($pos == "left_count") ? "right_count" : "left_count";

    // Fetch the sponsor's data
    $pla_data_query = "SELECT * FROM `users` WHERE `user_id`='$spons'";
    $pla_data_result = mysqli_query($conn, $pla_data_query);
    $pla_data = mysqli_fetch_array($pla_data_result);

    // Check if a pair is generated
    if ($pla_data[$pos] <= $pla_data[$compare_pos]) {
        insert_into_pair($spons);
    }
}


function insert_into_pair($spons) {
    global $conn;
    $date = date("Y-m-d");
    
    // Check if a record exists for the given user and date
    $data = mysqli_query($conn, "SELECT * FROM `pair_count` WHERE `date`='$date' AND `user_id`='$spons'");
    
    if (mysqli_num_rows($data) == 1) {
        // If a record exists, increment the no_of_pair by 1
        mysqli_query($conn, "UPDATE `pair_count` SET `no_of_pair`=`no_of_pair`+1 WHERE `date`='$date' AND `user_id`='$spons'");
    } else {
        // If no record exists, insert a new one with no_of_pair set to 1
        mysqli_query($conn, "INSERT INTO `pair_count`(`user_id`, `date`, `no_of_pair`) VALUES ('$spons', '$date', 1)");
    }
}





function placement_id($user_id, $s_id, $pos) {
    global $conn;

    // Fetch sponsor data
    $spons_data_query = "SELECT * FROM `users` WHERE `user_id`='$s_id'";
    $spons_data_result = mysqli_query($conn, $spons_data_query);
    $spons_data = mysqli_fetch_array($spons_data_result);

    if ($pos == 0) { // Left side
        if ($spons_data['left_side'] == 0) {
            // Place the new user on the left side of the sponsor
            mysqli_query($conn, "UPDATE `users` SET `left_side`='$user_id' WHERE `user_id`='$s_id'");
            mysqli_query($conn, "UPDATE `users` SET `placement_id`='$s_id' WHERE `user_id`='$user_id'");
            binary_count($user_id, $pos);
        } else {
            // If left side is occupied, search further down the left side
            placement_id($user_id, $spons_data['left_side'], $pos);
        }
    } else { // Right side
        if ($spons_data['right_side'] == 0) {
            // Place the new user on the right side of the sponsor
            mysqli_query($conn, "UPDATE `users` SET `right_side`='$user_id' WHERE `user_id`='$s_id'");
            mysqli_query($conn, "UPDATE `users` SET `placement_id`='$s_id' WHERE `user_id`='$user_id'");
            binary_count($user_id, $pos);
        } else {
            // If right side is occupied, search further down the right side
            placement_id($user_id, $spons_data['right_side'], $pos);
        }
    }
}

function level_distribution($s_id){
  global $conn;
  $a=0;
  $income=[500,250,125,125,125,125];
  while ($a < 6 && $s_id!=0) {
    mysqli_query($conn,"UPDATE `users` SET `wallet`=`wallet`+$income[$a] WHERE `user_id`='$s_id'");
    mysqli_query($conn,"INSERT INTO `income_history`(`user_id`, `amt`, `desp`, `cr_dr`) VALUES ('$s_id','$income[$a]','Level Income','0')");
    $next_id=find_sponsor_id($s_id);
    $s_id=$next_id;
    $a++;
  }

}

function find_sponsor_id($s_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  return $data['sponsor_id'];
}

function find_placement_id($s_id){
  global $conn;
  $data=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id`='$s_id'"));
  return $data['placement_id'];
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



mysqli_close($conn);
?>

