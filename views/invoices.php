<?php

use app\core\Application;

$this->title = 'Facturen';
$factuurnr = 202100
?>

<h2>Openstaande facturen</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Factuurcode</th>
            <th scope="col">Auto</th>
            <th scope="col">Termijn</th>
            <th scope="col">Te betalen bedrag</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (Application::$app->reserveringen as $reservering) {
            if ($reservering->getUserId() === Application::$app->user->getUserId()) {
                foreach (Application::$app->cars as $car) {
                    if ($car->getCarId() === $reservering->getCarId()) { ?>
                        <tr>
                            <td>AB<?= $factuurnr = $factuurnr + 1 ?></td>
                            <td><?= $car->getCarName() ?></td>
                            <td><?= $reservering->getStartDatum() . ' tot ' . $reservering->getEindDatum();?></td>
                            <td>Prijs per dag: €<?= $car->getPrice() ?>,-</td>
                        </tr>
                    <?php }
                }
              }
        } ?>
        </tbody>
    </table>
</div>