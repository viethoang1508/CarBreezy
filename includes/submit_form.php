<?php
require('connect.php');

// Kiểm tra nếu form được gửi đi bằng POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu và xử lý bảo mật
    $first_name = $mysqli->real_escape_string(trim($_POST['first_name']));
    $last_name  = $mysqli->real_escape_string(trim($_POST['last_name']));
    $email      = $mysqli->real_escape_string(trim($_POST['email']));
    $phone      = $mysqli->real_escape_string(trim($_POST['phone']));
    $gender     = $mysqli->real_escape_string(trim($_POST['gender']));
    $address    = $mysqli->real_escape_string(trim($_POST['address']));

    // Chuyển đổi giá trị Gender từ tiếng Việt sang đúng ENUM ('Men', 'Women', 'Other')
    $gender = strtolower($gender);
    if ($gender == 'nam') {
        $gender = 'Men';
    } elseif ($gender == 'nữ') {
        $gender = 'Women';
    } else {
        $gender = 'Other';
    }

    // Insert dữ liệu vào bảng users
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
