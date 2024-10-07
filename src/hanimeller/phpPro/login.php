<?php

    session_start();
    include "../../functions/funtions.php";

    $username = XSSFilter($_POST["username"]);
    $password = XSSFilter($_POST["password"]);

    if($username == "admin" && $password == "sifre123"){
        $_SESSION["message"] = "Başarıyla giriş yapıldı"; 
        $_SESSION["color"] = "success"; 
        $_SESSION["ok"] = "ok";
        
        header("Location:../success.php");
        exit();
    }else{
        $_SESSION["message"] = "Giriş yapılamadı"; 
        $_SESSION["color"] = "danger";
        $_SESSION["ok"] = "notOk";
        header("Location:../");
        exit();
    }


?>