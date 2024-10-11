<?php

    if(!isset($_SESSION["login"]) || $_SESSION["login"] != true || !isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] != 1){
        header("Location:../../");
        exit();
    }
?>