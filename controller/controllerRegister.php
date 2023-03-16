<?php
session_start();
if(isset($_SESSION["logged_user"])) header("Location: ../controller/controllerLogin.php?action=Session");

require_once "../DAO/usersDAO.php";
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $action = $_GET["action"] ?? "";
    if($action == "register"){
        include("../view/Registration.php");
    }
}elseif($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $fullName = $_POST["fullName"] ?? "";
    $password = $_POST["password"] ?? "";
    $action = $_POST["action"] ?? "";

    if($action == "Register" && !empty($username) && !empty($email) && !empty($fullName) && !empty($password)){
        $usersDAO = new UsersDAO;
        $user = $usersDAO->getUserByUsername($username);
        if(!$user){
            $user = $usersDAO->getUserByEmail($email);
            if(!$user){
                $usersDAO->insertUser($username, $email, hash("sha256", $password), $fullName);
                $user = $usersDAO->getUserByUsername($username);
                if($user){
                    $_SESSION["logged_user"] = $user;
                    header("Location: ../controller/controllerLogin.php?action=Registered");
                }else{
                    $msg = "Postoji problem sa registracijom.<br>Probajte kasnije!";
                    include("../view/Registration.php");
                }
            }else{
                $msg = "Ovaj email već postoji!";
                include("../view/register.php");
            }
        }else{
            $msg = "Ovo korisničko ime već postoji!";
            include("../view/Registration.php");
        }
    }else{
        $msg = "Sva polja se moraju popuniti!";
        include("../view/Registration.php");
    }
}
?>