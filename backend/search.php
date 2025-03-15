<?php
include '../includes/connect.php'; // Kết nối database

// Lấy từ khóa từ URL
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

$cars = [];

if (!empty($keyword)) {
    // Tránh lỗi SQL Injection
    $safeKeyword = "%" . $mysqli->real_escape_string($keyword) . "%";

    // Truy vấn tìm kiếm sử dụng MySQLi
    $query = "SELECT brands.name AS brand_name, products.name AS car_name, products.price, products.type, products.status, products.image, products.created_at 
                FROM products 
                join brands on products.brand_id = brands.id 
                WHERE products.name LIKE ? OR description LIKE ? OR status LIKE ? OR type LIKE ?";
    $stmt = $mysqli->prepare($query);
    $searchKeyword = "%$keyword%";
    $stmt->bind_param("ssss", $searchKeyword, $searchKeyword, $searchKeyword, $searchKeyword);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
    
    $stmt->close();
}

$mysqli->close(); // Đóng kết nối
?>
<?php require('../includes/header.php'); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .car-container {
            display: flex;
                  
        }
        .car-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out; /* Hiệu ứng trượt */
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px; 
        }
        .car {
            width: 250px;
            flex-shrink: 0; /* Giữ kích thước cố định */
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-items: center;
        }
        .car h3 {
            font-family: 'Oswald', sans-serif;
            color: #D81324;
        }
        .car p {
            font-family: 'Oswald', sans-serif;
        }
        .car_brand_name {
            font-family: 'Times New Roman', Times, serif;
        }
        .car img {
            width: 100%;
            height: auto;
            max-width: 230px;
            max-height: 100px;
            object-fit: cover;
        }
        .car .price {
            background-color: red;
            color: white;
            padding: 5px;
            font-weight: bold;
        }
                /* Thiết lập mặc định cho menu */
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            text-decoration: none;
            color: white; /* Màu chữ mặc định */
            padding: 10px 15px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            position: relative; /* Để tạo hiệu ứng gạch chân */
        }

        /* Khi hover vào */
        nav ul li a:hover {
            color: #ffcc00; /* Đổi màu chữ */
            text-shadow: 2px 2px 5px rgba(255, 204, 0, 0.8); /* Đổ bóng */
        }

        /* Hiệu ứng gạch chân khi hover */
        nav ul li a::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -5px;
            width: 0%;
            height: 3px;
            background-color: black; /* Màu gạch chân */
            transition: width 0.3s ease-in-out, left 0.3s ease-in-out;
        }

        /* Khi hover vào thì gạch chân xuất hiện */
        nav ul li a:hover::after {
            width: 100%;
            left: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-danger">SEARCH RESULTS "<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>"</h2>
        <?php if (!empty($cars)): ?>
            <div class="car-container">
                    <div class="car-wrapper" id="car-wrapper">
                        <?php foreach ($cars as $car) : ?>
                            <div class="car">
                                <p><strong><?= $car['status'] ?></strong> | <strong><?= $car['type'] ?></strong></p>
                                <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['car_name'] ?>">
                                <h3><?= $car['car_name'] ?></h3>
                                <p><strong>Hãng:</strong> <span class="car_brand_name"><?= $car['brand_name'] ?></span></p>
                                <p class="price"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
        <?php else: ?>
            <p class="text-center text-warning">Không tìm thấy kết quả nào.</p>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php require('../includes/footer.php'); ?>