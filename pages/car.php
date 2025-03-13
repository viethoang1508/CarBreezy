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
<?php
    require('../includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Car</title>
    
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <?php require '../pages/car_menu.php'; ?>
        </div>
    </div>
</body>
</html>
<?php
    require('../includes/footer.php');
?>