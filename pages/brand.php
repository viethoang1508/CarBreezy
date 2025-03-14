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
    $query = "SELECT brands.name AS brand_name, products.name AS car_name, products.price, products.type, products.status, products.image, products.created_at 
                FROM products 
                join brands on products.brand_id = brands.id
                WHERE type = '$type' and brand_id = ?
                ORDER BY created_at DESC";
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
<<<<<<< HEAD
            <div class="type_filter">
                <label for="type_filter">Type Filter</label>
                <select id="type_filter" class="form-select">
                    <option value="all">All Types</option>
                    <?php foreach($types as $type): ?>
                        <option value="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></option>
=======
            <?php foreach ($cars as $type => $list): ?>
                <h3><?= strtoupper($type) ?></h3>
                <div class="car-list">
                    <?php foreach ($list as $car): ?>
                        <div class="car-item">
                            <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['name'] ?>">
                            <p><?= $car['name'] ?></p>
                            <p><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                        </div>
>>>>>>> 00b95c0e49a482f2ac7ea9699e0c41fca99cfd93
                    <?php endforeach; ?>
                </select>
            </div>
            <?php foreach ($cars as $type => $list): ?>
                <h3 class="brand_title" data-type="<?= htmlspecialchars($type) ?>"><?= strtoupper($type) ?></h3>
                <div class="slider car-section" data-type="<?= htmlspecialchars($type) ?>">
                    <span class="arrow" onclick="prevSlide()">&#9665;</span>
                    <div class="car-list">
                        <div class="car-wrapper">
                            <?php foreach ($list as $car): ?>
                                <div class="car-item">
                                    <p><strong><?= $car['status'] ?></strong> | <strong><?= $car['type'] ?></strong></p>
                                    <img src="../assets/images/car_picture/<?= $car['image'] ?>" alt="<?= $car['car_name'] ?>">
                                    <h3><?= $car['car_name'] ?></h3>
                                    <p><strong>Hãng:</strong> <span class="car_brand_name"><?= $car['brand_name'] ?></span></p>
                                    <p class="price"><?= number_format($car['price'], 0, ',', '.') ?> VNĐ</p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <span class="arrow" onclick="nextSlide()">&#9655;</span>
                </div>
                    <script>
                        let index = 0;
                        const carWrapper = document.getElementById("car-wrapper");
                        const carWidth = 260; // 250px + margin
                        const totalCars = document.querySelectorAll(".car-item").length;
                        const maxIndex = totalCars - 4; // Hiển thị 3 xe mỗi lần

                        function updateSlide() {
                            carWrapper.style.transform = `translateX(${-index * carWidth}px)`;
                        }

                        function nextSlide() {
                            if (index < maxIndex) index++;
                            updateSlide();
                        }

                        function prevSlide() {
                            if (index > 0) index--;
                            updateSlide();
                        }
                    </script>
            <?php endforeach; ?>

        </div>
    </div>
    <script>
        document.getElementById("type_filter").addEventListener("change", function () {
            let selectedType = this.value.toLowerCase();
            let carSections = document.querySelectorAll(".car-section");
            let titles = document.querySelectorAll(".brand_title");

            carSections.forEach(section => {
                let type = section.getAttribute("data-type").toLowerCase();
                if (selectedType === "all" || type === selectedType) {
                    section.style.display = "flex";
                } else {
                    section.style.display = "none";
                }
            });

            titles.forEach(title => {
                let type = title.getAttribute("data-type").toLowerCase();
                if (selectedType === "all" || type === selectedType) {
                    title.style.display = "flex";
                } else {
                    title.style.display = "none";
                }
            });
        });
    </script>
    </div>
</body>
</body>
</html>
<?php
    require('../includes/footer.php');
?>