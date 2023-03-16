<?php
session_start();
if(isset($_SESSION["logged_user"])) header("Location: ../controller/controllerLogged.php?action=Session");

require_once "../DAO/usersDAO.php";
$msg = "";

if($_SERVER['REQUEST_METHOD'] == "GET"){

    $action = $_GET["action"] ?? "";
    if($action = "login"){
        $msg = "Dobrodosli!";
        include("../view/Login.php");
    }

}elseif($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    $remember_me = $_POST["remember_me"] ?? "";
    $action = $_POST["action"] ?? "";

    if(!empty($username) && !empty($password) && $action == "Login"){
        $usersDAO = new UsersDAO();
        $user = $usersDAO->getUserByUsername($username);

        if($user && $user["password"] == hash("sha256", $password)){

            if(!empty($remember_me)){
                $cookie_name = "userData";
                $userData["username"] = $username;
                $userData["password"] = $password;
                setcookie($cookie_name, serialize($userData), time() + (86400 * 10), "/");
            }
            $_SESSION["logged_user"] = $user;
            header("Location: ../controller/controllerLogged.php?action=Logged");
        }
        else{
            $msg = "Pogrešan email ili šifra!";
            include("../view/Login.php");
        }
    }else{
        $msg = "Popunite sva polja!";
        include("../view/Login.php");
    }

}
?>