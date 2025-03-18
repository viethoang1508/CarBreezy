<?php
session_start();

// Định nghĩa thời gian hết hạn của một phiên truy cập (giây)
$timeout = 300; // 5 phút
$dataFile = "visitors.json";

// Đọc dữ liệu từ tệp JSON
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
} else {
    $data = [];
}

// Lấy địa chỉ IP của người dùng
$ip = $_SERVER['REMOTE_ADDR'];
$now = time();

// Cập nhật danh sách truy cập
$data[$ip] = $now;

// Loại bỏ các truy cập đã hết hạn
foreach ($data as $key => $timestamp) {
    if ($now - $timestamp > $timeout) {
        unset($data[$key]);
    }
}

// Lưu lại dữ liệu cập nhật
file_put_contents($dataFile, json_encode($data));

// Đếm số lượng người đang truy cập
$onlineUsers = count($data);

// Xuất biến để sử dụng trong header
$visitor_count = $onlineUsers;
?>