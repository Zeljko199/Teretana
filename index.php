<?php
session_start();
if(isset($_SESSION["logged_user"])) header("Location: ./controller/controllerLogged.php?action=Session");

$action = isset($action) ? $action : "";
$action = isset($_GET["action"]) ? $_GET["action"] : "";

switch ($action) {
    case 'login':
        header("Location: ./controller/controllerLogin.php?action=login");
        break;
    case 'register':
        header("Location: ./controller/controllerRegister.php?action=register");
        break;
}
?>
<html>

<head>
    <title>Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="style/style.css">
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Gym</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Disabled</a>
                </li>
            </ul>
                <a name="login" id="login" class="btn btn-primary mt-auto mb-4" href="index.php?action=login" role="button">Login</a><br>
                <a name="register" id="register" class="btn btn-primary" href="index.php?action=register" role="button">Register</a>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>