<?php 
    require('../includes/header1.php');
    require('../includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        .carousel-item img {
            max-height: 450px;
            object-fit: cover;
            justify-self: center;
        }
        
        .about_us{
            text-align: center;
            font-weight: bolder;
            color: darkgray;
            margin-top: 20px;
            font-family: 'Times New Roman', Times, serif;
            letter-spacing: 10px;
        }
        .about-us-section-content{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            font-family: 'Times New Roman', Times, serif;
            text-align: justify;
        }
        .about-us-section-content button {
            background-color: #D81324; /* Màu đỏ */
            color: white;
            border: none;
            padding: 10px 20px; /* Tăng khoảng cách */
            width: 120px; /* Tăng chiều rộng */
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            margin: 10px auto;
        }
        .about-us-section-content a {
            text-decoration: none;
            color: white;
        }
        /* Khi rê chuột vào */
        .about-us-section-content button:hover {
            background-color: #A50E1A; /* Màu đỏ đậm hơn */
            transform: scale(1.05); /* Hiệu ứng phóng to nhẹ */
        }

        @media (max-width: 768px) {
            .about-us-section-content.d-block.d-md-none img {
                height: 150px; /* Giảm chiều cao ảnh */
                object-fit: cover; /* Giữ tỷ lệ và cắt ảnh nếu cần */
                
            }
        }
        @media (min-width: 768px) {
            .about-us-section-content .image,
            .about-us-section-content .content {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .about-us-section-content .row {
                height: 100%;
            }
        }
        @media (min-width: 992px) {
            .about-us-section-content .image img {
                max-height: 350px; /* Giới hạn chiều cao ảnh */
                object-fit: cover; /* Đảm bảo ảnh giữ tỷ lệ */
            }
        }
        span {
            color: #D81324; /* Màu đỏ */
            font-weight: bolder;
        }
        .about-us-section-content {
            margin-bottom: 20px;
        }
        .background-consult-form {
            background-image: url('../assets/images/background_consult_form.jpg');
            background-size: cover;
            background-position: center;
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }
        .consult-form {
            background: rgba(216, 19, 36, 0.8); /* Màu đỏ trong suốt */
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            width: 100%;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .consult-form h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-family: 'Times New Roman', Times, serif;
        }
        .consult-form input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
        }
        .double-row {
            display: flex;
            gap: 10px;
        }
        .submit-btn {
            background: blue;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background: darkblue;
        }

    </style>
</head>
<body>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../assets/images/banner_01.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/images/banner_02.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/images/banner_03.jpg" alt="Third slide">
                </div>
            </div>
        </div>
        
        <h2 class="about_us" style="font-family: Arial, Helvetica, sans-serif;">ABOUT US</h2>
        <!-- Hiển thị trên điện thoại -->
        <div class="about-us-section-content d-block d-md-none">
            <div class="row">
                <img class="img-fluid" src="../assets/images/about_us_section_02.jpg" alt="">
                <h3>
                    <span>CarBreezy</span> is a leading automotive digital marketplace that seeks to make car buying and selling easy, transparent and efficient.
                </h3>
                <p>Your car buying destiny is in your hands, but we will help you every step of the way. We built this site to make car buying as fast and easy as possible.</p>
                <p>From discovery to delivery, consumers can use CarBreezy to explore vehicles from an expansive, cross-brand selection of inventory from our vast network ...</p>
                <button><a href="">See more</a></button>
            </div>
        </div>
        <!-- Hiển thị trên tablet trở lên -->
        <div class="about-us-section-content d-none d-md-block ">
            <div class="row">
                <div class="col-6 image">
                    <img class="img-fluid d-none d-md-block d-lg-none" src="../assets/images/about_us_section.jpg" alt="">
                    <img class="img-fluid d-none d-lg-block" src="../assets/images/about_us_section_03.jpg" alt="">
                </div>
                <div class="col-6 content">
                    <h3>
                        CarBreezy is a leading automotive digital marketplace that seeks to make car buying and selling easy, transparent and efficient.
                </h3>
                <p>Your car buying destiny is in your hands, but we will help you every step of the way. We built this site to make car buying as fast and easy as possible.</p>
                <p>From discovery to delivery, consumers can use CarBreezy to explore vehicles from an expansive, cross-brand selection of inventory from our vast network ...</p>
                <button><a href="">See more</a></button>
                </div>
            </div>
        </div>
        
        <div class="background-consult-form">
            <div class="consult-form">
            <h2>BOOK FOR CONSULTING</h2>
            <form action="" method="post">
                <div class="double-row">
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>
                <input type="email" name="email" placeholder="Email" required>
                <div class="double-row">
                    <input type="text" name="phone" placeholder="Phone" required>
                    <input type="text" name="gender" placeholder="Gender" required>
                </div>
                <input type="text" name="address" placeholder="Address" required>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
        </div>
        <h2 class="about_us" style="font-family: Arial, Helvetica, sans-serif;">CARS</h2>

    </div>
</body>
</html>
<?php 
    require('../includes/footer.php');
?>