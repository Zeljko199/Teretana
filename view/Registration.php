<?php
$msg = isset($msg) ? $msg : "";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Registracija</title>
</head>
<link rel="stylesheet" href="../style/styleReg.css">
<body>
<div class="container">
<h2 class="mt-4" id="naslovReg">Forma za registraciju</h2>
<div class="bg-light">
    <form method="post" action="../controller/controllerRegister.php">
        <label for="username"><b>Username</b></label>
        <div>
        <input type="text" name="username" required>
        </div>
        <br>
        <label for="email"><b>Email</b></label>
        <div>
        <input type="text" name="email" required>
        </div>
        <br>
        <label for="password"><b>Full name</b></label>
        <div>
        <input type="text" name="fullName" required>
        </div>
        <br>
        <label for="confirm_password"><b>Password</b></label>
        <div>
        <input type="password" name="password" required>
        </div>
        <br>
        <div>
        <input type="submit" name="action" id="action" value="Register">
        </div>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>