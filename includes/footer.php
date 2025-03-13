<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        
    .footer {
    background-color: #222; /* Màu nền tối hơn để tăng độ tương phản */
    color: white;
    padding: 40px 10px; /* Tăng padding để footer trông rộng rãi hơn */
    }

.footer .row {
    display: flex;
    justify-content: space-between;
    align-items: start;
    flex-wrap: wrap;
    }

.col1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    }

.logo-img {
    width: 100%;
    max-width: 180px; /* Giảm nhẹ kích thước logo cho cân đối */
    }

.logo_links {
    margin-top: 15px;
    display: flex;
    flex-direction: row;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

.logo_links img {
    width: 100%;
    max-width: 24px; /* Tăng nhẹ kích thước icon */
    transition: transform 0.3s ease-in-out;
}

/* Hiệu ứng hover cho icon mạng xã hội */
.logo_links img:hover {
    transform: scale(1.2);
    opacity: 0.8;
}

.col-4 h3 {
    font-family: 'Oswald', sans-serif;
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.col-4 p {
    font-family: 'Times New Roman', Times, serif;
    font-size: 16px;
    line-height: 1.6;
}

/* Phần Copyright */
.footer-bottom {
    text-align: center;
    font-weight: 600;
    padding-top: 15px;
    padding-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    background-color: #111; /* Màu nền footer-bottom */
    color: #fff;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.footer-bottom .brand-name {
    color: #D81324; /* Màu đỏ đặc trưng */
    font-weight: bold;
}

/* Responsive Footer */
@media (max-width: 768px) {
    .footer .row {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .col-4 {
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>
    <div class="footer">
        <div class="row">
            <div class="col1 col-4">
                <img src="../assets/images/logo-transparent.png" alt="" class="img-fluid logo-img">
                <div class="logo_links">
                    <img src="../assets/images/twitter-brands.svg" alt="twitter">
                    <img src="../assets/images/facebook-brands.svg" alt="facebook">
                    <img src="../assets/images/youtube-brands.svg" alt="youtube">
                    <img src="../assets/images/square-instagram-brands.svg" alt="instagram">
                </div>
            </div>
            <div class="col-4">
                <h3>Openning Hours</h3>
                <p>Monday - Friday: <br>9:00AM - 9:00PM</p>
                <p>Saturday - Sunday: <br>09.00 AM - 12.00 PM</p>
            </div>
            <div class="col-4">
                <h3>Address</h3>
                <p>Address 1: <br>123 Main St, Anytown, USA</p>
                <p>Address 2: <br>123 Main St, Anytown, USA</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 <span class="brand-name">CarBreezy</span>. All Rights Reserved.</p>
        </div>

    </div>
</body>
</html>