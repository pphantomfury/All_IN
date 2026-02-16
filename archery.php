<?php
require_once 'home.php';
require_once 'vendor/autoload.php';

$All_inApp = new home();
$All_inApp->header();
$All_inApp->nav();
?>
<style>
    :root {
        --primary-art: #fb8500;
        --secondary-art: #023047;
        --accent-pink: #ffb703;
    }

    body {
        background-color: #0dddf0;
        font-family: 'Segoe UI', sans-serif;
    }

    .archery-slideshow-container {
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
        background-color: #dddddd;
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
<div class="archery-slideshow-container">
    <div class="slide" style="display:flex;">
        <h1>Archery</h1>
        <p class="slide-desc">Learn the art of archery and improve your skills. Discover various archery techniques and
            tips, taught
            by the best of the best. Get skills of precision, accuracy, stealth and patience .</p>
        <div class="slide-image-container">
            <img src="https://images.unsplash.com/photo-1547347268-4a6dd064cdad?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzB8fGxlYXJuJTIwYXJjaGVyeXxlbnwwfHwwfHx8MA%3D%3D"
                class="main-slide-img">
        </div>
    </div>
    <div class="slide">
        <div class="slide-content">
            <h2>Top Archery Sites 📍</h2>
            <div class="location-list">
                <div class="loc-card">
                    <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerjNJs1mRa47d5iN2Whif0Wnflg-EbOgEsjjUa1yQJQ5ursxwbWCszR9kyr5h5qMWtPApzw4mjvqvzMricnJzI5aJpVU865Z_kLAlarjGlrYVse4Qxh1aaorfuziE4ixUxmdXk=w408-h306-k-no"
                        class="main-slide-img">
                    <div>
                        <strong>Archery Kenya</strong>
                        <p>Langata
                            |10:00 am to 5:00 pm for recreational shooting.|</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Archery+Kenya+Nairobi"
                            target="_blank" class="direction-btn">Get Directions</a>
                    </div>
                    <div class="loc-card">
                        <img src="https://plus.unsplash.com/premium_photo-1718315730764-f9d7a72b9149?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFyY2hlcnl8ZW58MHx8MHx8fDA%3D"
                            class="main-slide-img">
                    </div>
                    <strong>Kenya Archery</strong>
                    <p>Kenya ArcheryClick to open side panel for
                        more information is a dedicated facility that focuses on the growth.|10:00 am/10:30 am to 5:00
                        pm/6:00 pm for recreational
                        shooting.|
                    </p>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Kenya+Archery+Nairobi" target="_blank"
                        class="direction-btn">Get Directions</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="slide">
    <div class="slide-content">
        <h2>Hunting Fest 🎊</h2>
        <div class="event-details">
            <p>Join us at the <strong>Kenya Archery Grounds</strong> Hunt and get a price!.</p>
            <div style="margin: 15px 0;">
                <span class="price-tag">Regular: 1,500/=</span>
                <span class="price-tag">VIP: 3,500/=</span>
                <span class="price-tag">Groups: 10% Off</span>
            </div>
            <p><em>*VIP includes professional brunch and 2 cocktails.</em></p>
        </div>
    </div>
    <div class="slide-image-container">
        <img src="https://images.unsplash.com/photo-1643538035490-115617dc1a00?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fGFyY2hlcnl8ZW58MHx8MHx8fDA%3D"
            class="main-slide-img">
    </div>
</div>
<div class="navigation-dots" style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
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
<?php
// 4. Close the HTML tags
$All_inApp->footer();
?>