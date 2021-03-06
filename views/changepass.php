<?php

use app\core\form\Form;
use app\models\User;
$this->title = 'Wachtwoord veranderen';
/** @var $model User */
/** @var $attribute User */
?>

<!-- Register form -->
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <?php $form = Form::begin('', 'post') ?>
            <form class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'password')->passwordField() ?>
                </div>
                <div class="form-floating mb-3">
                    <?php echo $form->field($model, 'passwordRepeat')->passwordField() ?>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Wachtwoord veranderen</button>
                <?php Form::end(); ?>

