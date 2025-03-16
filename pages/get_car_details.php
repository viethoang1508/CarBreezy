<?php
require '../includes/connect.php'; // Kết nối database

if (isset($_GET['name'])) {
    $car_name = $mysqli->real_escape_string($_GET['name']);

    // Truy vấn lấy thông tin chi tiết xe
    $query = "SELECT brands.name AS brand_name, products.* 
              FROM products 
              JOIN brands ON products.brand_id = brands.id 
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
        </div>
        <?php
    } else {
        echo "<p class='text-danger'>Không tìm thấy thông tin xe.</p>";
    }
} else {
    echo "<p class='text-danger'>Thiếu thông tin xe.</p>";
}
?>
