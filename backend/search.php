<?php
include '../includes/connect.php'; // Kết nối database

// Lấy từ khóa từ URL
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

$cars = [];

if (!empty($keyword)) {
    // Tránh lỗi SQL Injection
    $safeKeyword = "%" . $mysqli->real_escape_string($keyword) . "%";

    // Truy vấn tìm kiếm sử dụng MySQLi
    $query = "SELECT 
            brands.name AS brand_name, 
            products.name AS car_name, 
            products.price, 
            products.type, 
            products.status, 
            products.image, 
            product_offer.title AS offer_title, 
            product_offer.description, 
            product_offer.discount, 
            product_offer.valid_until
          FROM products 
          JOIN brands ON products.brand_id = brands.id 
          LEFT JOIN product_offer ON products.id = product_offer.product_id 
          WHERE products.name LIKE ? 
             OR products.description LIKE ? 
             OR products.status LIKE ? 
             OR products.type LIKE ?";
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
            width: 80%;
            margin: 0 auto;
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
        .car:hover {
            transform: scale(1.1);
            cursor: pointer;
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
        .price-old {
            text-decoration: line-through;
            color: gray;
        }
        .price-new {
            background-color: red;
            color: white;
            padding: 5px;
            font-weight: bold;
        }
        .text-success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="search_container">
        <h2 class="text-center text-danger">SEARCH RESULTS "<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>"</h2>
        <?php if (!empty($cars)): ?>
            <div class="car-container">
                <div class="car-wrapper" id="car-wrapper">
                    <?php foreach ($cars as $car) : ?>
                        <div class="car"  data-name="<?= htmlspecialchars($car['car_name'], ENT_QUOTES, 'UTF-8') ?>">
                            <p><strong><?= $car['status'] ?></strong> | <strong><?= $car['type'] ?></strong></p>
                            <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['car_name'] ?>">
                            <h3><?= $car['car_name'] ?></h3>
                            <p><strong>Hãng:</strong> <span class="car_brand_name"><?= $car['brand_name'] ?></span></p>

                            <?php if (!empty($car['discount'])) : ?>
                                <?php
                                $discounted_price = $car['price'] - ($car['price'] * $car['discount'] / 100);
                                ?>
                                <p class="price-old"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                                <p class="price-new"><?= number_format($discounted_price, 0, ',', '.') ?> VNĐ</p>

                                <p class="text-success">
                                    🔥 <strong><?= $car['offer_title'] ?></strong> <br>
                                    ⚡ Giảm <?= $car['discount'] ?>% <br>
                                    📅 Hạn đến: <?= $car['valid_until'] ?>
                                </p>
                            <?php else: ?>
                                <p class="price-new"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
        <?php else: ?>
            <p class="text-center text-warning">Cannot find any results.</p>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Modal Bootstrap -->
    <div class="modal fade" id="carDetailModal" tabindex="-1" aria-labelledby="carDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carDetailModalLabel">Car Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carDetailContent"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".car").forEach(item => {
                item.addEventListener("click", function () {
                    let carName = this.getAttribute("data-name");
                    fetch(`../pages/get_car_details.php?name=${encodeURIComponent(carName)}`)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById("carDetailContent").innerHTML = data;
                            new bootstrap.Modal(document.getElementById("carDetailModal")).show();
                        });
                });
            });
        });
    </script>
</body>
</html>
<?php require('../includes/footer.php'); ?>
