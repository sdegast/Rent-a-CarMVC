<?php

use app\core\Application;

$car = Application::$app->cars[$_GET['id']];

$carname = $car->getCarName();
$this->title = $carname;
$carseats = $car->getCarSeats();
$carimg = $car->getCarImg();
?>
<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1"><?= $carname;?></h1>
            <p class="lead">Zitplaatsen <?= $carseats ?></p>
            <p class="lead">Zitplaatsen <?= $carseats ?></p>
            <p class="lead">Zitplaatsen <?= $carseats ?></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <form action="/reserve" method="post">
                    <input type="hidden" name="carId" value="<?= $car->getCarId(); ?>">
                    <button type="submit" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Huren</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
            <img class="rounded-lg-3" src="<?= $carimg ?>" alt="" width="350">
        </div>
    </div>
</div>

