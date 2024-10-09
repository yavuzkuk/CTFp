<?php

    session_start();

    include "../../functions/funtions.php";

    if(isset($_POST["categoryName"]) && !empty(XSSFilter($_POST["categoryName"]))){
        $categoryName = ucfirst(XSSFilter($_POST["categoryName"]));

        AddCategory($categoryName);
        $_SESSION["message"] = "Kategori başarıyla eklendi";
        $_SESSION["color"] = "success";

        header("Location:../pages/category.php");
        exit();
        
    }else{
        
    }









?>