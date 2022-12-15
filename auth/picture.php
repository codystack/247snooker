<?php
// //Connect email sending
// require_once "../auth/emails/sendmail.php";

session_start();

//Connect database
include "./config/db.php";

//Upload Profile Picture
if (isset($_POST['picture_btn'])) {

    $id = $_SESSION['id'];
    $id = $conn->real_escape_string($_POST['id']);
    $picture_path  = $conn->real_escape_string('./upload/'.$_FILES['picture']['name']);

    if (file_exists($picture_path)){
        $picture_path = $conn->real_escape_string('./upload/'.uniqid().rand().$_FILES['picture']['name']);
    }

    $checker = 0;

    //make sure file type is image
    if (preg_match("!image!", $_FILES['picture']['type'])) {
        $checker ++;
    }
    if ($checker < 1){
        exit;
    }

    $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
    $num=mysqli_fetch_array($sql);
    if($num>0){
        $conn=mysqli_query($conn,"UPDATE users SET picture='$picture_path'  where id='".$_SESSION['id']."'");

        //copy image to upload folder
        copy($_FILES['picture']['tmp_name'], $picture_path);

        $_SESSION['success_message'] = "Picture uploaded 👍";
    }
    else{
        $_SESSION['error_message'] = "Error uploading photograph.";
    }
}