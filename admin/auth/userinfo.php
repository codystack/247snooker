<?php
// Connect database
include "./config/db.php";


$select_query = "SELECT * FROM admin WHERE id ='" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $select_query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $picture = $row['picture'];
    }
}