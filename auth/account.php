<?php
// //Connect email sending
// require_once "../auth/emails/sendmail.php";

session_start();

//Connect database
include "./config/db.php";


//User registration script
if (isset($_POST['register_btn'])) {

    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $userKey = 'SN'.rand(1000, 9999);
    // $token = bin2hex(random_bytes(50)); // generate unique token

    $check_user_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_user_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "User Already Exist!";
    }else {
        // Finally, register agent if there are no errors in the form
        $password = sha1($password);//encrypt the password before saving in the database
        $query = "INSERT INTO users (firstName, lastName, email, password, userKey, phone, status) 
  			        VALUES('$firstName', '$lastName', '$email', '$password', '$userKey', '$phone', 'Active')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            // sendVerificationEmail($email, $token, $firstName, $companyName);
            // sendStartupEmail($email, $firstName, $companyName);

            $_SESSION['email'] = $email;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['success_message'] = "Account created...you're being redirected.";
            header('location: signup-successful');
        }else {
            $_SESSION['error_message']    = "Error creating account contact admin";
        }
    }
}



//Login script
if (isset($_POST['login_btn'])) {

    $password = $conn->real_escape_string($_POST['password']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $status = $conn->real_escape_string($_POST['status']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $userKey = $conn->real_escape_string($_POST['userKey']);

    $password = sha1($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $id = $row['id'];
        $status = $row['status'];
        $phone = $row['phone'];
        $userKey = $row['userKey'];
    }if (mysqli_num_rows($result) == 1) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['id'] = $id;
        $_SESSION['status'] = $status;
        $_SESSION['userKey'] = $userKey;
        if ($status == 'Inactive'){
            $_SESSION['error_message'] = "Account Deactivated";
        }if ($status == 'Active') {
            header('location: dashboard');
        }
    }else {
        $_SESSION['error_message'] = "Incorrect Login Details";
    }
}




//KYC script
// if(isset($_POST['kyc_btn'])) {

//     $homeAddress = $conn->real_escape_string($_POST['homeAddress']);
//     $flatNumber = $conn->real_escape_string($_POST['flatNumber']);
//     $nextOfKin = $conn->real_escape_string($_POST['nextOfKin']);
//     $nextOfKinPhone = $conn->real_escape_string($_POST['nextOfKinPhone']);
//     $accountType = $conn->real_escape_string($_POST['accountType']);

//     $id = $_SESSION['id'];
//     $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
//     $result=mysqli_fetch_array($sql);
//     if($result>0)
//     {
//         $conn=mysqli_query($conn,"UPDATE users SET homeAddress='$homeAddress', flatNumber='$flatNumber', nextOfKin='$nextOfKin', nextOfKinPhone='$nextOfKinPhone', accountType='$accountType' where id='".$_SESSION['id']."'");
//         $_SESSION['success_message'] = "Registration Completed 👍";
//         header('location: kyc-photograph');
//     }
//     else
//     {
//         $_SESSION['error_message'] = "Error updating profile.";
//     }
// }




//Upload Profile Picture
// if (isset($_POST['picture_btn'])) {

//     $id = $_SESSION['id'];
//     $id = $conn->real_escape_string($_POST['id']);
//     $picture_path  = $conn->real_escape_string('./upload/'.$_FILES['picture']['name']);

//     if (file_exists($picture_path)){
//         $picture_path = $conn->real_escape_string('./upload/'.uniqid().rand().$_FILES['picture']['name']);
//     }

//     $checker = 0;

//     //make sure file type is image
//     if (preg_match("!image!", $_FILES['picture']['type'])) {
//         $checker ++;
//     }
//     if ($checker < 1){
//         exit;
//     }

//     $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
//     $num=mysqli_fetch_array($sql);
//     if($num>0){
//         $conn=mysqli_query($conn,"UPDATE users SET picture='$picture_path'  where id='".$_SESSION['id']."'");

//         //copy image to upload folder
//         copy($_FILES['picture']['tmp_name'], $picture_path);

//         $_SESSION['success_message'] = "Picture uploaded 👍";
//     }
//     else{
//         $_SESSION['error_message'] = "Error uploading photograph.";
//     }
// }