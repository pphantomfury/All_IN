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
        background-color: #f0f2f5;
        font-family: 'Segoe UI', sans-serif;
    }

    .painting-slideshow-container {
        max-width: 1100px;
        margin: 40px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 25px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        border-top: 8px solid var(--primary-art);
        position: relative;
        overflow: hidden;
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
        min-width: 0;
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
        flex-shrink: 0;
        height: 450px;
        max-width: 50%;
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
        height: 100%;
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

<div class="painting-slideshow-container">
    <div class="slide" style="display: flex;">
        <div class="slide-content">
            <h1>Unleash Your Inner Picasso 🎨</h1>
            <p class="slide-desc">
                Painting in Nairobi has evolved into a vibrant social movement. Whether you're a seasoned artist
                or someone who hasn't touched a brush since primary school, our community-driven sites offer
                a therapeutic escape from the city bustle.
            </p>
            <p>Connect with local artists and explore the therapy of colors in a supportive, fun environment.</p>
        </div>
        <div class="slide-image-container">
            <img src="https://plus.unsplash.com/premium_photo-1678812165213-12dc8d1f3e19?w=800" class="main-slide-img">
        </div>
    </div>

    <div class="slide">
        <div class="slide-content">
            <h2>Top Painting Studios 📍</h2>
            <div class="location-list">
                <div class="loc-card">
                    <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=200">
                    <div>
                        <strong>Nairobi Art Centre</strong>
                        <p>Sri Aurobindo Avenue, near Strathmore School/Kilimani area of
                            Nairobi. | Monday – Friday: 9:00 AM – 5:00 PM
                            Saturday: 9:00 AM – 4:00 PM</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Nairobi+Art+Centre+Lavington"
                            target="_blank" class="direction-btn">Get Directions</a>
                    </div>
                </div>
                <div class="loc-card">
                    <img src="https://images.unsplash.com/photo-1547826039-bfc35e0f1ea8?w=200">
                    <div>
                        <strong>Nairobi Gallery</strong>
                        <p> Nairobi Central Business District | 8:30 AM – 5:30 PM daily (including weekends and
                            public
                            holidays)</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Nairobi+Gallery+Kenyatta+Avenue"
                            target="_blank" class="direction-btn">Get Directions</a>
                    </div>
                    <div class="loc-card">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=200">
                        <div>
                            <strong>The GoDown art centre</strong>
                            <p> Dunga Road, Industrial Area, Nairobi | Monday – Sunday: 8:00 AM – 5:00 PM| </p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=The+GoDown+Arts+Centre+Nairobi"
                                target="_blank" class="direction-btn">Get Directions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slide">
        <div class="slide-content">
            <h2>Color Festival 2026 🎊</h2>
            <div class="event-details">
                <p>Join us at the <strong>National Museum Grounds</strong> for a day of live murals and music.</p>
                <div style="margin: 15px 0;">
                    <span class="price-tag">Regular: 1,500/=</span>
                    <span class="price-tag">VIP: 3,500/=</span>
                    <span class="price-tag">Groups: 10% Off</span>
                </div>
                <p><em>*VIP includes professional brushes and 2 cocktails.</em></p>
            </div>
        </div>
        <div class="slide-image-container">
            <img src="https://images.unsplash.com/photo-1591393312447-938a62787c7c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHBhaW50aW5nJTIwZXZlbnRzfGVufDB8fDB8fHww"
                class="main-slide-img">
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