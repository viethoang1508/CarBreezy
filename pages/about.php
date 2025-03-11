<?php  
    require('../includes/header.php');
    require('../includes/header2.php');
?>

<!-- Car Banner Section - Full Width (DÙNG BOOTSTRAP) -->
<div class="container-fluid px-0 position-relative">
    <img src="../assets/images/honda-civic-1-9932-17131664376171739260029-1713342786612-1713342786802744576194.webp" 
         alt="Car Banner" 
         class="img-fluid w-100 car-banner-img">

    <!-- Overlay Black Background -->
    <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <!-- Text Content -->
    <div class="banner-text-overlay position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="display-3 fw-bold text-white banner-title">ABOUT</h1>
        <div class="banner-underline mx-auto"></div>
    </div>
</div>

<!-- About Section Content -->
<div class="container-fluid py-5 mt-5 px-5">
    <div class="row align-items-start about-content-section g-4">
        <div class="col-lg-8">
            <h2 class="text-uppercase fw-bold text-secondary mb-2" style="font-size: 3rem;">WELCOME TO</h2>
            <h1 class="text-danger fw-bold display-1 mb-4" style="font-size: 6rem;">CarBreezy</h1>
            <p class="mb-4 fw-bold fs-3">CarBreezy is transforming the way people buy and sell cars. As a leading automotive digital marketplace, we make car buying easy, transparent, and efficient. Whether you're searching for your dream car or selling your current one, we provide the tools and insights to help you make confident decisions.</p>
            <p class="mb-4 fw-bold fs-3">With a vast selection from trusted dealers, CarBreezy simplifies the process from search to purchase. Our online platform lets you explore, compare, and even complete your purchase from home, giving you flexibility and control.</p>
            <p class="fw-bold fs-3">Built on trust and transparency, CarBreezy offers clear pricing, unbiased research, and an innovative digital experience. Your car-buying journey is in your hands—and we’re here to support you every step of the way.</p>
        </div>
        <div class="col-lg-4 d-flex justify-content-center">
            <img src="../assets/images/image 22.jpg" alt="Car Image" class="img-fluid rounded shadow w-75">
        </div>
    </div>
</div>

<!-- Additional Image Section with Text Overlays -->
<div class="container-fluid py-4 px-5">
    <div class="position-relative">
        <img src="../assets/images/pngtree-dark-suv-expeditionary-ride-standing-alone-on-a-black-backdrop-in-picture-image_5811853.jpg" alt="Car Image" class="img-fluid w-100 rounded shadow">
        <div class="position-absolute top-0 start-0 w-100 h-100 text-white d-flex flex-column justify-content-center align-items-center px-4 text-center" style="background-color: rgba(0,0,0,0.5);">
            <div class="mb-4">
                <h3 class="fw-bold">2018 – The Idea Was Born</h3>
                <p>Seeing the challenges in car buying and selling, a team of automotive and tech enthusiasts united to create a more transparent experience.</p>
            </div>
            <div class="mb-4">
                <h3 class="fw-bold">2019 – CarBreezy Officially Launched</h3>
                <p>After months of development, CarBreezy launched as an online platform to streamline car searches and enhance pricing transparency.</p>
            </div>
            <div class="mb-4">
                <h3 class="fw-bold">2020 – Expansion and Dealer Partnerships</h3>
                <p>We grew our dealer network nationwide, offering more vehicle choices and new research tools for easy model, price, and feature comparisons.</p>
            </div>
            <div>
                <h3 class="fw-bold">2024 – Looking to the Future</h3>
                <p>CarBreezy continues to innovate, expanding services, enhancing digital financing, and improving the customer experience—all to make car buying and selling easier than ever.</p>
            </div>
        </div>
    </div>
</div>

<style>
.car-banner-img {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    object-position: center;
}

.banner-overlay {
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
    position: absolute;
}

.banner-text-overlay {
    z-index: 2;
}

.banner-title {
    letter-spacing: 10px;
    margin-bottom: 10px;
}

.banner-underline {
    width: 80px;
    height: 3px;

}

.about-content-section {
    margin-top: 0 !important;
}

@media (max-width: 768px) {
    .car-banner-img {
        height: 300px;
    }
    .banner-title {
        font-size: 2rem;
    }
    .banner-underline {
        width: 50px;
    }
}
</style>

<?php 
    require('../includes/footer.php');
?>
