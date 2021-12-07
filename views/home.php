<?php

use app\core\Application;

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
</section>

<h1 class="text-center" style="padding-top: 2%;">Luxe assortiment</h1>
<!-- Luxury Car Cards -->

<section style="width: 60%; margin: auto; padding-top: 2%;">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach(Application::$app->cars as $car) {
            if ($car->getPrice() > 90) { ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= $car->getCarImg(); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $car->getCarName(); ?></h5>
                            <p class="card-text">Deze auto is door onze klanten met de hoogste rating beoordeeld. Naast rijkelijk comfort kunnen wij hierop de beste prijzen garanderen.</p>
                            <?php if (Application::isGuest()): ?>
                                <button type="button" onclick="location.href='/login'" class="btn btn-primary">Huren</button>
                            <?php elseif (Application::isAdmin()): ?>
                            <?php else: ?>
                                <button type="button" onclick="location.href='/car?id=<?= $car->getCarId() - 1;?>'" class="btn btn-primary">Huren</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php }
        }?>
    </div>
</section>
