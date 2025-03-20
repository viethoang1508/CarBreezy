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
    $query = "SELECT brands.name AS brand_name, 
                     products.id AS product_id, 
                     products.name AS car_name, 
                     products.price, 
                     products.type, 
                     products.status, 
                     products.image, 
                     products.created_at,
                     COALESCE((products.price * (1 - product_offer.discount / 100)), NULL) AS discounted_price
              FROM products
              JOIN brands ON products.brand_id = brands.id
              LEFT JOIN product_offer 
              ON products.id = product_offer.product_id 
              AND product_offer.valid_until >= CURDATE() -- Chỉ lấy khuyến mãi còn hạn
              WHERE type = '$type'
              ORDER BY created_at DESC";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/car.css">
    <title>Car</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <?php require '../includes/car_menu.php'; ?>
        </div>

        <div class="content">
            <h2>CARS</h2>
            <div class="type_filter">
                <label for="type_filter">Type Filter</label>
                <select id="type_filter" class="form-select">
                    <option value="all">All Types</option>
                    <?php foreach($types as $type): ?>
                        <option value="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php foreach ($cars as $type => $list): ?>
                <h3 class="brand_title" data-type="<?= htmlspecialchars($type) ?>"><?= strtoupper($type) ?></h3>
                <div class="slider car-section" data-type="<?= htmlspecialchars($type) ?>">
                <span class="arrow" onclick="prevSlide()">&#9665;</span>
                    <div class="car-list">
                        <div class="car-wrapper">
                            <?php foreach ($list as $car): ?>
                                <div class="car-item" data-name="<?= htmlspecialchars($car['car_name']) ?>">
                                    <p><strong><?= $car['status'] ?></strong> | <strong><?= $car['type'] ?></strong></p>
                                    <div>
                                        <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['car_name'] ?>">
                                        <h3><?= $car['car_name'] ?></h3>
                                        <p><strong>Hãng:</strong> <span class="car_brand_name"><?= $car['brand_name'] ?></span></p>
                                    </div>
                                    <div class="price-section">
                                        <?php if (!empty($car['discounted_price'])): ?>
                                            <p class="price_group">
                                                <p class="og_price" style="text-decoration: line-through; color: gray;"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                                                <p class="price"><?= number_format($car['discounted_price'], 0, ',', '.') ?> VNĐ</p>
                                            </p>
                                        <?php else: ?>
                                            <p class="price"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                                        <?php endif; ?>
                                    </div>
                                </div>   
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <span class="arrow" onclick="nextSlide()">&#9655;</span>
                </div>
                <script>
                    document.querySelectorAll(".slider").forEach(slider => {
                        let carWrapper = slider.querySelector(".car-wrapper"); // Lấy danh sách xe của slider đó
                        let carItems = slider.querySelectorAll(".car-item"); // Danh sách xe
                        let carWidth = 260; // 250px + margin
                        let index = 0;
                        let maxIndex = Math.max(0, carItems.length - 3);

                        function updateSlide() {
                            carWrapper.style.transform = `translateX(${-index * carWidth}px)`;
                        }

                        slider.querySelector(".arrow:first-of-type").addEventListener("click", function() {
                            if (index > 0) index--;
                            updateSlide();
                        });

                        slider.querySelector(".arrow:last-of-type").addEventListener("click", function() {
                            if (index < maxIndex) index++;
                            updateSlide();
                        });
                    });
                </script>
                <?php endforeach; ?>
        </div>
    </div>
    
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
            document.getElementById("type_filter").addEventListener("change", function () {
                let selectedType = this.value.toLowerCase();
                document.querySelectorAll(".car-section, .brand_title").forEach(section => {
                    section.style.display = (selectedType === "all" || section.getAttribute("data-type").toLowerCase() === selectedType) ? "flex" : "none";
                });
            });

            document.querySelectorAll(".car-item").forEach(item => {
                item.addEventListener("click", function () {
                    let carName = this.getAttribute("data-name");
                    fetch(`get_car_details.php?name=${encodeURIComponent(carName)}`)
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
<?php
require('../includes/footer.php');
?>
