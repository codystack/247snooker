<?php
// Connect database
include "./config/db.php";

//Send Support Request
if (isset($_POST['support_request_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $userID = $conn->real_escape_string($_POST['userID']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $purpose = $conn->real_escape_string($_POST['purpose']);
    $comment = $conn->real_escape_string($_POST['comment']);



    $query = "INSERT INTO support (userID, firstName, lastName, purpose, comment)"
        . "VALUES ('$userID', '$firstName', '$lastName', '$purpose', '$comment')";

    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        $_SESSION['success_message'] = "Nice one champ👍  <strong>Support Request Sent!</strong>";
        echo "<meta http-equiv='refresh' content='3; URL=support'>";
    }
    else {
        $_SESSION['error_message'] = "Error sending report.";
        echo "<meta http-equiv='refresh' content='3; URL=request-support'>";
    }

}