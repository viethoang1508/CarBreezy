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
    <!DOCTYPE html>
        <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <title>Detail</title>
        <link rel="stylesheet" href="../assets/css/car.css">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    </head>
            <body>
            <div class="popup-container">
            <div class="popup-content">
                <span class="close-popup">&times;</span>

                <div class="text-center mb-3">
                    <img src="../assets/images/car_picture/<?= htmlspecialchars($car['image']) ?>" alt="<?= htmlspecialchars($car['name']) ?>" class="img-fluid">
                    <h3><?= htmlspecialchars($car['name']) ?></h3>
                </div>

                <!-- Table 1: General Information -->
                <h4>General Information</h4>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Brand</th>
                            <td><?= htmlspecialchars($car['brand_name']) ?></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td><?= htmlspecialchars($car['type']) ?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?= number_format($car['price'], 0, ',', '.') ?> VND</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= htmlspecialchars($car['status']) ?></td>
                        </tr>
                        <tr>
                            <th>Added On</th>
                            <td><?= date("d/m/Y", strtotime($car['created_at'])) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Table 2: Technical Specifications -->
                <h4>Technical Specifications</h4>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Engine</th>
                            <td><?= htmlspecialchars($car['engine']) ?></td>
                        </tr>
                        <tr>
                            <th>Horsepower</th>
                            <td><?= htmlspecialchars($car['horsepower']) ?> HP</td>
                        </tr>
                        <tr>
                            <th>Fuel Type</th>
                            <td><?= htmlspecialchars($car['fuel_type']) ?></td>
                        </tr>
                        <tr>
                            <th>Dimensions</th>
                            <td><?= htmlspecialchars($car['dimensions']) ?></td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td><?= number_format($car['weight'], 2, ',', '.') ?> kg</td>
                        </tr>
                        <tr>
                            <th>Interior</th>
                            <td><?= nl2br(htmlspecialchars($car['interior'])) ?></td>
                        </tr>
                        <tr>
                            <th>Exterior</th>
                            <td><?= nl2br(htmlspecialchars($car['exterior'])) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    } else {
        echo "<p class='text-danger'>Không tìm thấy thông tin xe.</p>";
    }
} else {
    echo "<p class='text-danger'>Thiếu thông tin xe.</p>";
}
?>
        </body>
        </html>
        
