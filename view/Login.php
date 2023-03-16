<?php
    $msg = $msg ?? "";
    $userData = isset($_COOKIE["userData"]) ? unserialize($_COOKIE["userData"]) : NULL;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login strana</title>
    <link rel="stylesheet" href="../style/styleLog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h2 class="mt-4" id="naslovLog">Login Forma</h2>
        <form method="post" action="../controller/controllerLogin.php">
            <label for="email"><b>Username</b></label>
            <label>
                <input type="text" name="username" required value="<?php if ($userData) echo $userData["username"] ?>">
            </label>
            <br>
            <label for="password"><b>Password</b></label>
            <label>
                <input type="password" name="password" required value="<?php if ($userData) echo $userData["email"] ?>">
            </label>
            <br>
            <input type="submit" name="action" value="Login">
            <br>
            <div class="mt-3">
                <a href="../view/Registration.php" id="signUp">Sign Up</a>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>