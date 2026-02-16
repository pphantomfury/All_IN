<?php
require_once 'home.php';
require_once 'vendor/autoload.php';

$All_inApp = new home();
$All_inApp->header();
$All_inApp->nav();
?>

<style>
    :root {
        --primary-art: #e54f09;
        --secondary-art: #023047;
        --accent-pink: #23faa1;
    }

    body {
        background-color: #daee08ce;
        font-family: 'Segoe UI', sans-serif;
    }

    .museum-slideshow-container {
        max-width: 1100px;
        margin: 40px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 25px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        border-top: 8px solid var(--primary-art);
        position: relative;
    }

    /* Two-column slide layout */
    .slide {
        display: none;
        align-items: center;
        gap: 40px;
        animation: slideIn 0.8s ease-out;
        min-height: 500px;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .slide-content {
        flex: 1;
        text-align: left;
    }

    .slide-content h1,
    .slide-content h2,
    .slide-content strong {
        color: #023047 !important;
        /* Force the dark blue from your vars */
    }

    .slide-content p {
        color: #333333 !important;
        /* Force a dark grey for readability */
    }

    .slide-image-container {
        flex: 1;
        height: 450px;
        max-width: 100%;
        overflow: hidden;
        border-radius: 20px;
    }

    .slide-desc {
        color: #555;
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    .main-slide-img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Location Cards */
    .location-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .loc-card {
        background: #ffffff;
        padding: 15px;
        border-radius: 15px;
        display: flex;
        gap: 15px;
        align-items: center;
        border-left: 5px solid var(--primary-art);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);

    }

    .loc-card div {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .loc-card img {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
    }

    /* Event Box */
    .event-details {
        background: orangered;
        padding: 25px;
        border-radius: 20px;
        border: 2px dashed var(--primary-art);
    }

    .price-tag {
        display: inline-block;
        background: var(--secondary-art);
        color: white;
        padding: 8px 15px;
        border-radius: 50px;
        margin: 5px;
        font-size: 0.9rem;
    }

    /* Navigation */
    .dots-container {
        text-align: center;
        margin-top: 30px;
    }

    .dot {
        height: 12px;
        width: 12px;
        margin: 0 5px;
        background-color: #ddd;
        border-radius: 50%;
        display: inline-block;
        cursor: pointer;
        transition: 0.3s;
    }

    .active {
        background-color: var(--primary-art);
        width: 30px;
        border-radius: 10px;
    }

    /* Fix for small screens */
    @media (max-width: 800px) {
        .slide {
            flex-direction: column;
            text-align: center;
        }

        .slide-content {
            text-align: center;
        }

        .main-slide-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
    }
</style>

<div class="museum-slideshow-container">
    <div class="slide" style="display: flex;">
        <div class="slide-content">
            <h1>National Parks </h1>
            <p class="slide-desc">
                Nairobi is the world's only capital city with a national park on its doorstep. These protected
                landscapes serve as a vital sanctuary for endangered species and offer a breathtaking
                glimpse into the raw beauty of the African savannah.
            </p>
            <p>xperience the majestic sight of lions and rhinos roaming freely against the backdrop of the city skyline
            </p>
        </div>
        <div class="slide-image-container">
            <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?w=800" class="main-slide-img">
        </div>
    </div>

    <div class="slide">
        <div class="slide-content">
            <h2>Top Parks in Nairobi 📍</h2>
            <div class="location-list">
                <div class="loc-card">
                    <img
                        src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoapCTjdC-K_zkf6iXZsrMJDI6xo4is4RYZm3XcGIDWd9KzP_spDAoQoriiIJKI75hvACqAdL4ODZvgl0wXiDQc53LbhZpVRR_g2JbrQ-8i2FrSIs35xDkIqEp-UTqje3skVHrY=w171-h171-n-k-no">
                    <div>
                        <strong>Central Park Nairobi</strong>
                        <p>CBD Nairobi
                            |8:30 AM to 5:00 PM</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Central+Park+Nairobi"
                            target="_blank" class="direction-btn">Get Directions</a>
                    </div>
                </div>
                <div class="loc-card">
                    <img
                        src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep9H-XQqxSflJRW3o5aY-dWbplF8McXklz79HGM2mLCL99BpY8rNidV7C8mIv9m6q4eMS5FMVwAiC3xCSuC7QPZtXTodnI7S0ZLBobfdKUUjDfaGRwgExSBTI2MMpCWTURRtgdt=w138-h138-n-k-no">
                    <div>
                        <strong>Uhuru Park</strong>
                        <p>Uhuru Highway | 8:30 a.m. to 5 p.m. on weekdays,
                            and 9:00 a.m. to 5 p.m. on weekend</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Uhuru+Park+Nairobi" target="_blank"
                            class="direction-btn">Get Directions</a>

                    </div>
                    <div class="loc-card">
                        <img
                            src="https://lh3.googleusercontent.com/gps-cs-s/AHVAweoyDkk0ft8u6pzqF3Ku_4XqPPyp2QYB5gRavIQZJbcWKsl-c1_7xiGKT-HJmLOdxCKFsCjZVRpTsweSzhJ4UMwwKIdNB2NGa24AwMT62t9DkT7DBh5WPyDtGrPjqfwJrdFEIGXA=w138-h138-n-k-no">
                        <div>
                            <strong>Snake Park</strong>
                            <p> Museum Hill in Nairobi | 8:30 a.m. to 5:30 p.m.| </p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=Nairobi+Snake+Park"
                                target="_blank" class="direction-btn">Get Directions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dots-container">
        <span class="dot active" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>

<script>
    let slideIndex = 1;
    let timer;

    function currentSlide(n) {
        clearInterval(timer);
        showSlides(slideIndex = n);
        startAuto();
    }

    function showSlides(n) {
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "flex";
        dots[slideIndex - 1].className += " active";
    }

    function startAuto() {
        timer = setInterval(() => {
            slideIndex++;
            showSlides(slideIndex);
        }, 7000);
    }

    startAuto();
</script>

<?php $All_inApp->footer(); ?>