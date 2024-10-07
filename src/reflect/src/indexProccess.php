<?php
    session_start();

    if(isset($_POST) && isset($_POST["registerButton"]) && !empty($_POST["registerUsername"]) && !empty($_POST["registerMail"]) && !empty($_POST["registerPasswd"]) && !empty($_POST["registerPasswd2"])){

        $passwd = $_POST["registerPasswd"];
        $passwd2 = $_POST["registerPasswd2"];
        $username = $_POST["registerUsername"];
        $mail = $_POST["registerMail"];

        if($passwd == $passwd2){

            $_SESSION["name"] = $username;
            $_SESSION["mail"] = $mail;
            $_SESSION["succes"] = 1;
            
            header("Location:loginSuc.php");
            exit();
            
        }else{
            $_SESSION["succes"] = 0;
            
            header("Location:loginSuc.php");
            exit();
        }
    }
?>