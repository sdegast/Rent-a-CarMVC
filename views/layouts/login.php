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
        <div class="btns justify-content-end">
            <a href="/register"><button class="btn btn-outline-success me-2" type="button">Registreren</button></a>
        </div>
    </form>
</nav>

{{content}}

<!-- Optional JavaScript; choose one of the two! -->


<!-- ToastJS -->
<script>
    var option =
        {
            animation : true,
            delay: 2500
        };

    function toast()
    {
        var toastHTMLElement = document.getElementById( "liveToast" );
        var toastElement = new bootstrap.Toast( toastHTMLElement , option );
        toastElement.show();
    }
</script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>



