<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarBreezy</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        .header h1 {
            color: #D81324;
        }
        .header .search  button {
            background-color: #D81324;
            color: white;
        }
        .container-fluid h1 {
            font-family: 'Oswald', sans-serif;
            margin-right: 10px;
        }
        .navbar-nav a {
            font-family: 'Oswald', sans-serif;
        }
        .navbar-nav .nav-link {
            font-family: 'Oswald', sans-serif;
            color: black;
            font-weight: normal;
            transition: all 0.3s ease-in-out;
        }

        .navbar-nav .nav-link.active {
            color: #D81324 !important; /* Đổi màu đỏ */
            font-weight: bold !important; /* In đậm */
        }
    </style>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center">
                    <img src="../assets/images/logo-transparent.png" alt="Logo" width="60" class="d-inline-block">
                    <h1 class="ms-2">CarBreezy</h1>
                </div>
    
                <!-- Nút toggle menu trên di động -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <!-- Ô tìm kiếm -->
                <form class="search d-flex ms-3" role="search">
                    <input class="form-control me-2 w-300" type="search" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
    
                <!-- Danh mục menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="../pages/home.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../pages/about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../pages/car.php">CARS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../pages/contact.php">CONTACT</a>
                        </li>
                    </ul>
                </div>
    
                <!-- Logo số người sử dụng -->
                 <div class="d-flex ms-auto">
                    <img src="../assets/images/people-fill.svg" alt="" width="20">
                 </div>
            </div>
        </nav>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/car.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Car</title>
    
</head>
<body>
<body>
    <div class="container">
        <div class="sidebar">
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
    
<body>
    <div class="car_menu">
            <a href="car.php"><h4>BRANDS</h4></a>
            <ul>
                                    <li><a href="brand.php?id=4"> Ford </a></li>
                                    <li><a href="brand.php?id=3"> Honda </a></li>
                                    <li><a href="brand.php?id=1"> Mercedes-Benz </a></li>
                                    <li><a href="brand.php?id=2"> Toyota </a></li>
                            </ul>
            <a href="new_car.php"><h4>NEW</h4></a>
            <a href="old_car.php"><h4>USED</h4></a>
            <h4>SALES</h4>
    </div>
