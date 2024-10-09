<?php

    if(isset($_SESSION["id"]) && isset($_SESSION["login"])){
        $userData = GetUserInfo($_SESSION["id"]);

        if(empty($userData)){
            session_destroy();
            header("Location:../login/");
            exit();
        }

    }else{
        header("Location:../login/");
        exit();
    }
?>