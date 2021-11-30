<?php

use app\core\Application;

$this->title = 'Admin';
?>

<h2>Verhuurde auto's</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Auto</th>
            <th scope="col">Huurder</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach(Application::$app->cars as $car) {
            if ($car->getCurrentOwner() !== '') { ?>
                <tr>
                    <td><?= $car->getCarName() ?></td>
                    <td><?= $car->getCurrentOwner() ?></td>
                </tr>
            <?php }
        }?>
        </tbody>
    </table>
</div>