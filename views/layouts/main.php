<?php
use app\core\Application;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rent-a-Car | <?php echo $this->title; ?></title>
</head>
<body>

<!-- Nav-bar -->
<nav class="navbar navbar-light bg-light">
    <form class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="../img/rentacar_icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top justify-content-start"> Rent-a-Car</a>
        <?php if (Application::isGuest()): ?>
            <div class="btns justify-content-end">
                <a href="/register"><button class="btn btn-outline-success me-2" type="button">Registreren</button></a>
                <a href="/login"><button class="btn btn-sm btn-outline-secondary" type="button">Inloggen</button></a>
            </div>
        <?php elseif (Application::isAdmin()): ?>
            <div class="btns justify-content-end">
                Welkom, <?= Application::$app->user->getDisplayName(); ?> &nbsp;
                <a href="/loggedin"><button class="btn btn-outline-success me-2" type="button">Admin dashboard</button></a>
                <a href="/logout"><button class="btn btn-sm btn-outline-secondary" type="button">Uitloggen</button></a>
            </div>
        <?php else: ?>
            <div class="btns justify-content-end">
                Welkom, <?= Application::$app->user->getDisplayName(); ?> &nbsp;
                <a href="/loggedin"><button class="btn btn-outline-success me-2" type="button">Mijn dashboard</button></a>
                <a href="/logout"><button class="btn btn-sm btn-outline-secondary" type="button">Uitloggen</button></a>
            </div>

        <?php endif; ?>
    </form>
</nav>
<?php if (Application::$app->session->getFlash('success')): ?>
    <div class="alert alert-success">
        <?php  echo Application::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
{{content}}

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>


