<?php
require '../includes/connect.php';
require '../includes/header.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Chuyển hướng về trang danh sách xe nếu không có id
    header("Location: car.php");
    exit;
} else {
    $id = intval($_GET['id']);
}

$get_car_info = $mysqli->prepare("SELECT brands.name AS brand_name, products.*, product_detail.engine, 
                     product_detail.horsepower, product_detail.fuel_type, product_detail.dimensions, 
                     product_detail.weight, product_detail.interior, product_detail.exterior,
                     COALESCE((products.price * (1 - product_offer.discount / 100)), products.price) AS discounted_price,
                     product_offer.discount
              FROM products 
              JOIN brands ON products.brand_id = brands.id 
              LEFT JOIN product_detail ON products.id = product_detail.product_id
              LEFT JOIN product_offer ON products.id = product_offer.product_id 
              AND product_offer.valid_until >= CURDATE()
              WHERE products.id = ? 
              LIMIT 1");
$get_car_info->bind_param("i", $id);
$get_car_info->execute();
$first_car_info = $get_car_info->get_result()->fetch_assoc();

// Kiểm tra nếu không tìm thấy xe
if (!$first_car_info) {
    header("Location: car.php?error=car_not_found");
    exit;
}

$second_car_info = null;
if (isset($_GET['second_car_id'])) {
    $second_car_id = intval($_GET['second_car_id']);
    $get_second_car = $mysqli->prepare("SELECT brands.name AS brand_name, products.*, 
                        product_detail.engine, product_detail.horsepower, 
                        product_detail.fuel_type, product_detail.dimensions, 
                        product_detail.weight, product_detail.interior, product_detail.exterior, 
                        COALESCE((products.price * (1 - product_offer.discount / 100)), products.price) AS discounted_price, 
                        product_offer.discount 
                FROM products 
                JOIN brands ON products.brand_id = brands.id 
                LEFT JOIN product_detail ON products.id = product_detail.product_id 
                LEFT JOIN product_offer ON products.id = product_offer.product_id 
                AND product_offer.valid_until >= CURDATE() 
                WHERE products.id = ? 
                LIMIT 1");
    $get_second_car->bind_param("i", $second_car_id);
    $get_second_car->execute();
    $second_car_info = $get_second_car->get_result()->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/compare.css">
    <style>
        .contact-button {
            padding: 10px 30px;
            background-color: rgb(214, 14, 14);
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
        .remove-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .remove-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="compare-container container">
        <h1 class="text-center">COMPARE</h1>
        <?php if (!$second_car_info): ?>
            <div class="text-center mb-3">
                <a href="car.php?first_car_id=<?= $id ?>" class="btn btn-primary" style="background-color:#dc3545; border: none; ">Choose Second Car</a>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <tr>
                <td></td>
                <td>
                    <div class="text-center mb-3">
                        <img src="../assets/images/car_picture/<?= htmlspecialchars($first_car_info['image']) ?>" 
                            alt="<?= htmlspecialchars($first_car_info['name']) ?>" class="img-fluid" style="max-width: 300px;">
                        <h3><?= htmlspecialchars($first_car_info['name']) ?></h3>
                        <button class="remove-button" onclick="removeCar(1, <?= $second_car_info ? $second_car_info['id'] : 0 ?>)">Remove</button>
                    </div>
                </td>
                <td>
                    <?php if ($second_car_info): ?>
                        <div class="text-center mb-3">
                            <img src="../assets/images/car_picture/<?= htmlspecialchars($second_car_info['image']) ?>" 
                                alt="<?= htmlspecialchars($second_car_info['name']) ?>" class="img-fluid" style="max-width: 300px;">
                            <h3><?= htmlspecialchars($second_car_info['name']) ?></h3>
                            <button class="remove-button" onclick="removeCar(2, <?= $first_car_info['id'] ?>)">Remove</button>
                        </div>
                    <?php else: ?>
                        <p class="text-center">Choose the second car</p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr><td colspan="3"><h4>General Information</h4></td></tr>
            <tr><th>Brand</th><td><?= htmlspecialchars($first_car_info['brand_name']) ?></td><td><?= $second_car_info ? htmlspecialchars($second_car_info['brand_name']) : '' ?></td></tr>
            <tr><th>Type</th><td><?= htmlspecialchars($first_car_info['type']) ?></td><td><?= $second_car_info ? htmlspecialchars($second_car_info['type']) : '' ?></td></tr>
            <tr><th>Price</th>
                <td>
                    <?php if (!empty($first_car_info['discount']) && $first_car_info['discount'] > 0): ?>
                        <del style="color: gray;"><?= number_format($first_car_info['price'], 0, ',', '.') ?> VND</del><br>
                        <strong style="color: red;"><?= number_format($first_car_info['discounted_price'], 0, ',', '.') ?> VND</strong><br>
                        <small>(Discount: <?= $first_car_info['discount'] ?>%)</small>
                    <?php else: ?>
                        <?= number_format($first_car_info['price'], 0, ',', '.') ?> VND
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($second_car_info): ?>
                        <?php if (!empty($second_car_info['discount']) && $second_car_info['discount'] > 0): ?>
                            <del style="color: gray;"><?= number_format($second_car_info['price'], 0, ',', '.') ?> VND</del><br>
                            <strong style="color: red;"><?= number_format($second_car_info['discounted_price'], 0, ',', '.') ?> VND</strong><br>
                            <small>(Discount: <?= $second_car_info['discount'] ?>%)</small>
                        <?php else: ?>
                            <?= number_format($second_car_info['price'], 0, ',', '.') ?> VND
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr><th>Status</th><td><?= htmlspecialchars($first_car_info['status']) ?></td><td><?= $second_car_info ? htmlspecialchars($second_car_info['status']) : '' ?></td></tr>
            <tr><th>Added On</th><td><?= date("d/m/Y", strtotime($first_car_info['created_at'])) ?></td><td><?= $second_car_info ? date("d/m/Y", strtotime($second_car_info['created_at'])) : '' ?></td></tr>
            <tr><td colspan="3"><h4>Technical Specifications</h4></td></tr>
            <tr><th>Engine</th><td><?= htmlspecialchars($first_car_info['engine']) ?></td><td><?= $second_car_info ? htmlspecialchars($second_car_info['engine']) : '' ?></td></tr>
            <tr><th>Horsepower</th><td><?= htmlspecialchars($first_car_info['horsepower']) ?> HP</td><td><?= $second_car_info ? htmlspecialchars($second_car_info['horsepower']) . ' HP' : '' ?></td></tr>
            <tr><th>Fuel Type</th><td><?= htmlspecialchars($first_car_info['fuel_type']) ?></td><td><?= $second_car_info ? htmlspecialchars($first_car_info['fuel_type']) : '' ?></td></tr>
            <tr><th>Dimensions</th><td><?= htmlspecialchars($first_car_info['dimensions']) ?></td><td><?= $second_car_info ? htmlspecialchars($second_car_info['dimensions']) : '' ?></td></tr>
            <tr><th>Weight</th><td><?= number_format($first_car_info['weight'], 2, ',', '.') ?> kg</td><td><?= $second_car_info ? number_format($second_car_info['weight'], 2, ',', '.') . ' kg' : '' ?></td></tr>
            <tr><th>Interior</th><td><?= nl2br(htmlspecialchars($first_car_info['interior'])) ?></td><td><?= $second_car_info ? nl2br(htmlspecialchars($second_car_info['interior'])) : '' ?></td></tr>
            <tr><th>Exterior</th><td><?= nl2br(htmlspecialchars($first_car_info['exterior'])) ?></td><td><?= $second_car_info ? nl2br(htmlspecialchars($second_car_info['exterior'])) : '' ?></td></tr>
        </table>
    </div>

    <script>
        function removeCar(position, remainingCarId) {
            if (position === 1) {
                // Xóa xe đầu tiên
                if (remainingCarId) {
                    // Nếu có xe thứ hai, xe thứ hai trở thành xe đầu tiên
                    window.location.href = `compare.php?id=${remainingCarId}`;
                } else {
                    // Nếu không có xe thứ hai, quay lại car.php
                    window.location.href = 'car.php';
                }
            } else if (position === 2) {
                // Xóa xe thứ hai, giữ xe đầu tiên
                window.location.href = `compare.php?id=${remainingCarId}`;
            }
        }
    </script>
</body>
</html>
<?php require('../includes/footer.php'); ?>