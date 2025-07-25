<?php
    session_start();

    $ref = $_GET['reference']; 
    if ($ref == "") {
        header("location:javascript://history.go(-1)");
    }
?>

<?php
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_5d6783e74e8fa8b86123da4b4a628806701a5cd5",
        "Cache-Control: no-cache",
        ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // echo $response;
        $result = json_decode($response);
    }

    if ($result->data->status == 'success') {

        $userID = $_SESSION['id'];
        $status = $result->data->status;
        $transactionRef = $result->data->reference;
        $paidAmount = $result->data->amount / 100;
        $paymentMethod = $result->data->channel;
        $firstName = $result->data->customer->first_name;
        $lastName = $result->data->customer->last_name;
        $userEmail = $result->data->customer->email;
        $invoiceID = '#' . rand(1000, 9999);

        //Connect database
        include "./config/db.php";


        $check_user_query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $check_user_query);
        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["wallet"] && $row["wallet"] || $paidAmount) {


                    $walletNewAmount = floor($row["wallet"] + $paidAmount);


                    $query = "INSERT INTO transactions (userID, status, transactionRef, paidAmount, firstName, lastName, userEmail, paymentMethod, invoiceID)
                        VALUES ('$userID', '$status', '$transactionRef', '$paidAmount', '$firstName', '$lastName', '$userEmail', '$paymentMethod', '$invoiceID')";
                    
                    mysqli_query($conn, $query);
                    if (mysqli_affected_rows($conn) > 0) {
                        //update user wallet
                        $update = "UPDATE users SET wallet=$walletNewAmount WHERE id ='".$_SESSION['id']."'";
                        mysqli_query($conn, $update);
                        
                        $_SESSION['transactionRef'] = $transactionRef;
                        header("location: payment-success?status=success");
                    } else {
                        echo 'Error Occured'. mysqli_error($conn);
                        exit;
                    }
                }
            }
        }else {
            header("location: error");
            exit;
        }
    }
?>