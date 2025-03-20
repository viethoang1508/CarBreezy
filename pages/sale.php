<?php 
require '../includes/header.php';
require '../includes/connect.php';

$query = "SELECT brands.name as brand_name, products.name as car_name, products.price, products.type, products.status, products.image,product_offer.title, product_offer.description, product_offer.discount, product_offer.valid_until
            FROM product_offer
            join products on product_offer.product_id = products.id
            join brands on products.brand_id = brands.id
            WHERE product_offer.valid_until > CURDATE();"; //Kiểm tra ngày
$result = $mysqli->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/sale.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="sale_page_container">
        <h1>SALE</h1>
        <div class="sale_container">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="sale_card" data-name="<?= htmlspecialchars($row['car_name'] ?? '') ?>">
                    <div class="car">
                        <p><strong><?= $row['status'] ?></strong> | <strong><?= $row['type'] ?></strong></p>
                        <img src="../assets/images/car_picture/<?= $row['image'] ?>" alt="<?= $row['car_name'] ?>">
                        <h3><?= $row['car_name'] ?></h3>
                        <p><strong>Hãng:</strong> <span class="car_brand_name"><?= $row['brand_name'] ?></span></p>
                        <p class="og_price"><?= number_format($row['price'], 0, ',', '.') ?> VNĐ</p>
                        <p class="sale_price"><?= number_format($row['price']-$row['price'] * ($row['discount']/100), 0, ',', '.') ?> VNĐ</p>
                    </div>
                    <div class="sale_info">
                        <h3><?= $row['title']?></h3>
                        <p><strong>Desciption: </strong><?= $row['description']?></p>
                        <p><strong>Discount: </strong><?= $row['discount']?>%</p>
                        <p><strong>Valid until: </strong><?= $row['valid_until']?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- Modal Bootstrap -->
    <div class="modal fade" id="carDetailModal" tabindex="-1" aria-labelledby="carDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="carDetailModalLabel">Car Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carDetailContent"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Kiểm tra xem sale_card có tồn tại không
            document.querySelectorAll(".sale_card").forEach(item => {
                item.addEventListener("click", function () {
                    let carName = this.getAttribute("data-name");
                    console.log("Car clicked:", carName); // Debug xem giá trị có đúng không

                    if (!carName) {
                        alert("Không tìm thấy tên xe.");
                        return;
                    }

                    fetch(`get_car_details.php?name=${encodeURIComponent(carName)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Error in loading car information.");
                            }
                            return response.text();
                        })
                        .then(data => {
                            document.getElementById("carDetailContent").innerHTML = data;
                            new bootstrap.Modal(document.getElementById("carDetailModal")).show();
                        })
                        .catch(error => {
                            console.error("Lỗi:", error);
                            alert("Error in loading car information.");
                        });
                });
            });
        });
    </script>
</body>
</html>
<?php require '../includes/footer.php'; ?>