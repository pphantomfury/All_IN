<?php
require_once 'home.php';
require_once 'vendor/autoload.php';

$All_inApp = new home();
$All_inApp->header();
$All_inApp->nav();
?>

<style>
    :root {
        --primary-art: #f52809;
        --secondary-art: #4582a0;
        --accent-pink: #23faa1;
    }

    body {
        background-color: #504c4bce;
        font-family: 'Segoe UI', sans-serif;
    }

    .carting-slideshow-container {
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

<div class="carting-slideshow-container">
    <div class="slide" style="display: flex;">
        <div class="slide-content">
            <h1>Go carting </h1>
            <p class="slide-desc">
                Nairobi offers thrilling go-karting experiences for all ages, with top venues like Karting Nairobi and
                City Kart Racing providing adrenaline-pumping fun in a safe and exciting environment.
            </p>
            <p>Experience the track in a whole different level, Drive like a pro and feel the adrenaline.
            </p>
        </div>
        <div class="slide-image-container">
            <img src="https://images.unsplash.com/photo-1533235666667-e35530ead673?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fGdvJTIwY2FydHxlbnwwfHwwfHx8MA%3D%3D"
                class="main-slide-img">
        </div>
    </div>

    <div class="slide">
        <div class="slide-content">
            <h2>Top Carting Sites in Nairobi 📍</h2>
            <div class="location-list">
                <div class="loc-card">
                    <img
                        src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepwzAF9GS1GlVmJH3E3a8jiwaXPjBD0M8vQJjD0LcMQoZH6Y_IKEgsbCEzL47SP39jNoT-vp_QOoLHjojGMDY8RQGSfhfiuew_-fei9OvfSw0Cyonx7CsnrIe5lTMvvFS8udMxrlw=w289-h312-n-k-no">
                    <div>
                        <strong>GP Karting</strong>
                        <p>Langata
                            |KSh 900 to KSh 1,500 .|</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=GP+Karting+Langata+Nairobi"
                            target="_blank" class="direction-btn">Get Directions</a>
                    </div>
                </div>
                <div class="loc-card">
                    <img
                        src="https://lh3.googleusercontent.com/p/AF1QipNNwCorBJ5DOYZJ81opUhxt0bohIoDSOkdHJu4i=w289-h312-n-k-no">
                    <div>
                        <strong>Mad Max Karting</strong>
                        <p>Two Rivers Mall | roughly KSh 2,500 – KSh 3,000 for 10 minutes (prices often increase on
                            weekends).</p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Mad+Max+Karting+Two+Rivers"
                            target="_blank" class="direction-btn">Get Directions</a>
                    </div>
                    <div class="loc-card">
                        <img
                            src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwepAH5_XJqyanEDIbtEgFBv_UJ60VKTqCNdwSSYEzLQyD5pdHIjJFroeec81zzoIR5fzrWZy2ytCFYexy3WnBLybQ47D6-YMcEZVjwTLXAS4iRzROwaADVJfDTYjH0whEdqvuwU=w289-h312-n-k-no">
                        <div>
                            <strong>Whistling Morans</strong>
                            <p> Athi River | Approximately KSh 1,500 (single engine) to KSh 3,000 (twin engine) for a
                                10-minute session.| </p>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=Whistling+Morans+Athi+River"
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