</body>
</html>
        </div>

        <div class="content">
            <h2>CARS</h2>
            <div class="type_filter">
                <label for="type_filter">Type Filter</label>
                <select id="type_filter" class="form-select">
                    <option value="all">All Types</option>
                                            <option value="Hatchback">Hatchback</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="Convertible">Convertible</option>
                                    </select>
            </div>
                            <h3 class="brand_title" data-type="Hatchback">HATCHBACK</h3>
                <div class="slider car-section" data-type="Hatchback" style="display: flex;">
                    <span class="arrow" onclick="prevSlide()">&#9665;</span>
                    <div class="car-list">
                        <div class="car-wrapper">
                                                            <div class="car-item">
                                    <p><strong>Xe Mới</strong> | <strong>Hatchback</strong></p>
                                    <img src="../assets/images/car_picture/hatchback1.png" alt="Toyota HatchBack">
                                    <h3>Toyota HatchBack</h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name">Mercedes-Benz</span></p>
                                    <p class="price">405.000.000 VNĐ</p>
                                </div>
                                                    </div>
                    </div>
                    <span class="arrow" onclick="nextSlide()">&#9655;</span>
                </div>
                    <script>
                        let index = 0;
                        const carWrapper = document.getElementById("car-wrapper");
                        const carWidth = 260; // 250px + margin
                        const totalCars = document.querySelectorAll(".car-item").length;
                        const maxIndex = totalCars - 4; // Hiển thị 3 xe mỗi lần

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
                            <h3 class="brand_title" data-type="Sedan">SEDAN</h3>
                <div class="slider car-section" data-type="Sedan" style="display: flex;">
                    <span class="arrow" onclick="prevSlide()">&#9665;</span>
                    <div class="car-list">
                        <div class="car-wrapper">
                                                            <div class="car-item">
                                    <p><strong>Xe Mới</strong> | <strong>Sedan</strong></p>
                                    <img src="../assets/images/car_picture/sedan3.png" alt="Toyota Camry">
                                    <h3>Toyota Camry</h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name">Mercedes-Benz</span></p>
                                    <p class="price">1.220.000.000 VNĐ</p>
                                </div>
                                                            <div class="car-item">
                                    <p><strong>Xe Cũ</strong> | <strong>Sedan</strong></p>
                                    <img src="../assets/images/car_picture/sedan1.png" alt="Toyota Vios">
                                    <h3>Toyota Vios</h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name">Mercedes-Benz</span></p>
                                    <p class="price">458.000.000 VNĐ</p>
                                </div>
                                                            <div class="car-item">
                                    <p><strong>Xe Mới</strong> | <strong>Sedan</strong></p>
                                    <img src="../assets/images/car_picture/sedan2.png" alt="Toyota Corolla Altis">
                                    <h3>Toyota Corolla Altis</h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name">Mercedes-Benz</span></p>
                                    <p class="price">725.000.000 VNĐ</p>
                                </div>
                                                    </div>
                    </div>
                    <span class="arrow" onclick="nextSlide()">&#9655;</span>
                </div>
                    <script>
                        let index = 0;
                        const carWrapper = document.getElementById("car-wrapper");
                        const carWidth = 260; // 250px + margin
                        const totalCars = document.querySelectorAll(".car-item").length;
                        const maxIndex = totalCars - 4; // Hiển thị 3 xe mỗi lần

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
                            <h3 class="brand_title" data-type="SUV">SUV</h3>
                <div class="slider car-section" data-type="SUV" style="display: flex;">
                    <span class="arrow" onclick="prevSlide()">&#9665;</span>
                    <div class="car-list">
                        <div class="car-wrapper">
                                                            <div class="car-item">
                                    <p><strong>Xe Mới</strong> | <strong>SUV</strong></p>
                                    <img src="../assets/images/car_picture/suv2.png" alt="Toyota Corolla Cross">
                                    <h3>Toyota Corolla Cross</h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name">Mercedes-Benz</span></p>
                                    <p class="price">820.000.000 VNĐ</p>
                                </div>
                                                    </div>
                    </div>
                    <span class="arrow" onclick="nextSlide()">&#9655;</span>
                </div>
                    <script>
                        let index = 0;
                        const carWrapper = document.getElementById("car-wrapper");
                        const carWidth = 260; // 250px + margin
                        const totalCars = document.querySelectorAll(".car-item").length;
                        const maxIndex = totalCars - 4; // Hiển thị 3 xe mỗi lần

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
            
        </div>
    </div>
    <script>
        document.getElementById("type_filter").addEventListener("change", function () {
            let selectedType = this.value.toLowerCase();
            let carSections = document.querySelectorAll(".car-section");
            let titles = document.querySelectorAll(".brand_title");

            carSections.forEach(section => {
                let type = section.getAttribute("data-type").toLowerCase();
                if (selectedType === "all" || type === selectedType) {
                    section.style.display = "block";
                } else {
                    section.style.display = "none";
                }
            });

            titles.forEach(title => {
                let type = title.getAttribute("data-type").toLowerCase();
                if (selectedType === "all" || type === selectedType) {
                    title.style.display = "block";
                } else {
                    title.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        
    .footer {
    background-color: #222; /* Màu nền tối hơn để tăng độ tương phản */
    color: white;
    padding: 40px 10px; /* Tăng padding để footer trông rộng rãi hơn */
    }

.footer .row {
    display: flex;
    justify-content: space-between;
    align-items: start;
    flex-wrap: wrap;
    }

.col1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    }

.logo-img {
    width: 100%;
    max-width: 180px; /* Giảm nhẹ kích thước logo cho cân đối */
    }

.logo_links {
    margin-top: 15px;
    display: flex;
    flex-direction: row;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

.logo_links img {
    width: 100%;
    max-width: 24px; /* Tăng nhẹ kích thước icon */
    transition: transform 0.3s ease-in-out;
}

/* Hiệu ứng hover cho icon mạng xã hội */
.logo_links img:hover {
    transform: scale(1.2);
    opacity: 0.8;
}

.col-4 h3 {
    font-family: 'Oswald', sans-serif;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.col-4 p {
    font-family: 'Times New Roman', Times, serif;
    font-size: 16px;
    line-height: 1.6;
}

/* Phần Copyright */
.footer-bottom {
    text-align: center;
    font-weight: 600;
    padding-top: 15px;
    padding-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    background-color: #111; /* Màu nền footer-bottom */
    color: #fff;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.footer-bottom .brand-name {
    color: #D81324; /* Màu đỏ đặc trưng */
    font-weight: bold;
}

/* Responsive Footer */
@media (max-width: 768px) {
    .footer .row {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .col-4 {
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>
    <div class="footer">
        <div class="row">
            <div class="col1 col-4">
                <img src="../assets/images/logo-transparent.png" alt="" class="img-fluid logo-img">
                <div class="logo_links">
                    <img src="../assets/images/twitter-brands.svg" alt="twitter">
                    <img src="../assets/images/facebook-brands.svg" alt="facebook">
                    <img src="../assets/images/youtube-brands.svg" alt="youtube">
                    <img src="../assets/images/square-instagram-brands.svg" alt="instagram">
                </div>
            </div>
            <div class="col-4">
                <h3>Openning Hours</h3>
                <p>Monday - Friday: <br>9:00AM - 9:00PM</p>
                <p>Saturday - Sunday: <br>09.00 AM - 12.00 PM</p>
            </div>
            <div class="col-4">
                <h3>Address</h3>
                <p>Address 1: <br>123 Main St, Anytown, USA</p>
                <p>Address 2: <br>123 Main St, Anytown, USA</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 <span class="brand-name">CarBreezy</span>. All Rights Reserved.</p>
        </div>

    </div>
</body>
</html>