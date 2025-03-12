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
            background-color: #333;
            color: white;
            padding: 20px;
        }
        .col1 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo-img {
            width: 100%;
            max-width: 200px;
        }
        .logo_links{
            margin-top: 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            flex-wrap:wrap-reverse;
            align-items: center;
            justify-items: center;
        }
        .logo_links img {
            width: 100%;
            max-width: 20px;
        }
        .col-4 h3{
            font-family: 'Oswald', sans-serif;
        }
        .col-4 p{
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
    <div class="footer">
        <div class="row">
            <div class="col1 col-4">
                <img src="../assets/images/logo-transparent.png" alt="" class="img-fluid logo-img">
                <div class="logo_links">
                    <img src="../assets/images/twitter-brands.svg" alt="">
                    <img src="../assets/images/facebook-brands.svg" alt="">
                    <img src="../assets/images/youtube-brands.svg" alt="">
                    <img src="../assets/images/square-instagram-brands.svg" alt="">
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
        <div>
            <p style="text-align: center;">© CarBreezy</p>
        </div>
    </div>
</body>
</html>