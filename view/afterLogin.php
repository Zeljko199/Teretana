<?php
if(session_id() == "")
    session_start();
if(!isset($_SESSION["logged_user"])) header("Location: ../index.php");

$msg = isset($msg) ? $msg : "";
$user = isset($user) ? $user : NULL;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-danger">

</body>
</html>