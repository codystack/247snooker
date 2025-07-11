<?php
// Connect database
include "./config/db.php";

//Add Bank Account Query
if (isset ($_POST['withdrawal-btn'])) {
    
    $userID = $conn->real_escape_string($_POST['userID']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $accountInfo = $conn->real_escape_string($_POST['accountInfo']);

    $check_user_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $check_user_query);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["bonus"] && $row["bonus"] >= $amount) {

                $bonusNewAmount = floor($row["bonus"] - $amount);

                
                $query = "INSERT INTO withdrawal (userID, amount, accountInfo)"
                    . "VALUES ('$userID', '$amount', '$accountInfo')";

                mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0) {

                    //update user bonus
                    $update = "UPDATE users SET bonus=$bonusNewAmount WHERE id ='".$_SESSION['id']."'";
                    mysqli_query($conn, $update);

                    $_SESSION['withdraw_success_message_title'] = "Withdrawal Successful";
                    $_SESSION['withdraw_success_message'] = "Your withdrawal will be proccessed within the next 24hrs.";
                }else {
                    $error=$conn->error;
                    $_SESSION['withdraw_message_title'] = "Error Occurred";
                    $_SESSION['withdraw_message'] = $error;
                }
            }else {
                $_SESSION['withdraw_message_title'] = "Insufficient Balance!";
                $_SESSION['withdraw_message'] = "Only available balance can be withdrawn.";
            }
        }
    }
}
