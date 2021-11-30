<?php
$this->title = 'Home';
?>

<section class="hero height: 100vh;">

    <style>
        .hero img.hero {
            object-fit: cover;
            width: 100vw;
            height: 30vh;
        }
    </style>

    <img class="hero" src="../img/hero.jpeg" alt="">

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="../img/rentacar_icon.png" height="50px" width="50px" class="rounded me-2" alt="...">
                <strong class="me-auto">Rent-a-Car</strong>
                <small>1s ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                $_CAR is nog beschikbaar. <a href="./login.html">Login</a> om te huren!
            </div>
        </div>
    </div>
</section>

<h1 class="text-center" style="padding-top: 2%;">Luxe assortiment</h1>
<!-- Luxury Car Cards -->
<section style="width: 60%; margin: auto; padding-top: 2%;">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="../img/car4.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ferrari Portofino</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <button type="button" class="btn btn-primary" id="liveToastBtn" onclick="toast()">Check beschikbaarheid</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="../img/car5.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mercedes S-Klasse</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <button type="button" class="btn btn-primary" id="liveToastBtn" onclick="toast()">Check beschikbaarheid</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="../img/car6.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Audi A4</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <button type="button" class="btn btn-primary" id="liveToastBtn" onclick="toast()">Check beschikbaarheid</button>
                </div>
            </div>
        </div>
    </div>
</section>
