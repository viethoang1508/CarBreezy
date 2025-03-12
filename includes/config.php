<?php
$host = 'localhost';
$dbname = 'car_breezy';
$username = 'root'; // Thay bằng username của bạn
$password = '200426';     // Thay bằng password của bạn

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
