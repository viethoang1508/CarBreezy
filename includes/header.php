
<?php
    $current_page = basename($_SERVER['PHP_SELF']); // Lấy tên file trang hiện tại
    require('../pages/visitor_counter.php'); // Thêm bộ đếm khách truy cập
?>
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
        .header  h1 {
            color: #D81324;
        }
        .container-fluid a {
            text-decoration: none;
            font-family: 'Oswald', sans-serif;
        }
        .container-fluid {
            gap: 10px;
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

        .logo h1 {
            color: #D81324 !important; /* Màu đỏ */
            transition: color 0.3s ease-in-out; /* Hiệu ứng chuyển màu */
                }

        .logo:hover h1 {
            color: #A9101B !important; /* Màu đậm hơn khi hover */
            }


        #searchForm {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Oswald', sans-serif;
            color: #D81324;
            justify-items: center;
        }

        #searchForm input {
            width: 250px;
            border: 2px solid #D81324;
            border-radius: 5px;
            padding: 8px 12px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        #searchForm input:focus {
            border-color: #A9101B;
            outline: none;
            box-shadow: 0 0 8px rgba(216, 19, 36, 0.5);
        }

        #searchForm button {
            background-color: #D81324 !important;
            color: white !important;
            border: none;
            border-radius: 5px;
            padding: 10px 18px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        #searchForm button:hover {
            background-color: #A9101B !important;
            transform: translateY(-2px);
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
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
.visitor-count {
    color: #D81324 !important; /* Màu đỏ */
    font-weight: bold;
    font-size: 16px;
}
    </style>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center">
                    <a href="../pages/home.php"><img src="../assets/images/logo-transparent.png" alt="Logo" width="60" class="d-inline-block"></a>
                    <a href="../pages/home.php"><h1 class="ms-2">CarBreezy</h1></a>
                </div>
    
                <!-- Nút toggle menu trên di động -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
               <!-- Ô tìm kiếm -->
                <form id="searchForm" action="../backend/search.php" method="GET">
                    <input type="text" id="searchInput" name="keyword" placeholder="Type products ..." required>
                    <button type="submit">Search</button>
                </form>

                <!-- Danh mục menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'home.php') echo 'active'; ?>" href="../pages/home.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'about.php') echo 'active'; ?>" href="../pages/about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'car.php') echo 'active'; ?>" href="../pages/car.php">CARS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'contact.php') echo 'active'; ?>" href="../pages/contact.php">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'gallery.php') echo 'active'; ?>" href="../pages/gallery.php">GALLERY</a>
                        </li>
                    </ul>
                </div>
    
                <!-- Logo số người sử dụng -->
                <div class="d-flex ms-auto align-items-center">
                    <img src="../assets/images/people-fill.svg" alt="" width="20">
                    <span class="ms-2 visitor-count">Visitors: <?php echo number_format($visitor_count); ?></span>
                 </div>
            </div>
        </nav>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Xử lý khi click nút search -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("searchForm").addEventListener("submit", function (event) {
        let query = document.getElementById("searchInput").value.trim();

        if (query === "") {
            event.preventDefault(); // Ngăn chặn submit nếu không có từ khóa
            alert("Vui lòng nhập từ khóa tìm kiếm!");
        }
    });
});
    </script>

</body>
</html>
