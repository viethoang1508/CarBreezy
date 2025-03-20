<?php
require '../includes/connect.php';
?>
<!-- CSS nút liên hệ -->
<style>
    .contact-button {
        padding: 10px 30px;
        background-color: rgb(214, 14, 14); /* Màu đỏ đậm */
        color: white;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.2s;
        border: 2px solid transparent;
    }

    .contact-button:hover {
        background-color: white;
        color: rgb(216, 27, 27);
        border-color: rgb(216, 27, 27);
        transform: scale(1.05);
    }
</style>

<?php
if (isset($_GET['name'])) {
    $car_name = $_GET['name'];

    // Sử dụng Prepared Statement để tránh SQL Injection
    $stmt = $mysqli->prepare("
        SELECT brands.name AS brand_name, products.*, 
               product_detail.engine, product_detail.horsepower, product_detail.fuel_type, 
               product_detail.dimensions, product_detail.weight, 
               product_detail.interior, product_detail.exterior 
        FROM products 
        JOIN brands ON products.brand_id = brands.id 
        LEFT JOIN product_detail ON products.id = product_detail.product_id
        WHERE products.name = ? 
        LIMIT 1
    ");

    $stmt->bind_param("s", $car_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $car = $result->fetch_assoc();
?>
        <!-- Hiển thị hình ảnh xe -->
        <div class="text-center mb-3">
            <img src="../assets/images/car_picture/<?= htmlspecialchars($car['image']) ?>" 
                 alt="<?= htmlspecialchars($car['name']) ?>" 
                 class="img-fluid">
            <h3><?= htmlspecialchars($car['name']) ?></h3>
        </div>

        <!-- Thông tin chung -->
        <h4>General Information</h4>
        <table class="table table-bordered">
            <tr><th>Brand</th><td><?= htmlspecialchars($car['brand_name']) ?></td></tr>
            <tr><th>Type</th><td><?= htmlspecialchars($car['type']) ?></td></tr>
            <tr><th>Price</th><td><?= number_format($car['price'], 0, ',', '.') ?> VND</td></tr>
            <tr><th>Status</th><td><?= htmlspecialchars($car['status']) ?></td></tr>
            <tr><th>Added On</th><td><?= date("d/m/Y", strtotime($car['created_at'])) ?></td></tr>
        </table>

        <!-- Thông số kỹ thuật -->
        <h4>Technical Specifications</h4>
        <table class="table table-bordered">
            <tr><th>Engine</th><td><?= htmlspecialchars($car['engine'] ?: 'N/A') ?></td></tr>
            <tr><th>Horsepower</th><td><?= htmlspecialchars($car['horsepower'] ?: 'N/A') ?> HP</td></tr>
            <tr><th>Fuel Type</th><td><?= htmlspecialchars($car['fuel_type'] ?: 'N/A') ?></td></tr>
            <tr><th>Dimensions</th><td><?= htmlspecialchars($car['dimensions'] ?: 'N/A') ?></td></tr>
            <tr><th>Weight</th><td><?= number_format($car['weight'], 2, ',', '.') ?: 'N/A' ?> kg</td></tr>
            <tr><th>Interior</th><td><?= nl2br(htmlspecialchars($car['interior'] ?: 'N/A')) ?></td></tr>
            <tr><th>Exterior</th><td><?= nl2br(htmlspecialchars($car['exterior'] ?: 'N/A')) ?></td></tr>
        </table>

        <!-- Nút liên hệ -->
        <div class="text-center mt-3">
            <a href="../pages/contact.php" class="contact-button">LIÊN HỆ</a>
        </div>

<?php
    } else {
        echo "<p class='text-danger'>Không tìm thấy thông tin xe.</p>";
    }

    // Đóng statement
    $stmt->close();
}
?>