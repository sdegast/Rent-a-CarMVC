<?php

use app\core\Application;

$this->title = 'Admin';
?>

<h2>Verhuurde auto's</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Huurder</th>
            <th scope="col">Auto</th>
            <th scope="col">Periode</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (Application::$app->reserveringen as $reservering) {
                foreach (Application::$app->cars as $car) {
                    if ($car->getCarId() === $reservering->getCarId()) { ?>
                        <tr>
                            <td><?= $reservering->getUsername();?></td>
                            <td><?= $car->getCarName() ?></td>
                            <td><?= $reservering->getStartDatum() . ' tot ' . $reservering->getEindDatum();?></td>
                        </tr>
                    <?php }
                }
        } ?>
        </tbody>
    </table>
</div>