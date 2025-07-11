<?php
// Connect database
include "./config/db.php";

//Add Bank Account Query
if (isset ($_POST['add-account-btn'])) {
    
    $userID = $conn->real_escape_string($_POST['userID']);
    $accountName = $conn->real_escape_string($_POST['accountName']);
    $accountNumber = $conn->real_escape_string($_POST['accountNumber']);
    $bankCode = $conn->real_escape_string($_POST['bankCode']);

    $bank_query = "INSERT INTO bankaccounts (userID, accountName, accountNumber, bankCode)"
                . "VALUES ('$userID', '$accountName', '$accountNumber', '$bankCode')";

    mysqli_query($conn, $bank_query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['success_message'] = "Nice one champ👍 <strong>account details added!</strong>";
        echo "<meta http-equiv='refresh' content='3; URL=bank'>";
    }else {
        $_SESSION['error_message'] = "Error adding account details.".mysqli_error($conn);
        echo "<meta http-equiv='refresh' content='3; URL=add-account'>";
    }
}


//Delete Bank Account Query
if (isset($_POST['delete_user'])) {

    $delete_query = "DELETE FROM bankaccounts WHERE userID='".$_SESSION['id']."'";
    mysqli_query($conn, $delete_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['successx_message_title'] = "Account Deleted";
        $_SESSION['successx_message'] = "Welldone Chief 👍 account deleted successfully!";
    } else {
        $_SESSION['errors_message'] = "Please <strong>Delete</strong> other records linked to this user.";
        echo '<meta http-equiv="refresh" content="3; URL=bank">';
    }
}