<?php
require '../includes/connect.php'; // Kết nối database
require '../includes/header.php'; // Header

// Kiểm tra kết nối
if (!$mysqli) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy danh sách ảnh xe từ bảng product_images
$query = "SELECT pi.image, p.name AS car_name, b.name AS brand_name 
          FROM product_images pi 
          JOIN products p ON pi.product_id = p.id 
          JOIN brands b ON p.brand_id = b.id 
          ORDER BY pi.created_at DESC";
$result = $mysqli->query($query);

if (!$result) {
    die("Lỗi truy vấn danh sách ảnh: " . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/gallery.css">
    <title>Car Gallery</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Car Gallery</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="gallery-item">
                        <img src="../assets/images/car_picture/<?= htmlspecialchars($row['image']) ?>" 
                             alt="<?= htmlspecialchars($row['car_name']) ?>" 
                             class="img-fluid gallery-img">
                        <p class="text-center mt-2"><strong><?= htmlspecialchars($row['brand_name']) ?> - <?= htmlspecialchars($row['car_name']) ?></strong></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script>
        document.querySelectorAll('.gallery-img').forEach(img => {
            img.addEventListener('click', function() {
                let modal = document.createElement('div');
                modal.classList.add('img-modal');
                modal.innerHTML = `<div class="img-modal-content"><img src="${this.src}" class="img-fluid"><span class="close-modal">&times;</span></div>`;
                document.body.appendChild(modal);
                document.querySelector('.close-modal').addEventListener('click', () => modal.remove());
            });
        });
    </script>
    <style>
        .gallery-item {
            text-align: center;
            transition: transform 0.3s;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
        .img-modal {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img-modal-content {
            position: relative;
            max-width: 80%;
        }
        .close-modal {
            position: absolute;
            top: 10px; right: 15px;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }
    </style>
</body>
</html>
<?php require('../includes/footer.php'); ?>
