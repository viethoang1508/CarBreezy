<?php
include '../includes/connect.php'; // Kết nối database

// Lấy từ khóa từ URL
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

$cars = [];

if (!empty($keyword)) {
    // Tránh lỗi SQL Injection
    $safeKeyword = "%" . $mysqli->real_escape_string($keyword) . "%";

    // Truy vấn tìm kiếm sử dụng MySQLi
    $query = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ? OR status LIKE ? OR type LIKE ?";
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
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .search-results {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .search-card {
            width: 280px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }
        .search-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }
        .search-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .search-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .search-card p {
            font-size: 14px;
            color: #555;
            padding: 0 10px;
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
        <h2 class="text-center text-danger">KẾT QUẢ TÌM KIẾM "<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>"</h2>

        <?php if (!empty($cars)): ?>
            <div class="search-results">
                <?php foreach ($cars as $car): ?>
                    <div class="search-card">
                        <img src="../assets/images/car_picture/<?php echo htmlspecialchars($car['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                             alt="<?php echo htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8'); ?>">
                        <h3><?php echo htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p class="text-danger fw-bold"><?php echo number_format($car['price'], 0, ',', '.'); ?> VNĐ</p>
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


