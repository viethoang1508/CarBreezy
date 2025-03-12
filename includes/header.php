<?php 
    $current_page = basename($_SERVER['PHP_SELF']); // Lấy tên file trang hiện tại
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
                            <a class="nav-link <?php if ($current_page == 'home.php') echo 'active'; ?>" href="../pages/home.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'about.php') echo 'active'; ?>" href="../pages/about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'cars.php') echo 'active'; ?>" href="#">CARS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($current_page == 'contact.php') echo 'active'; ?>" href="../pages/contact.php">CONTACT</a>
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
