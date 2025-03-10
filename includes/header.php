<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarBreezy</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .header h1 {
            color: #D81324;
        }
        .header .search  button {
            background-color: #D81324;
            color: white;
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
                            <a class="nav-link active" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CARS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
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
