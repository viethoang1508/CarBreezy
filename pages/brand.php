<?php
require '../includes/connect.php'; // Kết nối database
require '../includes/header.php'; // Header

if (!isset($_GET['id']) || empty($_GET['id'])){
    die ("Error: No id provided.");
}
$id = intval($_GET['id']);
$types = ['Hatchback', 'Sedan', 'SUV', 'Convertible'];
$cars = [];
foreach ($types as $type) {
    $query = "SELECT * FROM products WHERE type = '$type' and brand_id = ? ORDER BY created_at DESC";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $cars[$type][] = $row;
        }
    } else {
        die("Lỗi truy vấn danh sách xe: " . $mysqli->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/car.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Car</title>
    
</head>
<body>
<body>
    <div class="container">
        <div class="sidebar">
            <?php require '../includes/car_menu.php'; ?>
        </div>

        <div class="content">
            <h2>CARS</h2>
            <?php foreach ($cars as $type => $list): ?>
                <h3><?= strtoupper($type) ?></h3>
                <div class="car-list">
                    <?php foreach ($list as $car): ?>
                        <div class="car-item">
                            <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['name'] ?>">
                            <p><?= $car['name'] ?></p>
                            <p><?= number_format($car['price'], 0, ',', '.') ?> vnđ</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</body>
</html>
<?php
    require('../includes/footer.php');
?>