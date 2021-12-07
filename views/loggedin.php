<?php
use app\core\Application;
$this->title = 'Dashboard';
?>

<section style="width: 80%; float: right;">
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Welkom terug, <?php echo Application::$app->user->getDisplayName(); ?></h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <h2>Reserveer een auto</h2>
                <p>Klik op de link hieronder om jouw perfecte huurauto uit te zoeken!</p>
                <a href="/catalogus" class="icon-link">
                    Naar auto catalogus
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="feature col">
                <h2>Facturen</h2>
                <p>Klik op de link hieronder om jouw facturen in te zien.</p>
                <a href="/invoices" class="icon-link">
                    Naar facturen
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
