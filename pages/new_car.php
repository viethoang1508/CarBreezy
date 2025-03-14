<?php
require '../includes/connect.php'; 
require '../includes/header.php'; 

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
    $query = "SELECT brands.name AS brand_name, products.name AS car_name, products.price, products.type, products.status, products.image, products.created_at 
              FROM products 
              JOIN brands ON products.brand_id = brands.id
              WHERE type = '$type' AND status = 'Xe Mới'
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
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xe Mới</title>
    <link rel="stylesheet" href="../assets/css/car.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <?php require '../includes/car_menu.php'; ?>
        </div>
        <div class="content">
            <h2>NEW CARS</h2>
            
            <div class="type_filter">
                <label for="type_filter">Lọc theo loại</label>
                <select id="type_filter" class="form-select">
                    <option value="all">Tất cả</option>
                    <?php foreach ($types as $type): ?>
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
                                <div class="car-item">
                                    <p><strong><?= $car['status'] ?></strong> | <strong><?= $car['type'] ?></strong></p>
                                    <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= htmlspecialchars($car['car_name']) ?>">
                                    <h3><?= htmlspecialchars($car['car_name']) ?></h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name"><?= htmlspecialchars($car['brand_name']) ?></span></p>
                                    <p class="price"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <span class="arrow" onclick="nextSlide()">&#9655;</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.getElementById("type_filter").addEventListener("change", function () {
            let selectedType = this.value.toLowerCase();
            let carSections = document.querySelectorAll(".car-section");
            let titles = document.querySelectorAll(".brand_title");

            carSections.forEach(section => {
                let type = section.getAttribute("data-type").toLowerCase();
                section.style.display = (selectedType === "all" || type === selectedType) ? "flex" : "none";
            });

            titles.forEach(title => {
                let type = title.getAttribute("data-type").toLowerCase();
                title.style.display = (selectedType === "all" || type === selectedType) ? "flex" : "none";
            });
        });
    </script>
</body>
</html>
<?php
require '../includes/footer.php'; ?>
