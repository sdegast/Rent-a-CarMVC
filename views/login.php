<?php

use app\core\form\Form;
use app\models\User;
$this->title = 'Inloggen';
/** @var $model User */
/** @var $attribute User */
?>

<!-- Register form -->
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Nog geen klant? <a href="/register">Registreer</a></h1>
            <p class="col-lg-10 fs-4">Door te registreren kunt u gebruik maken van onze services zoals o.a. auto's huren, facturen inzien etc.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <?php $form = Form::begin('', 'post') ?>
            <h2>Inloggen</h2>
            <form class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'email') ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'password')->passwordField() ?>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Onthoud mij
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Inloggen</button>
                <?php Form::end(); ?>

