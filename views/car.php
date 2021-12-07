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
            <?php if (Application::$app->session->getFlash('failure')): ?>
                <div class="alert alert-danger">
                    <?php  echo Application::$app->session->getFlash('failure'); ?>
                </div>
            <?php endif; ?>
            <h1 class="display-4 fw-bold lh-1"><?= $carname;?></h1>
            <p><?= $carseats;?> zitplaatsen</p>
            <p><?= $car->getprice();?>,- per dag</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <form action="/reserve" method="post">
                    <input type="hidden" name="userid" value="<?= Application::$app->user->getDisplayName();?>">
                    <input type="hidden" name="carid" value="<?= $car->getCarId(); ?>">
                    <label for="startdatum">
                        <input type="datetime-local" name="startdatum">
                    </label>
                    <br>
                    <label for="enddatum">
                        <input type="datetime-local" name="einddatum">
                    </label>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Huren</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
            <img class="rounded-lg-3" src="<?= $carimg ?>" alt="" width="350">
        </div>
    </div>
</div>

