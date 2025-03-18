<?php
require '../includes/connect.php';

if (isset($_GET['name'])) {
    $car_name = $mysqli->real_escape_string($_GET['name']);

    $query = "SELECT brands.name AS brand_name, products.*, product_detail.engine, 
                     product_detail.horsepower, product_detail.fuel_type, product_detail.dimensions, 
                     product_detail.weight, product_detail.interior, product_detail.exterior 
              FROM products 
              JOIN brands ON products.brand_id = brands.id 
              LEFT JOIN product_detail ON products.id = product_detail.product_id
              WHERE products.name = '$car_name' 
              LIMIT 1";

    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $car = $result->fetch_assoc();
        ?>
        <div class="text-center mb-3">
            <img src="../assets/images/car_picture/<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['name']) ?>" class="img-fluid">
            <h3><?= htmlspecialchars($car['name']) ?></h3>
        </div>

        <h4>General Information</h4>
        <table class="table table-bordered">
            <tr><th>Brand</th><td><?= htmlspecialchars($car['brand_name']) ?></td></tr>
            <tr><th>Type</th><td><?= htmlspecialchars($car['type']) ?></td></tr>
            <tr><th>Price</th><td><?= number_format($car['price'], 0, ',', '.') ?> VND</td></tr>
            <tr><th>Status</th><td><?= htmlspecialchars($car['status']) ?></td></tr>
            <tr><th>Added On</th><td><?= date("d/m/Y", strtotime($car['created_at'])) ?></td></tr>
        </table>

        <h4>Technical Specifications</h4>
        <table class="table table-bordered">
            <tr><th>Engine</th><td><?= htmlspecialchars($car['engine']) ?></td></tr>
            <tr><th>Horsepower</th><td><?= htmlspecialchars($car['horsepower']) ?> HP</td></tr>
            <tr><th>Fuel Type</th><td><?= htmlspecialchars($car['fuel_type']) ?></td></tr>
            <tr><th>Dimensions</th><td><?= htmlspecialchars($car['dimensions']) ?></td></tr>
            <tr><th>Weight</th><td><?= number_format($car['weight'], 2, ',', '.') ?> kg</td></tr>
            <tr><th>Interior</th><td><?= nl2br(htmlspecialchars($car['interior'])) ?></td></tr>
            <tr><th>Exterior</th><td><?= nl2br(htmlspecialchars($car['exterior'])) ?></td></tr>
        </table>
        <?php
    } else {
        echo "<p class='text-danger'>Không tìm thấy thông tin xe.</p>";
    }
}
?>
