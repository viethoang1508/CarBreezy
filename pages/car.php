<?php
require ('../includes/connect.php');

// Lấy dữ liệu xe từ database
$stmt = $pdo->query("SELECT * FROM products");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Chuyển dữ liệu sang JSON để sử dụng trong JavaScript
$car_json = json_encode($cars);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Khám phá các mẫu xe mới nhất tại CarBreezy. Chúng tôi cung cấp Hatchback, Sedan, SUV, Convertible, xe mới, xe đã qua sử dụng và chương trình khuyến mãi.">
    <meta name="keywords" content="CarBreezy, xe hơi, Hatchback, Sedan, SUV, Convertible, xe mới, xe cũ, khuyến mãi xe">
    <meta name="author" content="CarBreezy Team">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Cars - CarBreezy</title>
    <link rel="stylesheet" href="car.css">
</head>
<body>
    <!-- Header -->
     <?php require ('../includes/header.php')?>
     <?php require ('../includes/header1.php')?>

    <!-- Main Content -->
    <main>
        <!-- Banner -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../assets/images/banner_01.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/images/banner_02.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/images/banner_03.jpg" alt="Third slide">
                </div>
            </div>
    </div>

        <!-- Cars Section -->
        <section class="cars-section">
            <!-- Filter Sidebar (Bộ lọc bên trái) -->
            <div class="filter-sidebar">
                <div class="filter-item active" data-category="all">
                    <span>ALL</span>
                    <span class="arrow-down">▼</span>
                </div>
                <div class="filter-subitems" style="display: none;">
                    <div class="filter-item" data-category="hatchback">HATCHBACK</div>
                    <div class="filter-item" data-category="sedan">SEDAN</div>
                    <div class="filter-item" data-category="suv">SUV</div>
                    <div class="filter-item" data-category="convertible">CONVERTIBLE</div>
                </div>
                <div class="filter-item" data-category="new">NEW</div>
                <div class="filter-item" data-category="used">USED</div>
                <div class="filter-item" data-category="sales">SALES</div>
            </div>

            <!-- Car Display (Hiển thị xe bên phải) -->
            <div class="car-display">
                <h2>CARS</h2>
                <div class="car-grid" id="carGrid">
                    <!-- Cars will be dynamically added here -->
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->

</body>
</html>