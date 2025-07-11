<?php
// Connect database
include "./config/db.php";

//Happy Hour Plan query
if (isset($_POST['happy_hour_plan_btn'])) {

    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    // $voucher = '20'.rand(10000000000, 9999);
    $voucher = $conn->real_escape_string($_POST['voucher']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $status = $conn->real_escape_string($_POST['status']);
    $bonus = $conn->real_escape_string($_POST['bonus']);


    $check_user_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_user_query);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["wallet"] && $row["wallet"] >= $amount) {

                $walletNewAmount = floor($row["wallet"] - $amount);

                // $voucher = sha1($voucher);//encrypt the voucher before saving in the database
                $query = "INSERT INTO vouchers (userID, voucherID, voucher, amount, status)"
                    . "VALUES ('$userID', '$voucherID', 'Happy Hour', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Subscription Purchased";
                    $_SESSION['success_message'] = "Your subscription has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase subscription.";
            }
        }
    }
}

//Classic Plan query
if (isset($_POST['classic_plan_btn'])) {

    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    // $voucher = '20'.rand(10000000000, 9999);
    $voucher = $conn->real_escape_string($_POST['voucher']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $status = $conn->real_escape_string($_POST['status']);
    $bonus = $conn->real_escape_string($_POST['bonus']);
    


    $check_user_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_user_query);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["wallet"] && $row["wallet"] >= $amount) {

                $walletNewAmount = floor($row["wallet"] - $amount);

                // $voucher = sha1($voucher);//encrypt the voucher before saving in the database
                $query = "INSERT INTO vouchers (userID, voucherID, voucher, amount, status)"
                    . "VALUES ('$userID', '$voucherID', 'Classic', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Subscription Purchased";
                    $_SESSION['success_message'] = "Your subscription has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase subscription.";
            }
        }
    }
}

//Premium Plan query
if (isset($_POST['premium_plan_btn'])) {

    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    // $voucher = '20'.rand(10000000000, 9999);
    $voucher = $conn->real_escape_string($_POST['voucher']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $status = $conn->real_escape_string($_POST['status']);
    $bonus = $conn->real_escape_string($_POST['bonus']);
    


    $check_user_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_user_query);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["wallet"] && $row["wallet"] >= $amount) {

                $walletNewAmount = floor($row["wallet"] - $amount);

                // $voucher = sha1($voucher);//encrypt the voucher before saving in the database
                $query = "INSERT INTO vouchers (userID, voucherID, voucher, amount, status)"
                    . "VALUES ('$userID', '$voucherID', 'Premium', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Subscription Purchased";
                    $_SESSION['success_message'] = "Your subscription has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase subscription.";
            }
        }
    }
}
