<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $mysqli->real_escape_string(trim($_POST['first_name']));
    $last_name  = $mysqli->real_escape_string(trim($_POST['last_name']));
    $email      = $mysqli->real_escape_string(trim($_POST['email']));
    $phone      = $mysqli->real_escape_string(trim($_POST['phone']));
    $gender     = $mysqli->real_escape_string(trim($_POST['gender']));
    $address    = $mysqli->real_escape_string(trim($_POST['address']));
    $gender = strtolower($gender);
    if ($gender === 'men') {
        $gender = 'Men';
    } elseif ($gender === 'women') {
        $gender = 'Women';
    } else {
        $gender = 'Other';
    }

    $sql = "INSERT INTO users (first_name, last_name, email, phone, gender, address) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$gender', '$address')";

    if ($mysqli->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Lỗi khi thêm dữ liệu: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "Invalid request method.";
}
?>