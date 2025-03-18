<?php
require '../includes/connect.php'; // Kết nối database

if (isset($_GET['name'])) {
    $car_name = $mysqli->real_escape_string($_GET['name']);

    // Truy vấn lấy thông tin chi tiết xe từ bảng products và brands
    $query = "SELECT brands.name AS brand_name, products.*, product_detail.engine, product_detail.horsepower, 
                     product_detail.fuel_type, product_detail.dimensions, product_detail.weight, 
                     product_detail.interior, product_detail.exterior 
              FROM products 
              JOIN brands ON products.brand_id = brands.id 
              LEFT JOIN product_detail ON products.id = product_detail.product_id
              WHERE products.name = '$car_name' 
              LIMIT 1";

    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $car = $result->fetch_assoc();
        ?>
        <div class="text-center">
            <img src="../assets/images/car_picture/<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['name']) ?>" class="img-fluid mb-3">
            <h3><?= htmlspecialchars($car['name']) ?></h3>
            <p><strong>Hãng:</strong> <?= htmlspecialchars($car['brand_name']) ?></p>
            <p><strong>Loại:</strong> <?= htmlspecialchars($car['type']) ?></p>
            <p><strong>Giá:</strong> <?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
            <p><strong>Trạng thái:</strong> <?= htmlspecialchars($car['status']) ?></p>
            <p><strong>Ngày thêm:</strong> <?= date("d/m/Y", strtotime($car['created_at'])) ?></p>
            <!-- Hiển thị thông số kỹ thuật -->
            <h4 class="mt-3">Thông số kỹ thuật</h4>
            <p><strong>Động cơ:</strong> <?= htmlspecialchars($car['engine']) ?></p>
            <p><strong>Công suất:</strong> <?= htmlspecialchars($car['horsepower']) ?> HP</p>
            <p><strong>Loại nhiên liệu:</strong> <?= htmlspecialchars($car['fuel_type']) ?></p>
            <p><strong>Kích thước:</strong> <?= htmlspecialchars($car['dimensions']) ?></p>
            <p><strong>Trọng lượng:</strong> <?= number_format($car['weight'], 2, ',', '.') ?> kg</p>

            <!-- Hiển thị nội thất và ngoại thất -->
            <h4 class="mt-3">Nội thất</h4>
            <p><?= nl2br(htmlspecialchars($car['interior'])) ?></p>

            <h4 class="mt-3">Ngoại thất</h4>
            <p><?= nl2br(htmlspecialchars($car['exterior'])) ?></p>
        </div>
        <?php
    } else {
        echo "<p class='text-danger'>Không tìm thấy thông tin xe.</p>";
    }
} else {
    echo "<p class='text-danger'>Thiếu thông tin xe.</p>";
}
?>
