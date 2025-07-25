<?php
// Connect database
include "./config/db.php";
    

    //Update Admin Query
    if (isset($_POST['update_admin_btn'])) {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = $conn->real_escape_string($_POST['id']);
        $firstName = $conn->real_escape_string($_POST['firstName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $email = $conn->real_escape_string($_POST['email']);
        $designation = $conn->real_escape_string($_POST['designation']);
        $status = $conn->real_escape_string($_POST['status']);


        $sql=mysqli_query($conn,"SELECT * FROM admin where id='$id'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE admin SET firstName='$firstName', lastName='$lastName', email='$email', designation='$designation', status='$status' WHERE id='$id'");

            $_SESSION['success_message'] = "Admin account updated 👍";
            echo "<meta http-equiv='refresh' content='0; URL=edit-admin?id=$id'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error updating account".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=edit-admin?id=$id'>";
            exit();

        }

    }


    //Update Admin Password Query
    if (isset($_POST['update_admin_password_btn'])) {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = $conn->real_escape_string($_POST['id']);
        $password = $conn->real_escape_string($_POST['password']);


        $sql=mysqli_query($conn,"SELECT * FROM admin where id='$id'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $password = sha1('123456');
            $conn=mysqli_query($conn,"UPDATE admin SET password='$password' WHERE id='$id'");

            $_SESSION['success_message'] = "Admin password changed to default";
            echo "<meta http-equiv='refresh' content='0; URL=edit-admin?id=$id'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error changing password".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=edit-admin?id=$id'>";
            exit();

        }

    }



    //Update Support Query
    if (isset($_POST['update_support_btn'])) {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = $conn->real_escape_string($_POST['id']);
        $status = $conn->real_escape_string($_POST['status']);


        $sql=mysqli_query($conn,"SELECT * FROM support where id='$id'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE support SET status='Answered' WHERE id='$id'");

            $_SESSION['success_message'] = "Support Enquiry Closed";
            echo "<meta http-equiv='refresh' content='0; URL=view-support?id=$id'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error closing support enquiry".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=view-support?id=$id'>";
            exit();

        }

    }


    //Update Quote Query
    if (isset($_POST['update_quote_btn'])) {

        $quoteID = isset($_GET['quoteID']) ? $_GET['quoteID'] : '';

        $quoteID = $conn->real_escape_string($_POST['quoteID']);
        $status = $conn->real_escape_string($_POST['status']);


        $sql=mysqli_query($conn,"SELECT * FROM quote where quoteID='$quoteID'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE quote SET status='Closed' WHERE quoteID='$quoteID'");

            $_SESSION['success_message'] = "Quote Request Closed";
            echo "<meta http-equiv='refresh' content='0; URL=view-quote?id=$quoteID'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error closing quote request".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=view-quote?id=$quoteID'>";
            exit();

        }

    }



    //Update Service Query
    if (isset($_POST['update_service_btn'])) {

        $serviceID = isset($_GET['serviceID']) ? $_GET['serviceID'] : '';

        $serviceID = $conn->real_escape_string($_POST['serviceID']);
        $title = $conn->real_escape_string($_POST['title']);
        $firstParagraph = $conn->real_escape_string($_POST['firstParagraph']);
        $secondParagraph = $conn->real_escape_string($_POST['secondParagraph']);
        $thirdParagraph = $conn->real_escape_string($_POST['thirdParagraph']);
        $fourthParagraph = $conn->real_escape_string($_POST['fourthParagraph']);
        $fifthParagraph = $conn->real_escape_string($_POST['fifthParagraph']);
        $sixthParagraph = $conn->real_escape_string($_POST['sixthParagraph']);


        $sql=mysqli_query($conn,"SELECT * FROM services where serviceID='$serviceID'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE services SET title='$title', firstParagraph='$firstParagraph', secondParagraph='$secondParagraph', thirdParagraph='$thirdParagraph', fourthParagraph='$fourthParagraph', fifthParagraph='$fifthParagraph', sixthParagraph='$sixthParagraph'  WHERE serviceID='$serviceID'");

            $_SESSION['success_message'] = "Service Updated";
            echo "<meta http-equiv='refresh' content='0; URL=edit-service?id=$serviceID'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error updating service".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=edit-service?id=$serviceID'>";
            exit();

        }

    }



    //Update User Inactive Status Query
    if (isset($_POST['update_user_status_btn'])) {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = $conn->real_escape_string($_POST['id']);
        $status = $conn->real_escape_string($_POST['status']);


        $sql=mysqli_query($conn,"SELECT * FROM users where id='$id'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE users SET status='$status' WHERE id='$id'");

            $_SESSION['success_message'] = "User Account Blocked";
            echo "<meta http-equiv='refresh' content='0; URL=users'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error blocking user account".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=users'>";
            exit();

        }

    }



    //Update User Active Status Query
    if (isset($_POST['update_user_status_active_btn'])) {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = $conn->real_escape_string($_POST['id']);
        $status = $conn->real_escape_string($_POST['status']);


        $sql=mysqli_query($conn,"SELECT * FROM users where id='$id'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE users SET status='$status' WHERE id='$id'");

            $_SESSION['success_message'] = "User Account Unblocked";
            echo "<meta http-equiv='refresh' content='0; URL=users'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error unblocking user account".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=users'>";
            exit();

        }

    }




    //Update Contestant Query
    if (isset($_POST['update_contestant_btn'])) {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $id = $conn->real_escape_string($_POST['id']);
        $fullName = $conn->real_escape_string($_POST['fullName']);
        $odd = $conn->real_escape_string($_POST['odd']);
        $status = $conn->real_escape_string($_POST['status']);


        $sql=mysqli_query($conn,"SELECT * FROM contestant where id='$id'");
        $result=mysqli_fetch_array($sql);
        if($result>0){
            $conn=mysqli_query($conn,"UPDATE contestant SET fullName='$fullName', odd='$odd', status='$status' WHERE id='$id'");

            $_SESSION['success_message'] = "Contestat Updated";
            echo "<meta http-equiv='refresh' content='0; URL=edit-contestant?id=$id'>";
            exit();

        }else {

            $_SESSION['error_message'] = "Error unblocking user account".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='0; URL=edit-contestant?id=$id'>";
            exit();

        }

    }