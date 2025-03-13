<?php
    require ('../includes/connect.php');

    // Lấy danh sách xe từ database
    $query = "SELECT brands.name AS brand_name, products.name AS car_name, products.price, products.type, products.status, products.image 
    FROM products 
    JOIN brands ON products.brand_id = brands.id";
    $result = $mysqli->query($query);

    $cars = [];
    while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
    }
?>
<?php 
    require('../includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        
    </style>
    
</head>
<body>
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
    <div class="home_page">
        <div class="container_home">
            <h2 class="about_us">ABOUT US</h2>
            <!-- Hiển thị trên điện thoại -->
            <div class="about-us-section-content d-block d-md-none">
                <div class="row">
                    <img class="img-fluid" src="../assets/images/about_us_section_02.jpg" alt="">
                    <h3>
                        <span>CarBreezy</span> is a leading automotive digital marketplace that seeks to make car buying and selling easy, transparent and efficient.
                    </h3>
                    <p>Your car buying destiny is in your hands, but we will help you every step of the way. We built this site to make car buying as fast and easy as possible.</p>
                    <p>From discovery to delivery, consumers can use CarBreezy to explore vehicles from an expansive, cross-brand selection of inventory from our vast network ...</p>
                    <button><a href="">See more</a></button>
                </div>
            </div>
            <!-- Hiển thị trên tablet trở lên -->
            <div class="about-us-section-content d-none d-md-block ">
                <div class="row">
                    <div class="col-6 image">
                        <img class="img-fluid d-none d-md-block d-lg-none" src="../assets/images/about_us_section.jpg" alt="">
                        <img class="img-fluid d-none d-lg-block" src="../assets/images/about_us_section_03.jpg" alt="">
                    </div>
                    <div class="col-6 content">
                        <h3>
                            CarBreezy is a leading automotive digital marketplace that seeks to make car buying and selling easy, transparent and efficient.
                    </h3>
                    <p>Your car buying destiny is in your hands, but we will help you every step of the way. We built this site to make car buying as fast and easy as possible.</p>
                    <p>From discovery to delivery, consumers can use CarBreezy to explore vehicles from an expansive, cross-brand selection of inventory from our vast network ...</p>
                    <button><a href="../pages/about.php">See more</a></button>
                    </div>
                </div>
            </div>
            
            <div class="background-consult-form">
                <div class="consult-form">
                <h2>BOOK FOR CONSULTING</h2>
                <form action="" method="post">
                    <div class="double-row">
                        <input type="text" name="first_name" placeholder="First Name" required>
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                    <input type="email" name="email" placeholder="Email" required>
                    <div class="double-row">
                        <input type="text" name="phone" placeholder="Phone" required>
                        <input type="text" name="gender" placeholder="Gender" required>
                    </div>
                    <input type="text" name="address" placeholder="Address" required>
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
            </div>
            <!-- Hiển thị xe -->
            <h2 class="about_us">CARS</h2>
            <div class="slider">
                <span class="arrow" onclick="prevSlide()">&#9665;</span>
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
                </div>
                <span class="arrow" onclick="nextSlide()">&#9655;</span>
            </div>
            <script>
                let index = 0;
                const carWrapper = document.getElementById("car-wrapper");
                const carWidth = 260; // 250px + margin
                const totalCars = document.querySelectorAll(".car").length;
                const maxIndex = totalCars - 3; // Hiển thị 3 xe mỗi lần

                function updateSlide() {
                    carWrapper.style.transform = `translateX(${-index * carWidth}px)`;
                }

                function nextSlide() {
                    if (index < maxIndex) index++;
                    updateSlide();
                }

                function prevSlide() {
                    if (index > 0) index--;
                    updateSlide();
                }
            </script>
            <!-- Video -->
            <div class="video_section">
                <div class="video_content">
                    <h3>Drive Your Dream with CarBreezy! </h3>
                    <p>
                    Looking for the perfect car? At CarBreezy, we make car buying easy, exciting, and hassle-free! Whether you're searching for a sleek sedan, a powerful SUV, or a fuel-efficient hybrid, we have the best selection at unbeatable prices.
                    </p>
                    <p>
                        ✅ Top-quality vehicles with thorough inspections<br>
                        ✅ Transparent pricing – no hidden fees!<br>
                        ✅ Flexible financing options to fit your budget<br>
                        ✅ Exceptional customer service every step of the way<br>
                    </p>
                    <p>Don’t wait—your dream car is just a test drive away! Visit CarBreezy today and hit the road in style! </p>
                </div>
                <div class="video_col">
                    <video src="../assets/images/06d53d1660cd2fff8ef2140635ee6620.mp4"></video>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
    require('../includes/footer.php');
?>