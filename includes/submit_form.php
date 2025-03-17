<?php
require('../includes/connect.php');

// Kiểm tra nếu form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $mysqli->real_escape_string($_POST['first_name']);
    $last_name = $mysqli->real_escape_string($_POST['last_name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $gender = $mysqli->real_escape_string($_POST['gender']);
    $address = $mysqli->real_escape_string($_POST['address']);

    // Thêm dữ liệu vào bảng users
    $sql = "INSERT INTO users (first_name, last_name, email, phone, gender, address) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$gender', '$address')";

    if ($mysqli->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Lỗi: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
\