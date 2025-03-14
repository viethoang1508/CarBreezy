<?php
require '../includes/connect.php'; // Kết nối database
require '../includes/header.php'; // Header

// Kiểm tra kết nối
if (!$mysqli) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy danh sách hãng xe
$query_brands = "SELECT id, name FROM brands ORDER BY name ASC";
$result_brands = $mysqli->query($query_brands);

if (!$result_brands) {
    die("Lỗi truy vấn danh sách hãng: " . $mysqli->error);
}

// Lấy danh sách xe theo từng loại
$types = ['Hatchback', 'Sedan', 'SUV', 'Convertible'];
$cars = [];

foreach ($types as $type) {
    $query = "SELECT * FROM products WHERE type = '$type' and status = 'Xe Mới'ORDER BY created_at DESC";
    $result = $mysqli->query($query);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $cars[$type][] = $row;
        }
    } else {
        die("Lỗi truy vấn danh sách xe: " . $mysqli->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/car.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="sidebar">
           <?php require '../includes/car_menu.php'; ?>
        </div>

        <div class="content">
            <h2> NEW CARS</h2>
            <?php foreach ($cars as $type => $list): ?>
                <h3><?= strtoupper($type) ?></h3>
                <div class="car-list">
                    <?php foreach ($list as $car): ?>
                        <div class="car-item">
                            <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['name'] ?>">
                            <p><?= $car['name'] ?></p>
                            <p><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
</body>
</html>
