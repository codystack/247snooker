<?php
// Connect database
include "./config/db.php";

//Create New Admin Query
if (isset($_POST['new_admin_btn'])) {

    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $designation = $conn->real_escape_string($_POST['designation']);
    $status = $conn->real_escape_string($_POST['status']);


    $check_query = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "User Already Exist!";
    }else {
        $password = sha1('123456');//encrypt the password before saving in the database
        $query = "INSERT INTO admin (firstName, lastName, email, password, designation, status) 
  			        VALUES('$firstName', '$lastName', '$email', '$password', '$designation', '1')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['success_message'] = "New Admin Created";
        }else {
            $_SESSION['error_message'] = "Error creating new admin".mysqli_error($conn);
        }
    }
}



//Add New Contestants Query
if (isset($_POST['new_contestant_btn'])) {

    $fullName = $conn->real_escape_string($_POST['fullName']);
    $odd = $conn->real_escape_string($_POST['odd']);
    $status = $conn->real_escape_string($_POST['status']);
    $fileName = $_FILES['picture']['name'];
    $fileTmp = $_FILES['picture']['tmp_name'];
    $fileType = $_FILES['picture']['type'];
    
    $uploadDir = 'upload/';
    $targetPath = $uploadDir . $conn->real_escape_string($fileName);

    // If file exists, rename to avoid overwrite
    if (file_exists($targetPath)) {
        $uniqueName = uniqid() . '_' . rand(1000, 9999) . '_' . $fileName;
        $targetPath = $uploadDir . $conn->real_escape_string($uniqueName);
    }

    // Only accept image files
    if (!preg_match("!image!", $fileType)) {
        $_SESSION['error_message'] = "Only image uploads are allowed.";
        echo "<meta http-equiv='refresh' content='0; URL=contestants'>";
        exit();
    }

    // Check if entry already exists table
    $sql = mysqli_query($conn, "SELECT * FROM contestant WHERE fullName = '$fullName'");
    $result = mysqli_fetch_array($sql);

    if ($result) {
        // UPDATE existing contestant record
        $update = mysqli_query($conn, "UPDATE contestant SET fullName = '$fullName', odd = '$odd', picture = '$targetPath', status = '1' WHERE fullName = '$fullName'");

        if ($update) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Contestant updated successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to update certificate: " . mysqli_error($conn);
        }
    } else {
        // INSERT new contestant record
        $insert = mysqli_query($conn, "INSERT INTO contestant (fullName, odd, picture, status) VALUES ('$fullName', '$odd', '$targetPath', '1')");

        if ($insert) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Contestant uploaded successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to insert contestant: " . mysqli_error($conn);
        }
    }

    // Redirect back
    echo "<meta http-equiv='refresh' content='0; URL=contestants'>";
    exit();
}
