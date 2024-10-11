<?php

    include "../../functions/funtions.php";

    session_start();

    if(isset($_GET["id"]) && intval($_GET["id"])){

        DeleteUser($_GET["id"]);

        $_SESSION["message"] = "Kullanıcı silindi";
        $_SESSION["color"] = "danger";

        header("Location:../pages/scoreboard.php");
        exit();
    }else{
        header("Location:../pages/profile.php");
        exit();
    }



?>