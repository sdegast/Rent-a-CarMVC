<?php

use app\core\form\Form;
use app\models\User;
$this->title = 'Registreren';
/** @var $model User */
/** @var $attribute User */
?>

<!-- Register form -->
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Al klant? <a href="/login">Log in</a></h1>
            <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <?php $form = Form::begin('', 'post') ?>
            <form class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'email') ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'password')->passwordField() ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'passwordRepeat')->passwordField() ?>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Registreren</button>
                <hr class="my-4">
                <small class="text-muted">Door te registreren ga je akkoord met de <br> algemene voorwaarden.</small>
                <?php Form::end(); ?>

