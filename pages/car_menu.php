<?php
require '../includes/connect.php'; // Kết nối database

// Lấy danh sách hãng xe từ database
$query = "SELECT name FROM brands ORDER BY name ASC";
$result = $mysqli->query($query);

$brands = [];
while ($row = $result->fetch_assoc()) {
    $brands[] = $row['name'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Filter Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            width: 150px;
            border: 1px solid #ddd;
            background: white;
            position: relative;
        }
        .menu-item {
            background: white;
            padding: 10px;
            cursor: pointer;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s;
        }
        .menu-item.active {
            background: red;
            color: white;
            font-weight: bold;
        }
        .menu-item:hover {
            background: #f5f5f5;
        }
        .submenu {
            display: none;
            background: white;
            border-top: 1px solid #ddd;
        }
        .submenu .menu-item {
            padding-left: 20px;
        }
        .arrow {
            float: right;
        }

        /* Ẩn menu khi màn hình dưới 576px */
        @media (max-width: 575.98px) {
            .menu {
                position: absolute;
                top: 50px;
                left: 10px;
                width: 200px;
                display: none; /* Ẩn ban đầu */
                z-index: 1000;
                border: 1px solid #ddd;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            .menu.show {
                display: block; /* Khi mở menu */
            }
            .menu-item {
                background: white;
                color: black;
            }
            .menu-item.active {
                background: red;
                color: white;
            }
            .menu-toggle {
                display: block;
                background: red;
                color: white;
                padding: 10px;
                cursor: pointer;
                text-align: left;
                width: 150px;
            }
        }

        /* Hiển thị menu bình thường trên màn hình lớn */
        @media (min-width: 576px) {
            .menu {
                display: block !important;
                position: relative;
            }
            .menu-toggle {
                display: none;
            }
        }
    </style>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("main-menu");
            menu.classList.toggle("show");
        }

        function toggleSubmenu(id, element) {
            document.querySelectorAll(".submenu").forEach(sub => sub.style.display = "none");
            document.querySelectorAll(".menu-item").forEach(item => item.classList.remove("active"));

            var submenu = document.getElementById(id);
            submenu.style.display = "block";
            element.classList.add("active");
        }
    </script>
</head>
<body>

<!-- Nút mở menu khi màn hình nhỏ -->
<div class="menu-toggle" onclick="toggleMenu()">
    ALL <span class="arrow">&#9662;</span>
</div>

<div class="menu" id="main-menu">
    <div class="menu-item" onclick="toggleSubmenu('brands-menu', this)">
        ALL <span class="arrow">&#9662;</span>
    </div>
    <div class="submenu" id="brands-menu">
        <?php foreach ($brands as $brand): ?>
            <div class="menu-item"><?= htmlspecialchars($brand) ?></div>
        <?php endforeach; ?>
    </div>

    <div class="menu-item" onclick="toggleSubmenu('new-menu', this)">
        NEW <span class="arrow">&#9662;</span>
    </div>
    <div class="submenu" id="new-menu">
        <!-- <div class="menu-item">Option 1</div>
        <div class="menu-item">Option 2</div> -->
    </div>

    <div class="menu-item" onclick="toggleSubmenu('used-menu', this)">
        USED <span class="arrow">&#9662;</span>
    </div>
    <div class="submenu" id="used-menu">
        <!-- <div class="menu-item">Option A</div>
        <div class="menu-item">Option B</div> -->
    </div>

    <div class="menu-item" onclick="toggleSubmenu('sales-menu', this)">
        SALES
    </div>
</div>

</body>
</html>
