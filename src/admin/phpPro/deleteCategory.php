<?php

    include "../../functions/funtions.php";
    session_start();

    if(isset($_GET["id"])){
        DeleteCategory($_GET["id"]);
        $_SESSION["message"] =  "Kategori silindi";
        $_SESSION["color"] = "danger";
        header("Location:../pages/category.php");
        exit();
    }else{
        header("Location:../pages/category.php");
        exit();
    }



?>