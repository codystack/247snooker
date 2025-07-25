<?php
// Connect database
include "./config/db.php";


    //Send Report
    if (isset($_POST['send_report_btn'])) {

        $id = $conn->real_escape_string($_POST['id']);
        $staffID = $conn->real_escape_string($_POST['staffID']);
        $branch = $conn->real_escape_string($_POST['branch']);
        $staffName = $conn->real_escape_string($_POST['staffName']);
        $workShift = $conn->real_escape_string($_POST['workShift']);
        $salesCash = $conn->real_escape_string($_POST['salesCash']);
        $fcmbAmount = $conn->real_escape_string($_POST['fcmbAmount']);
        $firstBankAmount = $conn->real_escape_string($_POST['firstBankAmount']);
        $diamondBankAmount = $conn->real_escape_string($_POST['diamondBankAmount']);
        $sterlingBankAmount = $conn->real_escape_string($_POST['sterlingBankAmount']);
        $zenithBankAmount = $conn->real_escape_string($_POST['zenithBankAmount']);
        $titanBankAmount = $conn->real_escape_string($_POST['titanBankAmount']);
        $gtBankAmount = $conn->real_escape_string($_POST['gtBankAmount']);
        $othersAmount = $conn->real_escape_string($_POST['othersAmount']);
        $creditSales = $conn->real_escape_string($_POST['creditSales']);
        $directTransferTitan = $conn->real_escape_string($_POST['directTransferTitan']);
        $directTransferOthers = $conn->real_escape_string($_POST['directTransferOthers']);
        $moneyTransferCash = $conn->real_escape_string($_POST['moneyTransferCash']);
        $moneyTransferCharges = $conn->real_escape_string($_POST['moneyTransferCharges']);
        $moneyTransferPos = $conn->real_escape_string($_POST['moneyTransferPos']);
        $voucherNetCash = $conn->real_escape_string($_POST['voucherNetCash']);
        $voucherNetPos = $conn->real_escape_string($_POST['voucherNetPos']);
        $changeOwed = $conn->real_escape_string($_POST['changeOwed']);
        $changeGivenOut = $conn->real_escape_string($_POST['changeGivenOut']);
        $cashPaidOut = $conn->real_escape_string($_POST['cashPaidOut']);
        $cashBalance = $conn->real_escape_string($_POST['cashBalance']);
        $reportRef = 'BKP'.rand(10000000000, 9999);
        $staffComment = $conn->real_escape_string($_POST['staffComment']);
        $status = $conn->real_escape_string($_POST['status']);



        $query = "INSERT INTO report (staffID, branch, staffName, workShift, salesCash, fcmbAmount, firstBankAmount, diamondBankAmount, sterlingBankAmount, zenithBankAmount, titanBankAmount, gtBankAmount, othersAmount, creditSales, directTransferTitan, directTransferOthers, moneyTransferCash, moneyTransferCharges, moneyTransferPos, voucherNetCash, voucherNetPos, changeOwed, changeGivenOut, cashPaidOut, cashBalance, reportRef, staffComment, status)"
            . "VALUES ('$staffID', '$branch', '$staffName', '$workShift', '$salesCash', '$fcmbAmount', '$firstBankAmount', '$diamondBankAmount', '$sterlingBankAmount', '$zenithBankAmount', '$titanBankAmount', '$gtBankAmount', '$othersAmount', '$creditSales', '$directTransferTitan', '$directTransferOthers', '$moneyTransferCash', '$moneyTransferCharges', '$moneyTransferPos', '$voucherNetCash', '$voucherNetPos', '$changeOwed', '$changeGivenOut', '$cashPaidOut', '$cashBalance', '$reportRef', '$staffComment', 'Pending')";

        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['success_message'] = "Nice one champ👍  <strong>Report Sent!</strong>";
            echo "<meta http-equiv='refresh' content='3; URL=dashboard'>";
        }
        else {
            $_SESSION['error_message'] = "Error sending report.";
            echo "<meta http-equiv='refresh' content='3; URL=create-report'>";
        }

}

    //Staff Query Response
    if(isset($_POST['query_response_btn'])) {

        $response = $conn->real_escape_string($_POST['response']);

        $id = $_SESSION['id'];
        $sql=mysqli_query($conn,"SELECT * FROM queries where staffID='".$_SESSION['id']."'");
        $result=mysqli_fetch_array($sql);
        if($result>0)
        {
            $conn=mysqli_query($conn,"UPDATE queries SET response='$response' where staffID='".$_SESSION['id']."'");
            $_SESSION['success_message'] = "Response Sent! 👍";
            header('location: queries');
        }
        else
        {
            $_SESSION['error_message'] = "Error updating response.";
            header('location: queries');
        }
    }



    //Happy Hour Plan query
    if (isset($_POST['place_bet_btn'])) {

        $userID = $conn->real_escape_string($_POST['userID']);
        $contestantID = $conn->real_escape_string($_POST['contestantID']);
        $odd = $conn->real_escape_string($_POST['odd']);
        $bet_amount = $conn->real_escape_string($_POST['bet_amount']);
        $potential_win = $conn->real_escape_string($_POST['potential_win']);


        $check_user_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $check_user_query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["wallet"] && $row["wallet"] >= $bet_amount) {

                    $walletNewAmount = floor($row["wallet"] - $bet_amount);

                    $query = "INSERT INTO bet (userID, contestantID, odd, bet_amount, potential_win)"
                        . "VALUES ('$userID', '$contestantID', '$odd', '$bet_amount', '$potential_win')";

                    mysqli_query($conn, $query);
                    if (mysqli_affected_rows($conn) > 0) {

                        //update user wallet
                        $update = "UPDATE users SET wallet='$walletNewAmount' WHERE id ='".$_SESSION['id']."'";
                        mysqli_query($conn, $update);

                        $_SESSION['bet_success_message_title'] = "Bet Placed";
                        $_SESSION['bet_success_message'] = "Your bet has been placed 👍";
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