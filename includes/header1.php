<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
            margin: 0;
            padding: 0%;
        }
        body {
    margin: 0;
    padding: 0;
}

.header1 {
    font-size: small;
    background-color: #D81324;
    padding: 5px 20px;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: nowrap; /* Đảm bảo không bị xuống dòng */
    width: 100%;
}

.header1_part1, .header1_part2 {
    display: flex;
    align-items: center;
    gap: 15px; /* Tăng khoảng cách giữa các phần tử */
    white-space: nowrap; /* Ngăn chữ bị xuống dòng */
}

.header1 img {
    width: 15px;
    height: auto;
    flex-shrink: 0; /* Ngăn icon bị thu nhỏ */
}

.header1_part1 p, .header1_part2 p {
    margin: 0;
    font-size: 14px; /* Giữ chữ không quá lớn */
}

    </style>
</head>
<body>
    <div class="header1 d-none d-sm-block" >
        <div class="header1_part1">
            <img src="../assets/images/location-dot-solid.svg" alt="">
            <p>123 Street A</p>
            <img src="../assets/images/location-dot-solid.svg" alt="">
            <p>123 Street B</p>
        </div>
        <div class="header1_part2">
            <img src="../assets/images/phone-solid (1).svg" alt="">
            <p>+123456789</p>
            <img src="../assets/images/twitter-brands.svg" alt="">
            <img src="../assets/images/facebook-brands.svg" alt="">
            <img src="../assets/images/youtube-brands.svg" alt="">
            <img src="../assets/images/square-instagram-brands.svg" alt="">
        </div>
    </div>
</body>
</html>