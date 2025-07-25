<?php

session_start();

//Connect database
include "./config/db.php";



//Login script
if (isset($_POST['login_btn'])) {

    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $status = $conn->real_escape_string($_POST['status']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $password = sha1($password);
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstName = $row['firstName'];
        $firstName = $row['firstName'];
        $email = $row['email'];
        $id = $row['id'];
        $status = $row['status'];
        $picture = $row['picture'];
        $phone = $row['phone'];
        $designation = $row['designation'];
    }if (mysqli_num_rows($result) == 1) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['picture'] = $picture;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['id'] = $id;
        $_SESSION['designation'] = $designation;
        if ($status == 1){
            $_SESSION['success_message'] = "Login Successfull";
            header('location: dashboard');
        }
        if ($status == 0){
            $_SESSION['error_message'] = "<strong>Error!</strong> Account not active please contact admin.";
        }
    }else {
        $_SESSION['error_message'] = "<strong>Error!</strong> incorrect Login Details";
    }
}