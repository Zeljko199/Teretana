<?php
session_start();

$msg = "";
$user = NULL;
$action = $_GET["action"] ?? "";
if($action == "Logged"){
    $msg = "Uspešno prijavljivanje!";
}
elseif($action == "Registered"){
    $msg = "Uspešna registracija!";
}
elseif($action == "Session"){
    $msg = "Sesija je još uvek aktivna!";
}elseif($action == "Logout"){
    session_unset();
    session_destroy();
    $msg = 'Vaša sesija je istekla, <a href="../">prijavite</a> se ponovo!';
}

$user = isset($_SESSION["logged_user"]) ? $_SESSION["logged_user"] : NULL;

?>