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
    .header1 {
        font-size: small;
        background-color: #D81324;
        padding: 5px 20px; /* Thêm padding ngang */
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    .header1_part1, .header1_part2 {
        display: flex;
        flex-direction: row;
        align-items: center; 
        gap: 10px; /* Tăng khoảng cách giữa các phần tử */
    }
    .header1_part1 p, .header1_part2 p {
        margin: 0; /* Xóa margin mặc định của thẻ <p> */
    }
    .header1 img {
        width: 15px; /* Điều chỉnh kích thước icon */
        height: auto;
    }


    </style>
</head>
<body>
    <div class="header1">
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