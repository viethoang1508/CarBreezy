<?php
require '../includes/connect.php'; // Kết nối database

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
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Filter Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        .car_menu {
            width: 250px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .car_menu a {
            text-decoration: none;
        }
        .car_menu h4 {
            font-size: 18px;
            font-weight: 700;
            color: #d41a2a;
            margin-bottom: 10px;
            border-bottom: 2px solid #d41a2a;
            padding-bottom: 5px;
        }

        .car_menu ul {
            list-style: none;
            padding: 0;
        }

        .car_menu ul li {
            margin-bottom: 10px;
        }

        .car_menu ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 8px;
            display: block;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .car_menu ul li a:hover {
            background-color: #d41a2a;
            color: #fff;
        }
    </style>
    
<body>
    <div class="car_menu">
            <h4>BRANDS</h4>
            <ul>
                <?php while ($brand = $result_brands->fetch_assoc()): ?>
                    <li><a href="?brand=<?= $brand['id'] ?>"> <?= $brand['name'] ?> </a></li>
                <?php endwhile; ?>
            </ul>
            <a href="new_car.php"><h4>NEW</h4></a>
            <a href="old_car.php"><h4>USED</h4></a>
            <h4>SALES</h4>
    </div>
</body>
</html>


