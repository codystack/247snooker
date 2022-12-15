<?php
// Connect database
include "./config/db.php";

//200 naira voucher query
if (isset($_POST['voucher_200_btn'])) {

    $agentPercentage = 10;
    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    $voucher = '20'.rand(10000000000, 9999);
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
                    . "VALUES ('$userID', '$voucherID', '$voucher', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    $newBonus = ($agentPercentage / 100) * $amount;

                    $bonusNewAmount = floor($row["bonus"] + $newBonus);

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount', bonus='$bonusNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Voucher Purchased";
                    $_SESSION['success_message'] = "Your voucher has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase voucher.";
            }
        }
    }
}

//500 naira voucher query
if (isset($_POST['voucher_500_btn'])) {

    $agentPercentage = 10;
    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    $voucher = '50'.rand(10000000000, 9999);
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
                    . "VALUES ('$userID', '$voucherID', '$voucher', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    $newBonus = ($agentPercentage / 100) * $amount;

                    $bonusNewAmount = floor($row["bonus"] + $newBonus);

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount', bonus='$bonusNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Voucher Purchased";
                    $_SESSION['success_message'] = "Your voucher has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase voucher.";
            }
        }
    }
}

//1000 naira voucher query
if (isset($_POST['voucher_1000_btn'])) {

    $agentPercentage = 10;
    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    $voucher = '10'.rand(10000000000, 9999);
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
                    . "VALUES ('$userID', '$voucherID', '$voucher', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    $newBonus = ($agentPercentage / 100) * $amount;

                    $bonusNewAmount = floor($row["bonus"] + $newBonus);

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount', bonus='$bonusNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Voucher Purchased";
                    $_SESSION['success_message'] = "Your voucher has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase voucher.";
            }
        }
    }
}

//2000 naira voucher query
if (isset($_POST['voucher_2000_btn'])) {

    $agentPercentage = 10;
    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    $voucher = '22'.rand(10000000000, 9999);
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
                    . "VALUES ('$userID', '$voucherID', '$voucher', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    $newBonus = ($agentPercentage / 100) * $amount;

                    $bonusNewAmount = floor($row["bonus"] + $newBonus);

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount', bonus='$bonusNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Voucher Purchased";
                    $_SESSION['success_message'] = "Your voucher has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase voucher.";
            }
        }
    }
}

//5000 naira voucher query
if (isset($_POST['voucher_5000_btn'])) {

    $agentPercentage = 10;
    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    $voucher = '50'.rand(10000000000, 9999);
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
                    . "VALUES ('$userID', '$voucherID', '$voucher', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    $newBonus = ($agentPercentage / 100) * $amount;

                    $bonusNewAmount = floor($row["bonus"] + $newBonus);

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount', bonus='$bonusNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Voucher Purchased";
                    $_SESSION['success_message'] = "Your voucher has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase voucher.";
            }
        }
    }
}

//custom voucher query
if (isset($_POST['voucher_custom_btn'])) {

    $agentPercentage = 10;
    $bonus = ($agentPercentage / 100) * $amount;
    $status = $conn->real_escape_string($_POST['status']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $voucherID = '#'.rand(1000, 9999);
    $voucher = '90'.rand(10000000000, 9999);
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
                    . "VALUES ('$userID', '$voucherID', '$voucher', '$amount', 'Active')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    $newBonus = ($agentPercentage / 100) * $amount;

                    $bonusNewAmount = floor($row["bonus"] + $newBonus);

                    //update user wallet
                    $update = "UPDATE users SET wallet='$walletNewAmount', bonus='$bonusNewAmount' WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['success_message_title'] = "Voucher Purchased";
                    $_SESSION['success_message'] = "Your voucher has been purchsed 👍";
                }else {
                    $error=$conn->error;
                    $_SESSION['message_title'] = "Error Occurred";
                    $_SESSION['message'] = $error;
                }
            }else {
                $_SESSION['message_title'] = "Insufficient Funds!";
                $_SESSION['message'] = "Topup wallet to purchase voucher.";
            }
        }
    }
}