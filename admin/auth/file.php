<?php
// Connect database
include "./config/db.php";

//Breadcrumb Query
if (isset($_POST['breadcrumb_upload_btn'])) {

    $serviceID = $conn->real_escape_string($_POST['serviceID']);
    $fileName = $_FILES['filePath']['name'];
    $fileTmp = $_FILES['filePath']['tmp_name'];
    $fileType = $_FILES['filePath']['type'];
    
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
        echo "<meta http-equiv='refresh' content='0; URL=edit-service?id=$serviceID'>";
        exit();
    }

    // Check if entry already exists for this service in `breadcrumb` table
    $sql = mysqli_query($conn, "SELECT * FROM breadcrumb WHERE serviceID = '$serviceID'");
    $result = mysqli_fetch_array($sql);

    if ($result) {
        // UPDATE existing breadcrumb record
        $update = mysqli_query($conn, "UPDATE breadcrumb SET filePath = '$targetPath' WHERE serviceID = '$serviceID'");

        if ($update) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Breadcrumb image updated successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to update breadcrumb image: " . mysqli_error($conn);
        }
    } else {
        // INSERT new breadcrumb record
        $insert = mysqli_query($conn, "INSERT INTO breadcrumb (serviceID, filePath) VALUES ('$serviceID', '$targetPath')");

        if ($insert) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Breadcrumb image uploaded successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to insert breadcrumb image: " . mysqli_error($conn);
        }
    }

    // Redirect back
    echo "<meta http-equiv='refresh' content='0; URL=edit-service?id=$serviceID'>";
    exit();
}


//Hero Query
if (isset($_POST['hero_upload_btn'])) {

    $serviceID = $conn->real_escape_string($_POST['serviceID']);
    $fileName = $_FILES['filePath']['name'];
    $fileTmp = $_FILES['filePath']['tmp_name'];
    $fileType = $_FILES['filePath']['type'];
    
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
        echo "<meta http-equiv='refresh' content='0; URL=edit-service?id=$serviceID'>";
        exit();
    }

    // Check if entry already exists for this service in `hero` table
    $sql = mysqli_query($conn, "SELECT * FROM hero WHERE serviceID = '$serviceID'");
    $result = mysqli_fetch_array($sql);

    if ($result) {
        // UPDATE existing hero record
        $update = mysqli_query($conn, "UPDATE hero SET filePath = '$targetPath' WHERE serviceID = '$serviceID'");

        if ($update) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Hero image updated successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to update hero image: " . mysqli_error($conn);
        }
    } else {
        // INSERT new hero record
        $insert = mysqli_query($conn, "INSERT INTO hero (serviceID, filePath) VALUES ('$serviceID', '$targetPath')");

        if ($insert) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Hero image uploaded successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to insert hero image: " . mysqli_error($conn);
        }
    }

    // Redirect back
    echo "<meta http-equiv='refresh' content='0; URL=edit-service?id=$serviceID'>";
    exit();
}



//Contestant Image Query
if (isset($_POST['contestant_image_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
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
        echo "<meta http-equiv='refresh' content='0; URL=edit-contestant?id=$id'>";
        exit();
    }

    // Check if entry already exists for this service in `contestant` table
    $sql = mysqli_query($conn, "SELECT * FROM contestant WHERE id = '$id'");
    $result = mysqli_fetch_array($sql);

    if ($result) {
        // UPDATE existing contestant record
        $update = mysqli_query($conn, "UPDATE contestant SET picture = '$targetPath' WHERE id = '$id'");

        if ($update) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Contestant image updated successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to update contestant image: " . mysqli_error($conn);
        }
    } else {
        // INSERT new contestant record
        $insert = mysqli_query($conn, "INSERT INTO contestant (id, picture) VALUES ('$id', '$targetPath')");

        if ($insert) {
            copy($fileTmp, $targetPath);
            $_SESSION['success_message'] = "Contestant image uploaded successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to insert contestant image: " . mysqli_error($conn);
        }
    }

    // Redirect back
    echo "<meta http-equiv='refresh' content='0; URL=edit-contestant?id=$id'>";
    exit();
}