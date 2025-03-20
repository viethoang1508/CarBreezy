<?php
require '../includes/connect.php';
?>
<!-- code css liên hệ  -->
<style>
    .contact-button {
        padding: 10px 30px;
        background-color:rgb(214, 14, 14); /* Màu đỏ đậm */
        color: white;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.2s;
        border: 2px solid transparent;
    }

    .contact-button:hover {
        background-color: white;
        color:rgb(216, 27, 27);
        border-color:rgb(216, 27, 27);
        transform: scale(1.05);
    }
</style>
<?php
if (isset($_GET['name'])) {
    $car_name = $mysqli->real_escape_string($_GET['name']);

    $query = "SELECT brands.name AS brand_name, products.*, product_detail.engine, 
                     product_detail.horsepower, product_detail.fuel_type, product_detail.dimensions, 
                     product_detail.weight, product_detail.interior, product_detail.exterior,
                     COALESCE((products.price * (1 - product_offer.discount / 100)), products.price) AS discounted_price,
                     product_offer.discount
              FROM products 
              JOIN brands ON products.brand_id = brands.id 
              LEFT JOIN product_detail ON products.id = product_detail.product_id
              LEFT JOIN product_offer ON products.id = product_offer.product_id 
              AND product_offer.valid_until >= CURDATE()
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
            <tr><th>Price</th>
                <td>
                    <?php if (!empty($car['discount']) && $car['discount'] > 0): ?>
                        <del style="color: gray;"><?= number_format($car['price'], 0, ',', '.') ?> VND</del>
                        <br>
                        <strong style="color: red;"><?= number_format($car['discounted_price'], 0, ',', '.') ?> VND</strong>
                        <br>
                        <small>(Discount: <?= $car['discount'] ?>%)</small>
                    <?php else: ?>
                        <?= number_format($car['price'], 0, ',', '.') ?> VND
                    <?php endif; ?>
                </td>
            </tr>
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
        <div class="text-center mt-3">
    <a href="../pages/contact.php" class="contact-button">LIÊN HỆ</a>
      </div>
        <?php
    } else {
        echo "<p class='text-danger'>Không tìm thấy thông tin xe.</p>";
    }
}
?>
