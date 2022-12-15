<?php
session_start();

// Connect database
include "./config/db.php";




    //Get access code
    if (isset($_POST['access_code_btn'])) {

        $id = $conn->real_escape_string($_POST['id']);
        $userID = $conn->real_escape_string($_POST['userID']);
        $visitorsName = $conn->real_escape_string($_POST['visitorsName']);
        $visitDate = $conn->real_escape_string($_POST['visitDate']);
        $visitTime = $conn->real_escape_string($_POST['visitTime']);
        $code = 'ASC'.rand(1000, 9999);

        $query = "INSERT INTO accessCode (userID, visitorsName, visitDate, visitTime, code)"
            . "VALUES ('$userID', '$visitorsName', '$visitDate', '$visitTime', '$code')";

        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {

            $_SESSION['code'] = $code;
            $_SESSION['success_message'] = "Access code created...you're being redirected.";
            header('location: access-success');
        }
        else {
            $_SESSION['error_message'] = "Error generating access code.";
        }
    }


//Staff Query Response
// if(isset($_POST['query_response_btn'])) {

//     $response = $conn->real_escape_string($_POST['response']);

//     $id = $_SESSION['id'];
//     $sql=mysqli_query($conn,"SELECT * FROM queries where staffID='".$_SESSION['id']."'");
//     $result=mysqli_fetch_array($sql);
//     if($result>0)
//     {
//         $conn=mysqli_query($conn,"UPDATE queries SET response='$response' where staffID='".$_SESSION['id']."'");
//         $_SESSION['success_message'] = "Response Sent! 👍";
//         header('location: queries');
//     }
//     else
//     {
//         $_SESSION['error_message'] = "Error updating response.";
//         header('location: queries');
//     }
// }

