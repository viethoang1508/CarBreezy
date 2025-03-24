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
    <title>Contact Us</title>
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">

</head>
<body>
        <div class="banner" >
            <img style="" src="../assets/images/contact_banner_01.jpg" alt="">
            <h1>CONTACT US</h1>
        </div>
    
        <div class="container">
        <h1 class="information">
            INFORMATION
        </h1>
        <div class="info">
            <div class="col1">
                <div class="email">
                    <div class="image">
                        <img src="../assets/images/red_email.svg" alt="">
                    </div>
                    <div class="content">
                        <h3 >Email</h3>
                        <p>carbreezy@gmail.com</p>
                    </div>
                </div>
                <div class="phone_contact">
                    <div class="image">
                        <img src="../assets/images/red_phone.svg" alt="">
                    </div>
                    <div class="content">
                        <h3>Phone</h3>
                        <p>0123456789</p>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="time">
                    <div class="image">
                        <img src="../assets/images/red_clock.svg" alt="">
                    </div>
                    <div class="content">
                        <h3>Opening Hours</h3>
                        <p><strong>Monday - Friday: <br></strong>
                        9.00AM - 9.00PM<br>
                    <strong>Saturday - Sunday: </strong><br>
                        9.00AM - 10.00PM</p>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="background-consult-form">
    <div class="consult-form">
    <h2>BOOK FOR CONSULTING</h2>
    <form id="consultForm">
        <div class="double-row">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
        </div>
        <input type="email" name="email" placeholder="Email" required>
        <div class="double-row">
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="text" name="gender" placeholder="Gender (Nam/Nữ)" required>
        </div>
        <input type="text" name="address" placeholder="Address" required>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
    <div id="errorBox" class="error-box" style="display: none;"></div>
    <div id="responseMessage"></div>
</div>
</div>
        <div class="address">
            <div class="address_title">
                <img src="../assets/images/red_map.svg" alt="">
                <h3 style="margin: 0; padding: 0;">Address</h3>
            </div>
            <div class="add1">
                <p><strong>Address 1: </strong>123 Street A</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7400015259363!2d105.8478090748618!3d21.00305678063986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac428c3336e5%3A0xb7d4993d5b02357e!2sAptech%20Computer%20Education!5e0!3m2!1sen!2s!4v1741695245336!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="add2">
                <p><strong>Address 2: </strong> 456 Street B</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7400015259363!2d105.8478090748618!3d21.00305678063986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac428c3336e5%3A0xb7d4993d5b02357e!2sAptech%20Computer%20Education!5e0!3m2!1sen!2s!4v1741695245336!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
           
        </div>
            
    </div>
</body>
<script>
document.getElementById('consultForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const errorBox = document.getElementById('errorBox');
    const responseMessage = document.getElementById('responseMessage');
    const form = this;
    const formData = new FormData(form);
    let errors = [];

    // Xóa thông báo cũ
    errorBox.innerHTML = '';
    errorBox.style.display = 'none';
    responseMessage.innerText = '';

    // Lấy dữ liệu
    const firstName = formData.get('first_name').trim();
    const lastName  = formData.get('last_name').trim();
    const email     = formData.get('email').trim();
    const phone     = formData.get('phone').trim();
    const gender    = formData.get('gender').trim();
    const address   = formData.get('address').trim();

    // Kiểm tra dữ liệu
    if (!/^[a-zA-ZÀ-ỹ\s]+$/.test(firstName)) errors.push('Invalid first name.');
    if (!/^[a-zA-ZÀ-ỹ\s]+$/.test(lastName)) errors.push('Invalid last name.');
    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) errors.push('Invalid email.');
    if (!/^\d{10}$/.test(phone)) errors.push('Phone must be 10 digits.');
    if (!/^(Nam|Nữ)$/i.test(gender)) errors.push('Gender must be "Nam" or "Nữ".');
    const addressPattern = /^[a-zA-ZÀ-ỹ0-9\s,._-]{5,}$/;
    if (address.length < 5 || !addressPattern.test(address)) {
        errors.push('Address is invalid. Use only letters, numbers, comma, dot, dash, underscore.');
    }

    // Nếu có lỗi
    if (errors.length > 0) {
        errorBox.innerHTML = errors.join('<br>');
        errorBox.style.display = 'block';
        return;
    }

    // Gửi AJAX
    fetch('../includes/submit_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            responseMessage.innerText = 'Submitted successfully!';
            form.reset();
        } else {
            responseMessage.innerText = data; // In lỗi chi tiết từ PHP nếu có
        }
    })
    .catch(error => {
        responseMessage.innerText = 'Error sending data. Try again.';
        console.error('AJAX Error:', error);
    });
});
</script>





</html>
<?php 
    require('../includes/footer.php');
?>