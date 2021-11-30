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
        foreach (Application::$app->cars as $car) {
            if ($car->getCurrentOwner() === Application::$app->user->getDisplayName()) { ?>
                <tr>
                    <td>AB<?= $factuurnr = $factuurnr + 1 ?></td>
                    <td><?= $car->getCarName() ?></td>
                    <td>1 dag</td>
                    <td><?= $car->getPrice() ?>,-</td>
                </tr>
          <?php  }
        } ?>
        </tbody>
    </table>
</div>