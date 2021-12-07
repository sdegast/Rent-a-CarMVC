<?php
use app\core\Application;
$this->title = 'Catalogus';
/** @var $cars Application */
?>

<style>
    .card-body h4 {
        text-align: center;
    }
    .card-body ul {
        list-style: none;
    }
    .card-body {
        flex: auto;
    }
</style>

<h1></h1>


<div class="album py-5 bg-light">
    <div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php  echo Application::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        <div style="text-align: center;"><h2>Auto Catalogus</h2></div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <?php foreach(Application::$app->cars as $car) { ?>
            <div class="col">
                <div class="card shadow-sm">
                    <img src="<?= $car->getCarImg(); ?>" alt="">

                    <div class="card-body">
                        <div class="title">
                            <h4><?= $car->getCarName(); ?></h4>
                        </div>
                        <div class="properties">
                            <i class="fas fa-user-friends"></i>&nbsp;<?= $car->getCarSeats();?> zitplaatsen
                            <br>
                            <i class="fas fa-tachometer-alt"></i>&nbsp;600km per huur

                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="/car?id=<?= $car->getCarId() - 1; ?>">Reserveren</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
